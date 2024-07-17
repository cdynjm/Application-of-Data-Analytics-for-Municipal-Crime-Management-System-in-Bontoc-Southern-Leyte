<?php

namespace App\Http\Services;

use Hash;
use Session;
use App\Models\Barangay;
use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateProfileService($request) {

        if($request->old_password == '' || $request->new_password == '') {

            User::where(['id' => Auth::user()->id])->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'number' => $request->contact_number,
                'email' => $request->email
            ]);

            return response()->json(['Error' => 0, 'Message'=> 'Account Updated Successfully']); 

        }

        if($request->old_password != '' && $request->new_password != '') {

            if(Hash::check($request->old_password, Auth::user()->password)) {

                User::where(['id' => Auth::user()->id])->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'number' => $request->contact_number,
                    'email' => $request->email,
                    'password' => Hash::make($request->new_password)
                ]);
    
                return response()->json(['Error' => 0, 'Message'=> 'Account Updated Successfully']); 
            }

            else {

                return response()->json(['Error' => 1, 'Message'=> 'Your old password did not match our records']); 

            }
        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateProfilePhotoService($request) {
       
        File::delete(public_path('storage/profile-photo/'.Auth::user()->photo.''));
        
        date_default_timezone_set("Asia/Singapore"); 

        $datetime = date('Ymd-His');

        $filename = \Str::slug(Auth::user()->last_name.'-'.$datetime).'.'.$request->profilePhoto->extension(); 
        $transferfile = $request->file('profilePhoto')->storeAs('public/profile-photo/', $filename);

        User::where(['id' => Auth::user()->id])->update([
            'photo' => $filename
        ]);

    }
}

?>