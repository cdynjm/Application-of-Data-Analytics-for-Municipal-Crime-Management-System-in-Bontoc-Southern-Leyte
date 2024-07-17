<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\DataAnalysisService;

class DataAnalysisController extends Controller
{
    protected $dataAnalysisService;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function dataAnalysisReport() {

        $dataAnalysisService = new DataAnalysisService;
        return $dataAnalysisService->dataAnalysisReportService();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function topBarangays() {

        $dataAnalysisService = new DataAnalysisService;
        return $dataAnalysisService->topBarangaysService();

    }
}
