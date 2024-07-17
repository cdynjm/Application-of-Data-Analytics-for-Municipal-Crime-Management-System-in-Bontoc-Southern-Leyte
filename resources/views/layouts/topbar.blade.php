@php

use App\Models\Report;

if(Auth::user()->type == 1) {
  $report = Report::where(['status' => 2])->orderBy('created_at', 'DESC')->get();
  $count = Report::where(['status' => 2])->where(['police_read' => 1])->count();
}
if(Auth::user()->type == 2) {
  $report = Report::where(['location' => Auth::user()->address])->where(['status' => 1])->orderBy('created_at', 'DESC')->get();
  $count = Report::where(['location' => Auth::user()->address])->where(['status' => 1])->where(['barangay_read' => 1])->count();
}

@endphp

<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
  <div class="container-fluid px-0">
    <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
      <div class="d-flex align-items-center">
        <!-- Search form -->
        <form class="navbar-search form-inline" id="navbar-search-main">
          <div class="input-group input-group-merge search-bar">
          
          <nav aria-label="breadcrumb" >
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">MCAMS</a></li>
                @if(Request::segment(1) == 'dashboard' ? 'active' : '')
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                @endif
                @if(Request::segment(1) == 'users' ? 'active' : '')
                  <li class="breadcrumb-item active" aria-current="page">User List</li>
                @endif
                @if(Request::segment(1) == 'profile' ? 'active' : '')
                  <li class="breadcrumb-item active" aria-current="page">Profile</li>
                @endif
                @if(Request::segment(1) == 'reports' ? 'active' : '')
                  <li class="breadcrumb-item active" aria-current="page">Reports</li>
                @endif
                @if(Request::segment(1) == 'accident-reports' ? 'active' : '')
                  <li class="breadcrumb-item active" aria-current="page">Accident Reports</li>
                @endif
                @if(Request::segment(1) == 'crime-reports' ? 'active' : '')
                  <li class="breadcrumb-item active" aria-current="page">Crime Reports</li>
                @endif
                @if(Request::segment(1) == 'barangay' ? 'active' : '')
                  <li class="breadcrumb-item active" aria-current="page">Barangay Analytics</li>
                @endif
                @if(Request::segment(1) == 'barangay-profile' ? 'active' : '')
                  <li class="breadcrumb-item active" aria-current="page">Barangay Profile</li>
                @endif
                @if(Request::segment(1) == 'data-analysis' ? 'active' : '')
                  <li class="breadcrumb-item active" aria-current="page">Data Analysis</li>
                @endif
                @if(Request::segment(1) == 'gis-map' ? 'active' : '')
                  <li class="breadcrumb-item active" aria-current="page">GIS Map</li>
                @endif
                @if(Request::segment(1) == 'location-tracker' ? 'active' : '')
                  <li class="breadcrumb-item active" aria-current="page">Location Tracker</li>
                @endif
                @if(Request::segment(1) == 'sms-configuration' ? 'active' : '')
                  <li class="breadcrumb-item active" aria-current="page">SMS Configuration</li>
                @endif
            </ol>
          </nav>
              
          </div>
        </form>
      </div>
      <!-- Navbar links -->
      <ul class="navbar-nav align-items-center">
      @if(Auth::user()->type == 1 || Auth::user()->type ==2)
        <li class="nav-item dropdown">
          <a class="nav-link text-dark notification-bell dropdown-toggle" id="view-notif" data-unread-notifications="true"
            href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            <svg class="icon icon-sm text-gray-900" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
              </path>
            </svg>
            <span class="badge bg-danger" id="notif-count">{{ $count }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0">
            <div class="list-group list-group-flush">
              <a href="#" class="text-center text-primary fw-bold border-bottom border-light py-3">Notifications</a>
              @foreach ($report as $rep)
              <a @if($rep->type == "Accident") href="/accident-reports" @endif @if($rep->type == "Crime/Scandal") href="/crime-reports" @endif class="list-group-item list-group-item-action border-bottom">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <!-- Avatar -->
                    <img alt="Image placeholder" src="{{ asset('storage/files/'.$rep->photo) }}" class="avatar-md rounded">
                  </div>
                  <div class="col ps-0 ms-2">
                    <div class=" justify-content-between align-items-center">
                      <div>
                        <h4 class="h5 fw-bolder mb-0 text-small">{{ $rep->type }}</h4>
                      </div>
                    </div>
                    <p class="font-small mt-1 mb-0"><span class="fw-bolder">{{ $rep->Barangay->brgy }} ({{ $rep->zone }})</span></p>
                    <p class="font-small mt-1 mb-0">{{ $rep->Type->subtype }} - {{ $rep->description }}</p>

                    <div class="">
                        <small class="text-danger">{{ date('M d, Y - h:i A', strtotime($rep->created_at)) }}</small>
                      </div>
                  </div>
                </div>
              </a>
              @endforeach
            </div>
          </div>
        </li>
        @endif
        <li class="nav-item dropdown ms-lg-3">
          <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <div class="media d-flex align-items-center">
              @if(Auth::user()->photo != null)
                <img class="avatar rounded-circle" alt="Image placeholder" src="{{ asset('storage/profile-photo/'.Auth::user()->photo) }}">
              @endif
              @if(Auth::user()->photo == null)
                <img class="avatar rounded-circle" alt="Image placeholder" src="{{ asset('storage/icon/profile-placeholder.jpg') }}">
              @endif
              <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                <span
                  class="mb-0 font-small fw-bold text-gray-900">{{  auth()->user()->first_name ? auth()->user()->first_name . ' ' . auth()->user()->last_name : 'User Name'}}</span>
              </div>
            </div>
          </a>
          <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
            <a class="dropdown-item d-flex align-items-center" href="/profile">
              <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                  clip-rule="evenodd"></path>
              </svg>
              My Profile
            </a>
            <div role="separator" class="dropdown-divider my-1"></div>
            <a class="dropdown-item d-flex align-items-center">
              <livewire:logout /></a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>