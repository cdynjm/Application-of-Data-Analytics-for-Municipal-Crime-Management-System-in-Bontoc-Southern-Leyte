@extends('components.modals.report-modal')
@extends('components.modals.edit.edit-report-modal')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <h4 class="h4">Reports</h4>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="#" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center" id="create-report">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            New Report
        </a>
    </div>
</div>
<div class="table-settings mb-4">
    <div class="row justify-content-between align-items-center">
        <div class="col-9 col-lg-8 d-md-flex">
            <select class="form-select fmxw-200 d-md-inline" id="change-year" aria-label="Message select example 2">
                @php $years = range(2020, 2040); @endphp
                @foreach($years as $year)
                    <option value="{{ $year }}" @if(Session::get('year') == $year) selected @endif>Year: {{ $year }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="card card-body shadow border-0 table-wrapper table-responsive mb-4">
    <h6 class="text-danger"><span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-radioactive" viewBox="0 0 16 16">
  <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1ZM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8Z"/>
  <path d="M9.653 5.496A2.986 2.986 0 0 0 8 5c-.61 0-1.179.183-1.653.496L4.694 2.992A5.972 5.972 0 0 1 8 2c1.222 0 2.358.365 3.306.992L9.653 5.496Zm1.342 2.324a2.986 2.986 0 0 1-.884 2.312 3.01 3.01 0 0 1-.769.552l1.342 2.683c.57-.286 1.09-.66 1.538-1.103a5.986 5.986 0 0 0 1.767-4.624l-2.994.18Zm-5.679 5.548 1.342-2.684A3 3 0 0 1 5.005 7.82l-2.994-.18a6 6 0 0 0 3.306 5.728ZM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
</svg></span> Emergency Report</h6>
    <table class="table table-centered table-nowrap mb-0 rounded mt-4">
        <thead class="thead-light">
            <tr>
                <th class="border-bottom">No.</th>
                <th class="border-bottom">Photo</th>
                <th class="border-bottom">Description</th>
                <th class="border-bottom">Type</th>
                <th class="border-bottom">Location/Barangay</th>
                <th class="border-bottom">Date & Time</th>
                <th class="border-bottom">Status</th>
                <th class="border-bottom">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $cnt = 1; @endphp
            @foreach ($reports as $rep)
            @if($rep->status != 0)
         
                <!-- The Modal -->
                <div class="modal fade" id="view-photo-modal-{{ $rep->id }}" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Photo Evidence</h5>
                                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">  
                                <img src="{{ asset("storage/files/".$rep->photo) }}" alt="" id="view-photo" class="rounded" style="width: auto; height: auto;">
                            </div>
                        </div>
                    </div>
                </div> 
            <tr>

                <td photoid='{{ $rep->id }}' hidden></td>
                <td reportid='{{ $rep->id }}' hidden></td>
                <td description='{{ $rep->description }}' hidden></td>
                <td type='{{ $rep->type }}' hidden></td>
                <td subtype='{{ $rep->subtype }}' hidden></td>
                <td location='{{ $rep->location }}' hidden></td>
                <td zone='{{ $rep->zone }}' hidden></td>

                <td>
                   {{ $cnt }}
                </td>
                <td>
                   <button class="btn p-0" id="view-photo">
                        <img src="{{ asset("storage/files/".$rep->photo) }}" alt="" id="view-photo" style=" border-radius: 5px; width: 30px; height: 30px;">
                    </button>
                </td>
                <td><span class="fw-normal text-wrap">{{ $rep->description }}</span></td>
                <td><span class="fw-normal text-wrap">{{ $rep->type }} ({{ $rep->Type->subtype }})</span></td>
                <td><span class="fw-normal text-wrap d-flex align-items-center">{{ $rep->Barangay->brgy }} ({{ $rep->zone }})</span></td>
                <td>
                    <span class="fw-normal text-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-danger me-1" width="16" height="16" fill="currentColor" class="bi bi-exclamation-diamond-fill" viewBox="0 0 16 16">
                            <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        {{ date("M d, Y D h:i A", strtotime($rep->created_at)) }}
                    </span>
                </td>
                <td>
                   @if($rep->status == 1)<span class="fw-bolder text-danger text-wrap">Reported (Barangay)</span>@endif
                   @if($rep->status == 2)<span class="fw-bolder text-danger text-wrap">Reported (Police)</span>@endif
                </td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                </path>
                            </svg>
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                            <a class="dropdown-item d-flex align-items-center" href="#" id="edit-report">
                                <span class="fas fa-user-shield me-2"></span>
                                Edit
                            </a>
                            <!--
                            <a class="dropdown-item text-danger d-flex align-items-center" href="#" id="delete-report">
                                <span class="fas fa-user-times me-2"></span>
                                Delete
                            </a> -->
                        </div>
                    </div>
                </td>
            </tr>
            @php $cnt += 1; @endphp
            @endif
            @endforeach
        </tbody>
    </table>
</div>

<div class="card card-body shadow border-0 table-wrapper table-responsive">
    <h6 class="text-success"><span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z"/>
</svg></span> Responded</h6>
<table class="table table-centered table-nowrap mb-0 rounded mt-4">
        <thead class="thead-light">
            <tr>
                <th class="border-bottom">No.</th>
                <th class="border-bottom">Photo</th>
                <th class="border-bottom">Description</th>
                <th class="border-bottom">Type</th>
                <th class="border-bottom">Location/Barangay</th>
                <th class="border-bottom">Date & Time</th>
                <th class="border-bottom">Status</th>
            </tr>
        </thead>
        <tbody>
            @php $cnt = 1; @endphp
            @foreach ($reports as $rep)
            @if($rep->status == 0)
         
                <!-- The Modal -->
                <div class="modal fade" id="view-photo-modal-{{ $rep->id }}" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Photo Evidence</h5>
                                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">  
                                <img src="{{ asset("storage/files/".$rep->photo) }}" alt="" id="view-photo" class="rounded" style="width: auto; height: auto;">
                            </div>
                        </div>
                    </div>
                </div> 
            <tr>

                <td photoid='{{ $rep->id }}' hidden></td>
                <td reportid='{{ $rep->id }}' hidden></td>
                <td>
                   {{ $cnt }}
                </td>
                <td>
                   <button class="btn p-0" id="view-photo">
                        <img src="{{ asset("storage/files/".$rep->photo) }}" alt="" id="view-photo" style=" border-radius: 5px; width: 30px; height: 30px;">
                    </button>
                </td>
                <td><span class="fw-normal text-wrap">{{ $rep->description }}</span></td>
                <td><span class="fw-normal text-wrap">{{ $rep->type }} ({{ $rep->Type->subtype }})</span></td>
                <td><span class="fw-normal text-wrap d-flex align-items-center">{{ $rep->Barangay->brgy }} ({{ $rep->zone }})</span></td>
                <td>
                    <span class="fw-normal text-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-danger me-1" width="16" height="16" fill="currentColor" class="bi bi-exclamation-diamond-fill" viewBox="0 0 16 16">
                            <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        {{ date('M d, Y - h:i A', strtotime($rep->created_at)) }}
                    </span>
                    <br>
                    <span class="fw-normal text-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-success me-1" width="16" height="16" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z"/>
                        </svg>
                        {{ date('M d, Y - h:i A', strtotime($rep->updated_at)) }}
                </span>
                </td>
                
                <td>
                   @if($rep->status == 0)<span class="fw-bolder text-success text-wrap">Responded</span>@endif
                </td>
            </tr>
            @php $cnt += 1; @endphp
            @endif
            @endforeach
        </tbody>
    </table>
</div>