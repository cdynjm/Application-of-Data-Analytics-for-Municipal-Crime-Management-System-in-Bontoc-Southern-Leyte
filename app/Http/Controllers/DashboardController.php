<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\DashboardService;

class DashboardController extends Controller
{
    protected $dashboardService;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function countUser() {

        $dashboardService = new DashboardService;
        return $dashboardService->countUserService();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function countBarangay() {

        $dashboardService = new DashboardService;
        return $dashboardService->countBarangayService();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function countEmergency() {

        $dashboardService = new DashboardService;
        return $dashboardService->countEmergencyService();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function countAccident() {

        $dashboardService = new DashboardService;
        return $dashboardService->countAccidentService();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function countCrime() {

        $dashboardService = new DashboardService;
        return $dashboardService->countCrimeService();

    }
}
