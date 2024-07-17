<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ProfileService;

class ProfileController extends Controller
{
    protected $profileService;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateProfile($request) {

        $profileService = new ProfileService;
        return $profileService->updateProfileService($request);

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateProfilePhoto($request) {

        $profileService = new ProfileService;
        return $profileService->updateProfilePhotoService($request);

    }
}
