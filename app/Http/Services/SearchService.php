<?php

namespace App\Http\Services;

use Hash;
use Session;
use App\Models\Barangay;
use App\Models\SMSToken;
use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SearchService {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function changeYearService($request) {

        $year = $request->year;

        $request->session()->put('year', $year);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchAccountService($request) {

        $search = $request->search_account;

        if(Auth::user()->type == 1) {
            return User::
            where('first_name', 'like', '%'.$request->search_account.'%')
            ->orWhere('last_name', 'like', '%'.$request->search_account.'%')
            ->orderBy('last_name', 'ASC')->get();
        }

        if(Auth::user()->type == 2) {
            return User::where(function ($query) {
                $query->where(['address' => Auth::user()->address]);
            })->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%'.$search.'%')
                ->orWhere('last_name', 'like', '%'.$search.'%');
            })->orderBy('last_name', 'ASC')->get();
        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchBarangayUserService($request) {

        return User::where(['address' => $request->search_account])->orderBy('last_name', 'ASC')->get();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function barangayReportService($request) {

        return Report::where(['location' => $request->search_report])->orderBy('created_at', 'DESC')->get();
    }

}

?>