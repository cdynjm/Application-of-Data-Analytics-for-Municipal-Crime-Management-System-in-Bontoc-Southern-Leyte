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

class DashboardService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function countUserService() {

        return User::where(['type' => 3])->where(['address' => Auth::user()->address])->count();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function countBarangayService() {

        return User::where(['type' => 2])->count();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function countEmergencyService() {

        $year = Session::get('year');

        if(Auth::user()->type == 1) {
            return Report::where(function ($query) use($year) {
                        $query->where('created_at', 'like', '%'.$year.'%');
                    })->where(function ($query) {
                        $query->where(['status' => 1])
                        ->orWhere(['status' => 2])->count();
                    })->count();
        }
        if(Auth::user()->type == 2) {
            return Report::where(function ($query) use($year) {
                        $query->where('created_at', 'like', '%'.$year.'%')
                        ->where(['location' => Auth::user()->address]);
                    })->where(function ($query) {
                        $query->where(['status' => 1])
                        ->orWhere(['status' => 2])->count();
                    })->count();
        }
        if(Auth::user()->type == 3) {
            return Report::where(function ($query) use($year) {
                        $query->where('created_at', 'like', '%'.$year.'%')
                        ->where(['location' => Auth::user()->address]);
                    })->where(function ($query) {
                        $query->where(['status' => 1])
                        ->orWhere(['status' => 2])->count();
                    })->count();        
        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function countAccidentService() {

       $year = Session::get('year');

       if(Auth::user()->type == 1) {
            return Report::where(['type' => "Accident"])->where('created_at', 'like', '%'.$year.'%')->count();
       }
       if(Auth::user()->type == 2 || Auth::user()->type == 3) {
            return Report::where(['location' => Auth::user()->address])->where('created_at', 'like', '%'.$year.'%')->where(['type' => "Accident"])->count();
        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function countCrimeService() {

        $year = Session::get('year');

        if(Auth::user()->type == 1) {
            return Report::where(['type' => "Crime/Scandal"])->where('created_at', 'like', '%'.$year.'%')->count();
       }
       if(Auth::user()->type == 2 || Auth::user()->type == 3) {
            return Report::where(['location' => Auth::user()->address])->where('created_at', 'like', '%'.$year.'%')->where(['type' => "Crime/Scandal"])->count();
        }

    }
}

?>