@php

use App\Models\Report;

if(Auth::user()->type == 1) {
  $report = Report::where(['status' => 2])->where(['viewPolice' => 1])->get();
}
if(Auth::user()->type == 2) {
  $report = Report::where(['location' => Auth::user()->address])->where(['status' => 1])->where(['viewBarangay' => 1])->get();
}

@endphp

@php

if(Auth::user()->type == 1) {
  $accidents = Report::where(function ($query) {
                  $query->where(['type' => 'Accident']);
              })->where(function ($query) {
                $query->where(['status' => 1])
                ->orWhere(['status' => 2]);
              })->count();
  $crimes = Report::where(function ($query) {
                  $query->where(['type' => 'Crime/Scandal']);
              })->where(function ($query) {
                $query->where(['status' => 1])
                ->orWhere(['status' => 2]);
              })->count();
  $count = Report::where(['status' => 1])->orWhere(['status' => 2])->count();
}
if(Auth::user()->type == 2 || Auth::user()->type == 3) {
  $accidents =  Report::where(function ($query) {
                  $query->where(['type' => 'Accident'])
                  ->where(['location' => Auth::user()->address]);
              })->where(function ($query) {
                $query->where(['status' => 1])
                ->orWhere(['status' => 2]);
              })->count();
  $crimes = Report::where(function ($query) {
                  $query->where(['type' => 'Crime/Scandal'])
                  ->where(['location' => Auth::user()->address]);
              })->where(function ($query) {
                $query->where(['status' => 1])
                ->orWhere(['status' => 2]);
              })->count();
  $count = Report::where(function ($query) {
                $query->where(['location' => Auth::user()->address]);
            })->where(function ($query) {
              $query->where(['status' => 1])
              ->orWhere(['status' => 2])->count();
              })->count();
}

if(Auth::user()->type == 3) {
  $accidents =  Report::where(function ($query) {
                  $query->where(['type' => 'Accident'])
                  ->where(['location' => Auth::user()->address])
                  ->where(['name' => Auth::user()->id]);
              })->where(function ($query) {
                $query->where(['status' => 1])
                ->orWhere(['status' => 2]);
              })->count();
  $crimes = Report::where(function ($query) {
                  $query->where(['type' => 'Crime/Scandal'])
                  ->where(['location' => Auth::user()->address])
                  ->where(['name' => Auth::user()->id]);
              })->where(function ($query) {
                $query->where(['status' => 1])
                ->orWhere(['status' => 2]);
              })->count();
  $count = Report::where(function ($query) {
                $query->where(['location' => Auth::user()->address])
                ->where(['name' => Auth::user()->id]);
            })->where(function ($query) {
              $query->where(['status' => 1])
              ->orWhere(['status' => 2])->count();
              })->count();
}

@endphp

<audio id="errorEffect" src="{{ asset("storage/sounds/error.mp3") }}"></audio>

<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar style="box-shadow: 2px 2px 10px gray;">
  <div class="sidebar-inner px-2 pt-3">
    <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
      <div class="d-flex align-items-center">
        <div class="avatar-lg me-4">
              @if(Auth::user()->photo != null)
                <img class="avatar rounded-circle" alt="Image placeholder" src="{{ asset('storage/profile-photo/'.Auth::user()->photo) }}">
              @endif
              @if(Auth::user()->photo == null)
                <img class="avatar rounded-circle" alt="Image placeholder" src="{{ asset('storage/icon/profile-placeholder.jpg') }}">
              @endif
        </div>
        <div class="d-block">
          <h2 class="h5">Hi, {{ Auth::user()->first_name }}</h2>
        </div>
      </div>
      <div class="collapse-close d-md-none">
        <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
          aria-expanded="true" aria-label="Toggle navigation">
          <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </a>
      </div>
    </div>
    <ul class="nav flex-column pt-3 pt-md-0">
      <li class="nav-item">
        <a href="/dashboard" class="nav-link d-flex align-items-center">
          <span class="sidebar-icon me-3">
            <img src="{{ asset('storage/logo/bontoc-logo.jpg') }}" height="60" width="60" alt="Volt Logo" style="border-radius: 50px">
          </span>
          <span class="mt-1 ms-1 sidebar-text fw-bolder fs-4">
            MCAMS
            <p style="font-size: 10px;">Municipal Crime & <br> Accident MS</p>
          </span>
        </a>
      </li>

      <li role="separator" class="dropdown-divider mb-3 border-gray-700"></li>

      <li class="nav-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
        <a href="/dashboard" class="nav-link">
          <span class="sidebar-icon"> <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
              <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
            </svg></span></span>
          <span class="sidebar-text" style="font-size: 13px;">Dashboard</span>
        </a>
      </li>

      <li class="nav-item {{ Request::segment(1) == 'profile' ? 'active' : '' }}">
        <a href="/profile" class="nav-link">
          <span class="sidebar-icon"> <svg class="icon icon-xs me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg></span></span>
          <span class="sidebar-text" style="font-size: 13px;">Profile</span>
        </a>
      </li>
      @if(Auth::user()->type == 1 || Auth::user()->type == 2)
      <li class="nav-item {{ Request::segment(1) == 'users' ? 'active' : '' }}">
        <a href="/users" class="nav-link">
          <span class="sidebar-icon"> <svg class="icon icon-xs me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
</svg></span></span>
          <span class="sidebar-text" style="font-size: 13px;">User Management</span>
        </a>
      </li>
      @endif
      @if(Auth::user()->type == 1)
      <li class="nav-item {{ Request::segment(1) == 'sms-configuration' ? 'active' : '' }}">
              <a href="/sms-configuration" class="nav-link">
                <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send-check-fill" viewBox="0 0 16 16">
                  <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                  <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                </svg>
                </span></span>
                <span class="sidebar-text ms-2" style="font-size: 13px;">SMS Configuration</span>
              </a>
        </li>
        <li class="nav-item {{ Request::segment(1) == 'type' ? 'active' : '' }}">
              <a href="/type" class="nav-link">
                <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-blockquote-left" viewBox="0 0 16 16">
                  <path d="M2.5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11zm5 3a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6zm0 3a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6zm-5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1h-11zm.79-5.373c.112-.078.26-.17.444-.275L3.524 6c-.122.074-.272.17-.452.287-.18.117-.35.26-.51.428a2.425 2.425 0 0 0-.398.562c-.11.207-.164.438-.164.692 0 .36.072.65.217.873.144.219.385.328.72.328.215 0 .383-.07.504-.211a.697.697 0 0 0 .188-.463c0-.23-.07-.404-.211-.521-.137-.121-.326-.182-.568-.182h-.282c.024-.203.065-.37.123-.498a1.38 1.38 0 0 1 .252-.37 1.94 1.94 0 0 1 .346-.298zm2.167 0c.113-.078.262-.17.445-.275L5.692 6c-.122.074-.272.17-.452.287-.18.117-.35.26-.51.428a2.425 2.425 0 0 0-.398.562c-.11.207-.164.438-.164.692 0 .36.072.65.217.873.144.219.385.328.72.328.215 0 .383-.07.504-.211a.697.697 0 0 0 .188-.463c0-.23-.07-.404-.211-.521-.137-.121-.326-.182-.568-.182h-.282a1.75 1.75 0 0 1 .118-.492c.058-.13.144-.254.257-.375a1.94 1.94 0 0 1 .346-.3z"/>
                </svg>
                </span></span>
                <span class="sidebar-text ms-2" style="font-size: 13px;">Types</span>
              </a>
        </li>
      @endif
      @if(Auth::user()->type == 3)
      <li class="nav-item {{ Request::segment(1) == 'reports' ? 'active' : '' }}">
        <a @if(Auth::user()->status == 0) href="/reports" @endif @if(Auth::user()->status == 1) href="#" id="not-verified" @endif class="nav-link">
          <span class="sidebar-icon"><svg class="icon icon-xs me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
  <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
</svg></span>
          <span class="sidebar-text" style="font-size: 13px;">Your Reports</span>
        </a>
      </li>
    @endif
    @if(Auth::user()->type == 1 || Auth::user()->type == 2)
      <li class="nav-item">
        <span
          class="nav-link d-flex justify-content-between align-items-center"
          data-bs-toggle="collapse" data-bs-target="#submenu-app">
          <span>
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
  <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
</svg></span>
            <span class="sidebar-text" style="font-size: 13px;">Analytics</span>
          </span>
          <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg></span>
        </span>
        <div class="multi-level collapse {{ Request::segment(1) == 'barangay' || Request::segment(1) == 'data-analysis' || Request::segment(1) == 'gis-map' ? 'show' : '' }}" role="list"
          id="submenu-app" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item {{ Request::segment(1) == 'barangay' ? 'active' : '' }}">
              <a class="nav-link" href="/barangay">
                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                    <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                </svg>   
                <span class="sidebar-text" style="font-size: 13px;">Barangay</span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(1) == 'data-analysis' ? 'active' : '' }}">
              <a class="nav-link" href="/data-analysis">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z"/>
              </svg>
                <span class="sidebar-text ms-2" style="font-size: 13px;">Data Analysis</span>
              </a>
            </li>
            @if(Auth::user()->type == 1)
            <li class="nav-item {{ Request::segment(1) == 'gis-map' ? 'active' : '' }}">
              <a class="nav-link" href="/gis-map">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>
                <span class="sidebar-text ms-2" style="font-size: 13px;">Map</span>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </li>
      @endif
      <li class="nav-item">
        <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
          data-bs-target="#submenu-pages">
          <span>
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                  clip-rule="evenodd"></path>
                <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
              </svg></span>
            <span class="sidebar-text" style="font-size: 13px;">Reports</span>
            <span class="badge bg-danger ms-2">{{ $count }}</span>
          </span>
          <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg></span>
        </span>
        <div class="multi-level collapse {{ Request::segment(1) == 'accident-reports' || Request::segment(1) == 'crime-reports' || Request::segment(1) == 'location-tracker' ? 'show' : '' }}" role="list" id="submenu-pages" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item {{ Request::segment(1) == 'accident-reports' ? 'active' : '' }}">
              <a class="nav-link" href="/accident-reports">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-fill-exclamation" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm-.55 8.502L7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0zM8.002 12a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
              </svg>
                <span class="sidebar-text ms-2" style="font-size: 13px;">Accidents</span>
                @if($accidents != 0)
                  <span class="badge bg-danger ms-2">{{ $accidents }}</span>
                @endif
              </a>
            </li>
            <li class="nav-item {{ Request::segment(1) == 'crime-reports' ? 'active' : '' }}">
              <a class="nav-link" href="/crime-reports">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
                <span class="sidebar-text ms-2" style="font-size: 13px;">Crimes</span>
                @if($crimes != 0)
                  <span class="badge bg-danger ms-2">{{ $crimes }}</span>
                @endif
              </a>
            </li>
            @if(Auth::user()->type == 1 || Auth::user()->type == 2)
            <li class="nav-item {{ Request::segment(1) == 'location-tracker' ? 'active' : '' }}">
              <a class="nav-link" href="/location-tracker">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-crosshair2" viewBox="0 0 16 16">
                <path d="M8 0a.5.5 0 0 1 .5.5v.518A7.001 7.001 0 0 1 14.982 7.5h.518a.5.5 0 0 1 0 1h-.518A7.001 7.001 0 0 1 8.5 14.982v.518a.5.5 0 0 1-1 0v-.518A7.001 7.001 0 0 1 1.018 8.5H.5a.5.5 0 0 1 0-1h.518A7.001 7.001 0 0 1 7.5 1.018V.5A.5.5 0 0 1 8 0Zm-.5 2.02A6.001 6.001 0 0 0 2.02 7.5h1.005A5.002 5.002 0 0 1 7.5 3.025V2.02Zm1 1.005A5.002 5.002 0 0 1 12.975 7.5h1.005A6.001 6.001 0 0 0 8.5 2.02v1.005ZM12.975 8.5A5.002 5.002 0 0 1 8.5 12.975v1.005a6.002 6.002 0 0 0 5.48-5.48h-1.005ZM7.5 12.975A5.002 5.002 0 0 1 3.025 8.5H2.02a6.001 6.001 0 0 0 5.48 5.48v-1.005ZM10 8a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z"/>
              </svg>
                <span class="sidebar-tex ms-2" style="font-size: 13px;">Location Tracker</span>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>

@if(Auth::user()->type == 1 || Auth::user()->type == 2)
  @php $count = 0; @endphp
  @foreach ($report as $rep)
    @php $count += 1 @endphp
  @endforeach

  @if($count > 0)

    <audio autoplay src="{{ asset("storage/sounds/siren.mp3") }}"></audio>

    <script>
      SweetAlert.fire({
            icon: 'warning',
            title: 'Emergency Alert',
            text: "Open location tracker for more information",
            confirmButtonColor: '#160e45',
            confirmButtonText: 'Location Tracker'
        }).then(function(){ 
            window.location.href = "location-tracker"
          });
    </script>
  @endif
@endif