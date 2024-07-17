<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BarangayController;

class Barangay extends Component
{

    protected $barangayController;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function render(Request $request)
    {
        if(Auth::user()->type == 1 || Auth::user()->type == 2) {
            $barangayController = new BarangayController;
            $barangayAnalytics = $barangayController->barangayAnalyticList();
            $reportCount = $barangayController->reportAnalyticCount();
            return view('livewire.analytics.barangay', compact('barangayAnalytics', 'reportCount'));
        }
        else {
            return view('404');
        }
    }
    
}

?>
