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

class DataAnalysisService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function dataAnalysisReportService() {

        $year = Session::get('year');

        if(Auth::user()->type == 1) {
            return Report::where('created_at', 'like', '%'.$year.'%')->get();
        }

        if(Auth::user()->type == 2 || Auth::user()->type == 3) {
            return Report::where('created_at', 'like', '%'.$year.'%')->where(['location' => Auth::user()->address])->get();
        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function topBarangaysService() {

        $year = Session::get('year');

        return Report::select('location', 'type')->distinct()->where('created_at', 'like', '%'.$year.'%')->get();

    }
}

?>