<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DataAnalysisController;
use App\Http\Controllers\TypeController;

class DataAnalysis extends Component
{

    protected $dataAnalysisController;
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
            $typeController = new TypeController;
            $type = $typeController->getType();
            $dataAnalysisReport = $dataAnalysisController->dataAnalysisReport();
            $topBarangays = $dataAnalysisController->topBarangays();
            return view('livewire.analytics.data-analysis', compact('dataAnalysisReport', 'topBarangays', 'type'));
        }
        else {
            return view('404');
        }
    }
    
}

?>
