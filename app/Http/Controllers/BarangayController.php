<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\BarangayAnalyticService;

class BarangayController extends Controller
{
    protected $barangayAnalyticService;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function barangayAnalyticList() {

        $barangayAnalyticService = new BarangayAnalyticService;
        return $barangayAnalyticService->barangayAnalyticListService();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function reportAnalyticCount() {

        $barangayAnalyticService = new BarangayAnalyticService;
        return $barangayAnalyticService->reportAnalyticCountService();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function barangayName($request) {

        $barangayAnalyticService = new BarangayAnalyticService;
        return $barangayAnalyticService->barangayNameService($request);        

    }
}
