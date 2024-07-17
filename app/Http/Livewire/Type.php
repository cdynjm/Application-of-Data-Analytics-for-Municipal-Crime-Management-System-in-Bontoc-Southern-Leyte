<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TypeController;

class Type extends Component
{
    protected $typeController;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function render() {

        if(Auth::user()->type == 1) {
                   
            $typeController = new TypeController;
            $type = $typeController->getType();
            return view('livewire.types', compact('type'));
        }
        else {
            return view('404');
        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createType(Request $request) {

        $typeController = new TypeController;
        $typeController->createType($request);
        return response()->json(['Error' => 0, 'Message'=> 'Type Created Successfully']);         

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateType(Request $request) {

        $typeController = new TypeController;
        $typeController->updateType($request);
        return response()->json(['Error' => 0, 'Message'=> 'Type Updated Successfully']);         

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteType(Request $request) {

        $typeController = new TypeController;
        $typeController->deleteType($request);
        return response()->json(['Error' => 0, 'Message'=> 'Type Deleted Successfully']);         

    }

 }

?>