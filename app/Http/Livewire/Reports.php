<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReportController;

class Reports extends Component
{
    protected $reportController;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function render()
    {
        $reportController = new ReportController;
        $barangay = $reportController->barangayList();
        $type = $reportController->typeList();
        $reports = $reportController->reportList();

        if(Auth::user()->type == 1 || Auth::user()->type == 2) {
            return view('reports', compact('barangay', 'reports'));
        }

        if(Auth::user()->type == 3) {
            if(Auth::user()->status == 0) {
                return view('reports', compact('barangay', 'reports', 'type'));
            }
            else {
                return view('500');
            }
        }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createReport(Request $request) {

        $reportController = new ReportController;
        $reportController->createReport($request);
        return response()->json(['Error' => 0, 'Message'=> 'Reported Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateReport(Request $request) {

        $reportController = new ReportController;
        $reportController->updateReport($request);
        return response()->json(['Error' => 0, 'Message'=> 'Report Updated Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteReport(Request $request) {

        $reportController = new ReportController;
        $reportController->deleteReport($request);
        return response()->json(['Error' => 0, 'Message'=> 'Report Deleted Successfully']); 

    }
}
