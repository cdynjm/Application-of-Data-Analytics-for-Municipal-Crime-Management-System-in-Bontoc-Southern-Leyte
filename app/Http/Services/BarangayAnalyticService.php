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

class BarangayAnalyticService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function barangayAnalyticListService() {

        if(Auth::user()->type == 1) {
            return Barangay::orderBy('brgy', 'ASC')->get();
        }

        if(Auth::user()->type == 2) {
            return Barangay::where(['id' => Auth::user()->address])->orderBy('brgy', 'ASC')->get();
        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function reportAnalyticCountService() {

        $year = Session::get('year');

        return Report::where('created_at', 'like', '%'.$year.'%')->get();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function barangayNameService($request) {

        return Barangay::where(['id' => $request->id])->get();

    }

}

?>