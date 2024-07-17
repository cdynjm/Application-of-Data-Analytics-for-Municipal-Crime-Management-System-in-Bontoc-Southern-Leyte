<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ReportService;

class ReportController extends Controller
{
    protected $reportService;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function barangayList() {

        $reportService = new ReportService;
        return $reportService->barangayListService();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function reportList() {

        $reportService = new ReportService;
        return $reportService->reportListService();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function typeList() {

        $reportService = new ReportService;
        return $reportService->typeListService();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createReport($request) {

        $reportService = new ReportService;
        return $reportService->createReportService($request);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateReport($request) {

        $reportService = new ReportService;
        return $reportService->updateReportService($request);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteReport($request) {

        $reportService = new ReportService;
        return $reportService->deleteReportService($request);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function respondReport($request) {

        $reportService = new ReportService;
        return $reportService->respondReportService($request);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function policeReport($request) {

        $reportService = new ReportService;
        return $reportService->policeReportService($request);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function locationTracker() {

        $reportService = new ReportService;
        return $reportService->locationTrackerService();

    }
}
