<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;

class AccidentReports extends Component
{
    protected $reportController;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function render() {

        $reportController = new ReportController;
        $userController = new UserController;
        $barangay = $userController->barangayList();
        $reports = $reportController->reportList();

        return view('livewire.reports.accident-reports', compact('reports', 'barangay'));
     
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function respondReport(Request $request) {

        $reportController = new ReportController;
        $reportController->respondReport($request);
        return response()->json(['Error' => 0, 'Message'=> 'The case/accident has been solved successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function policeReport(Request $request) {

        $reportController = new ReportController;
        $reportController->policeReport($request);
        return response()->json(['Error' => 0, 'Message'=> 'The case/accident has been reported successfully']); 

    }
}