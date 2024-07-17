<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

class Users extends Component
{

    protected $userController;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function render(Request $request)
    {
        if(Auth::user()->type == 1 || Auth::user()->type == 2) {
            $userController = new UserController;
            $barangay = $userController->barangayList();
            $users = $userController->userList();
            return view('livewire.users', compact('barangay', 'users'));
        }
        
        else {
            return view('404');
        }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createBarangay(Request $request) {

        $userController = new UserController;
        $userController->createBarangayAccount($request);
        return response()->json(['Error' => 0, 'Message'=> 'Account Created Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateBarangay(Request $request) {

        $userController = new UserController;
        $userController->updateBarangayAccount($request);
        return response()->json(['Error' => 0, 'Message'=> 'Account Updated Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteBarangay(Request $request) {

        $userController = new UserController;
        $userController->deleteBarangayAccount($request);
        return response()->json(['Error' => 0, 'Message'=> 'Account Deleted Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function changeType(Request $request) {

        if($request->type == 2) {
            $request->session()->put('type', 2);
        }
        if($request->type == 3) {
            $request->session()->put('type', 3);
        }

        return response()->json(['Error' => 0]); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateUser(Request $request) {

        $userController = new UserController;
        $userController->updateUserAccount($request);
        return response()->json(['Error' => 0, 'Message'=> 'Account Updated Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteUser(Request $request) {

        $userController = new UserController;
        $userController->deleteUserAccount($request);
        return response()->json(['Error' => 0, 'Message'=> 'Account Deleted Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function verifyUser(Request $request) {

        $userController = new UserController;
        $userController->verifyUserAccount($request);
        return response()->json(['Error' => 0, 'Message'=> 'Account Verified Successfully']); 

    }
    
}

?>
