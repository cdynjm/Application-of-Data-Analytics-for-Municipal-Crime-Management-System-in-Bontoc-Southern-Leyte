<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;

class Map extends Component
{

    protected $barangayController;
    protected $reportController;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function render(Request $request)
    {
        if(Auth::user()->type == 1) {

            $userController = new UserController;
            $barangay = $userController->barangayList();

            $barangayController = new BarangayController;
            $reportCount = $barangayController->reportAnalyticCount();

            return view('livewire.analytics.gis-map', compact('barangay', 'reportCount'));

        }

        else {
            return view('404');
        }
    }
    
}

?>
