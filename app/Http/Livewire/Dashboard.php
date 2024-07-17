<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAnalysisController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TypeController;

class Dashboard extends Component
{
    protected $dashboardController;
    protected $dataAnalysisController;
    protected $typeController;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function render(Request $request)
    {
        $dashboardController = new DashboardController;
        $typeController = new TypeController;

        $type = $typeController->getType();
        $countUser = $dashboardController->countUser();
        $countBarangay = $dashboardController->countBarangay();
        $countEmergency = $dashboardController->countEmergency();
        $countAccident = $dashboardController->countAccident();
        $countCrime = $dashboardController->countCrime();

        $dataAnalysisController = new DataAnalysisController;
        $dataAnalysisReport = $dataAnalysisController->dataAnalysisReport();

        $reportController = new ReportController;
        $barangay = $reportController->barangayList();
        $reports = $reportController->reportList();

        return view('dashboard', compact('countBarangay', 'countEmergency', 'countAccident', 'countCrime', 'dataAnalysisReport', 'countUser', 'barangay', 'reports', 'type'));
    }
}

?>
