<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SearchService;

class SearchController extends Controller
{
    protected $searchService;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function changeYear($request) {

        $searchService = new SearchService;
        return $searchService->changeYearService($request);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchAccount($request) {

        $searchService = new SearchService;
        return $searchService->searchAccountService($request);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchBarangayUser($request) {

        $searchService = new SearchService;
        return $searchService->searchBarangayUserService($request);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function barangayReport($request) {

        $searchService = new SearchService;
        return $searchService->barangayReportService($request);

    }

}