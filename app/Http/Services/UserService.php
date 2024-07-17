<?php

namespace App\Http\Services;

use Hash;
use Session;
use App\Models\Barangay;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService
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
    public function createBarangayAccountService($request) {
      
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'number' => $request->contact_number,
            'type' => 2,
            'status' => 0
        ]);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateBarangayAccountService($request) {
      
        User::where(['id' => $request->userid])->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'number' => $request->contact_number,
            'email' => $request->email
        ]);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteBarangayAccountService($request) {
      
        User::where(['id' => $request->userid])->delete();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateUserAccountService($request) {
      
        User::where(['id' => $request->userid])->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'number' => $request->contact_number,
            'email' => $request->email
        ]);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteUserAccountService($request) {
      
        User::where(['id' => $request->userid])->delete();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function verifyUserAccountService($request) {
      
        User::where(['id' => $request->userid])->update(['status' => 0]);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function userListService() {

        if(Auth::user()->type == 1) {
            return User::orderBy('last_name', 'ASC')->get();
        }
        if(Auth::user()->type == 2) {
            return User::where(['address' => Auth::user()->address])->orderBy('last_name', 'ASC')->get();
        }

    }
}

?>