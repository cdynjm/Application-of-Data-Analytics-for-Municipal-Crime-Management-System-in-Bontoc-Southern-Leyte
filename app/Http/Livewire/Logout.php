<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Auth;
use Livewire\Component;

class Logout extends Component
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function logout() {
        auth()->logout();
        return redirect('/login');
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function render()
    {
        return view('livewire.logout');
    }
}
