<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SMSService;

class SMSController extends Controller
{
    protected $smsService;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function sms($request) {

        $smsService = new SMSService;
        return $smsService->smsService($request);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getSMS() {

        $smsService = new SMSService;
        return $smsService->getSMSService();

    }
}