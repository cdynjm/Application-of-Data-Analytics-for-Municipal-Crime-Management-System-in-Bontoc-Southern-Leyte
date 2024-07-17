<?php

namespace App\Http\Controllers;

use App\Http\Services\TypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    protected $typeService;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getType() {

        $typeService = new TypeService;
        return $typeService->getTypeService();

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createType($request) {

        $typeService = new TypeService;
        return $typeService->createTypeService($request);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateType($request) {

        $typeService = new TypeService;
        return $typeService->updateTypeService($request);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteType($request) {

        $typeService = new TypeService;
        return $typeService->deleteTypeService($request);

    }
}
