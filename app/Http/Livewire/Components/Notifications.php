<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Notifications extends Component
{
    public function render()
    {
        return view('components.notifications');
    }

    public function notifyRead(Request $request) {

        if(Auth::user()->type == 1) {
            Report::where(['status' => 2])->update(['police_read' => 0]);
        }
        if(Auth::user()->type == 2) {
            Report::where(['location' => Auth::user()->address])->where(['status' => 1])->update(['barangay_read' => 0]);
        }

    }
}
