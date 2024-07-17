<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAnalysisController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;

class Search extends Component
{
    protected $searchController;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function changeYear(Request $request) {

        $searchController = new SearchController;
        $searchController->changeYear($request);

        return response()->json(['Error' => 0]);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchAccount(Request $request) {

        $searchController = new SearchController;
        $users = $searchController->searchAccount($request);
        
        if(Session::get('type') == 2) {
            return view('livewire.table.barangay-accounts-table', compact('users'));
        }

        if(Session::get('type') == 3) {
            return view('livewire.table.user-accounts-table', compact('users'));
        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchBarangayUser(Request $request) {

        $searchController = new SearchController;
        $users = $searchController->searchBarangayUser($request);

        if(Session::get('type') == 2) {
            return view('livewire.table.barangay-accounts-table', compact('users'));
        }

        if(Session::get('type') == 3) {
            return view('livewire.table.user-accounts-table', compact('users'));
        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function barangayReport(Request $request) {
        
        $searchController = new SearchController;
        $reports = $searchController->barangayReport($request);

        if($request->type == "Accident") {
            return view('livewire.table.accident-report-table', compact('reports'));
        }
        if($request->type == "Crime/Scandal") {
            return view('livewire.table.crime-report-table', compact('reports'));
        }

    }

}

?>