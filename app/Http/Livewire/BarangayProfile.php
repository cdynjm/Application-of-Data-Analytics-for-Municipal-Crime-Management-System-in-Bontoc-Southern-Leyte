<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DataAnalysisController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TypeController;

class BarangayProfile extends Component
{

    protected $barangayController;
    protected $dataAnalysisController;
    protected $reportController;
    protected $typeController;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function render(Request $request)
    {
        if(Auth::user()->type == 1 || Auth::user()->type == 2) {
            $dataAnalysisController = new DataAnalysisController;
            $barangayController = new BarangayController;
            $reportController = new ReportController;
            $typeController = new TypeController;

            $type = $typeController->getType();
            $dataAnalysisReport = $dataAnalysisController->dataAnalysisReport();
            $barangay = $request->id;
            $barangayName = $barangayController->barangayName($request);
            $barangayAnalytics = $barangayController->barangayAnalyticList();

            $reports = $reportController->reportList();
            return view('livewire.analytics.barangay-profile', compact('dataAnalysisReport', 'barangay', 'barangayName', 'barangayAnalytics', 'reports', 'type'));
        }
        
        else {
            return view('404');
        }
    }
    
}

?>
