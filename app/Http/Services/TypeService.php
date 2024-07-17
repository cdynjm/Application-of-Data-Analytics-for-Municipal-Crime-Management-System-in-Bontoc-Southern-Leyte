<?php

namespace App\Http\Services;

use Hash;
use Session;
use App\Models\Barangay;
use App\Models\SMSToken;
use App\Models\Report;
use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TypeService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getTypeService() {

        return Type::get();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createTypeService($request) {

        Type::create([
            'type' => $request->type,
            'subtype' => $request->subtype
        ]);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateTypeService($request) {

        Type::where(['id' => $request->typeid])->update([
            'type' => $request->type,
            'subtype' => $request->subtype
        ]);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteTypeService($request) {

        Type::where(['id' => $request->typeid])->delete();

    }
}