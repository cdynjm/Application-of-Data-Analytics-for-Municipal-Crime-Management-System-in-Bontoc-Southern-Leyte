<table class="table table-centered table-nowrap mb-0 @if(Auth::user()->type == 2) mt-4 @endif rounded" id="search-barangay-result">
    <thead class="thead-light">
        <tr>
            <th class="border-bottom">No.</th>
            <th class="border-bottom">Name</th>
            <th class="border-bottom">Email</th>
            <th class="border-bottom">Role</th>
            <th class="border-bottom">Date Created</th>
            <th class="border-bottom">Barangay</th>
            <th class="border-bottom">Phone</th>
            <th class="border-bottom">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $cnt = 1; @endphp
        @foreach ($users as $user)
        @if($user->type == 2)

            <!-- The Modal -->
            <div class="modal fade" id="view-photo-modal-{{ $user->id }}" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Profile Picture</h5>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">  
                            <img @if($user->photo != null) src="{{ asset("storage/profile-photo/".$user->photo) }}" @endif @if($user->photo == null) src="{{ asset("storage/icon/profile-placeholder.jpg") }}" @endif alt="" id="view-photo" class="rounded" style="width: auto; height: auto;">
                        </div>
                    </div>
                </div>
            </div> 

        <tr>
            <td photoid='{{ $user->id }}' hidden></td>
            <td userid='{{ $user->id }}' hidden></td>
            <td firstname='{{ $user->first_name }}' hidden></td>
            <td lastname='{{ $user->last_name }}' hidden></td>
            <td email='{{ $user->email }}' hidden></td>
            <td contactnumber='{{ $user->number }}' hidden></td>
            <td address='{{ $user->address }}' hidden></td>
            <td>
                {{ $cnt }}
            </td>
            <td>
                <img class="me-2" @if($user->photo != null) src="{{ asset("storage/profile-photo/".$user->photo) }}" @endif @if($user->photo == null) src="{{ asset("storage/icon/profile-placeholder.jpg") }}" @endif alt="" id="view-photo" style=" border-radius: 5px; width: 30px; height: 30px;">{{ $user->last_name }}, {{ $user->first_name }}
            </td>
            <td><span class="fw-normal">{{ $user->email }}</span></td>
            <td><span class="fw-normal">@if($user->type == 2) {{ 'Barangay Admin' }} @endif</span></td>
            <td><span class="fw-normal d-flex align-items-center">{{ date('M d Y', strtotime($user->created_at)) }}</span></td>
            <td><span class="fw-bolder ">{{ $user->Barangay->brgy }}</span></td>
            <td><span class="fw-normal">{{ $user->number }}</span></td>
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
                        <a class="dropdown-item d-flex align-items-center" href="#" id="edit-barangay-account">
                            <span class="fas fa-user-shield me-2"></span>
                            Edit
                        </a>
                        <a class="dropdown-item text-danger d-flex align-items-center" href="#" id="delete-barangay-account">
                            <span class="fas fa-user-times me-2"></span>
                            Delete
                        </a>
                    </div>
                </div>
            </td>
        </tr>
        @php $cnt+=1; @endphp
        @endif
        @endforeach
    </tbody>
</table>