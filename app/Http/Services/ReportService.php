<?php

namespace App\Http\Services;

use Hash;
use Session;
use App\Models\Barangay;
use App\Models\SMSToken;
use App\Models\Report;
use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ReportService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function barangayListService() {

        return Barangay::orderBy('brgy', 'ASC')->get();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function typeListService() {

        return Type::orderBy('subtype', 'ASC')->get();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function reportListService() {

        $year = Session::get('year');

        if(Auth::user()->type == 1) {
            return Report::where('created_at', 'like', '%'.$year.'%')->orderBy('created_at', 'DESC')->get();
        }
        if(Auth::user()->type == 2) {
            return Report::where('created_at', 'like', '%'.$year.'%')->where(['location' => Auth::user()->address])->orderBy('created_at', 'DESC')->get();
        }
        if(Auth::user()->type == 3) {
            return Report::where('created_at', 'like', '%'.$year.'%')->where(['name' => Auth::user()->id])->orderBy('created_at', 'DESC')->get();
        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createReportService($request) {

        date_default_timezone_set("Asia/Singapore"); 

        if($request->type == 'Accident') {
            $subtype_id = $request->accident;
            foreach(Type::where(['id' => $request->accident])->get() as $get ) {
                $subtype = $get->subtype;
            } 
        }
        if($request->type == 'Crime/Scandal') {
            $subtype_id = $request->crime;
            foreach(Type::where(['id' => $request->crime])->get() as $get ) {
                $subtype = $get->subtype;
            }
        }

        $datetime = date('Ymd-His');

        $sms_date = date('M d, Y - h:i A');

        $admin = User::where(['address' => Auth::user()->address])->where(['type' => 2])->get();

        $smstoken = SMSToken::get();

        $barangay = Barangay::where(['id' => $request->location])->get();

        foreach($admin as $admin) {
            
            foreach ($smstoken as $st) {
                $mobile_iden = $st->mobile_identity; // as you have copied from the url, explained above
                $mobile_token = $st->access_token; // as per your creation of token
            }
            
            $addresses = $admin->number; // mobile number to send text to
            
            foreach($barangay as $brgy) {
                $sms = 'MCAMS - Emergency Alert!\n\nCase: '.$request->type.' ['.$subtype.']\nLocation: '.$request->zone.', '.$brgy->brgy.', Bontoc, Southern Leyte\n\n'.$request->description.'\n\n'.$sms_date;
            }
            
            $ch = curl_init();
            foreach ($smstoken as $st) {
                curl_setopt($ch, CURLOPT_URL, $st->url);
            }
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"data\":{\"addresses\":[\"$addresses\"],\"message\":\"$sms\",\"target_device_iden\":\"$mobile_iden\"}}");

            $headers = [];
            $headers[] = 'Access-Token: '.$mobile_token;
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
        }
 
     /*   $filename = \Str::slug(Auth::user()->last_name.'-'.$datetime).'.'.$request->file('photo')->getClientOriginalExtension(); 
        $transferfile = $request->file('photo')->storeAs('public/files/', $filename); */
       
        $filename = \Str::slug(Auth::user()->last_name.'-'.$datetime).'.'.$request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->move(public_path('storage/files/'), $filename);

        Report::create([
            'name' => Auth::user()->id,
            'contact_number' => Auth::user()->number,
            'description' => $request->description,
            'type' => $request->type,
            'subtype' => $subtype_id,
            'location' => $request->location,
            'zone' => $request->zone,
            'status' => 1,
            'photo' => $filename,
            'viewBarangay' => 1,
            'viewPolice' => 0,
            'police_read' => 0,
            'barangay_read' => 1
        ]);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateReportService($request) {

        if($request->type == 'Accident') {
            $subtype = $request->accident;
        }
        if($request->type == 'Crime/Scandal') {
            $subtype = $request->crime;
        }
       
        Report::where(['id' => $request->reportid])->update([
            'description' => $request->description,
            'type' => $request->type,
            'subtype' => $subtype,
            'location' => $request->location,
            'zone' => $request->zone
        ]);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteReportService($request) {

        foreach(Report::where(['id' => $request->reportid])->get() as $rep) {
            File::delete(public_path('storage/files/'.$rep->photo.''));
        }

        Report::where(['id' => $request->reportid])->delete();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function respondReportService($request) {

        date_default_timezone_set("Asia/Singapore"); 

        Report::where(['id' => $request->reportid])->update(['status' => 0, 'updated_at' => date('Y-m-d H:i:s')]);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function policeReportService($request) {

        date_default_timezone_set("Asia/Singapore");

        $sms_date = date('M d, Y - h:i A');

        $admin = User::where(['type' => 1])->get();

        $smstoken = SMSToken::get();

        $report = Report::where(['id' => $request->reportid])->get();

        foreach($report as $rep) {
            
          
            foreach(Type::where(['id' => $rep->subtype])->get() as $get ) {
                $subtype = $get->subtype;
            } 

            foreach ($smstoken as $st) {
                $mobile_iden = $st->mobile_identity; // as you have copied from the url, explained above
                $mobile_token = $st->access_token; // as per your creation of token
            }
            foreach($admin as $admin) {
                $addresses = $admin->number; // mobile number to send text to
            }
           
            $sms = 'MCAMS - Emergency Alert!\n\nCase: '.$rep->type.' ['.$subtype.']\nLocation: '.$rep->zone.', '.$rep->Barangay->brgy.', Bontoc, Southern Leyte\n\n'.$rep->description.'\n\n'.$sms_date;
          
            $ch = curl_init();
            foreach ($smstoken as $st) {
                curl_setopt($ch, CURLOPT_URL, $st->url);
            }
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"data\":{\"addresses\":[\"$addresses\"],\"message\":\"$sms\",\"target_device_iden\":\"$mobile_iden\"}}");

            $headers = [];
            $headers[] = 'Access-Token: '.$mobile_token;
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
        }

        Report::where(['id' => $request->reportid])->update(['status' => 2, 'viewPolice' => 1, 'police_read' => 1]);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function locationTrackerService() {

        $year = Session::get('year');

        if(Auth::user()->type == 1) {
            Report::where(['viewPolice' => 1])->update(['viewPolice' => 0]);
        }

        if(Auth::user()->type == 2) {
            Report::where(['location' => Auth::user()->address])->update(['viewBarangay' => 0]);
        }

        return Report::where('created_at', 'like', '%'.$year.'%')->where(['status' => 1])->orWhere(['status' => 2])->get();

    }
}



?>