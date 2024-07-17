<table class="table table-centered table-nowrap mb-0 rounded mt-4" id="barangay-report-result">
    <thead class="thead-light">
        <tr>
            <th class="border-bottom">No.</th>
            <th class="border-bottom">Photo</th>
            <th class="border-bottom">Reporter</th>
            <th class="border-bottom">Description</th>
            <th class="border-bottom">Type</th>
            <th class="border-bottom">Location/Barangay</th>
            <th class="border-bottom">Date & Time</th>
            <th class="border-bottom">Status</th>
            <!--
            @if(Auth::user()->type == 1 || Auth::user()->type == 2)
            <th class="border-bottom">Action</th>
            @endif -->
        </tr>
    </thead>
    <tbody>
        @php $cnt = 1; @endphp
        @foreach ($reports as $rep)
        @if($rep->type == "Crime/Scandal")
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
            <td><span class="fw-normal text-wrap">{{ $rep->User->last_name }} {{ $rep->User->first_name }}</span></td>
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
            @if(Auth::user()->type == 1 || Auth::user()->type == 2)
            <!--
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
                        <a class="dropdown-item text-danger d-flex align-items-center" href="#" id="delete-report">
                            <span class="fas fa-user-times me-2"></span>
                            Delete
                        </a>
                    </div>
                </div>
            </td> -->
            @endif
        </tr>
        @php $cnt += 1; @endphp
        @endif
        @endif
        @endforeach
    </tbody>
</table>