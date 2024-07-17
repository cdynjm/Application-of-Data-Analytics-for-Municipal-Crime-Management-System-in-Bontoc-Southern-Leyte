<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SMSController;

class SMS extends Component
{

    protected $smsController;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function render() {

        if(Auth::user()->type == 1) {
            $smsController = new SMSController;
            $smstoken = $smsController->getSMS();        
            return view('sms-configuration', compact('smstoken'));
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
    public function sms(Request $request) {

        $smsController = new SMSController;
        $smsController->sms($request);
        return response()->json(['Error' => 0, 'Message'=> 'SMS Configuration Updated Successfully']); 

    }
}