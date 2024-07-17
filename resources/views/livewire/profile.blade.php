@extends('components.modals.update-profile-photo-modal')

<div class="mt-4">
    <div class="row">
        <div class="col-12 col-xl-8">
            @if($showSavedAlert)
            <div class="alert alert-success" role="alert">
                Saved!
            </div>
            @endif
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">General information</h2>
                <form id="update-profile" action="#">

                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->first_name }}" name="first_name" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->last_name }}" name="last_name" required>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="">Contact Number</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->number }}" name="contact_number" required>
                        </div>
                        @if(Auth::user()->type == 2 || Auth::user()->type == 3)
                        <div class="col-md-6 mb-2">
                            <label for="">Barangay</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->Barangay->brgy }}" readonly>
                        </div>
                        @endif

                        <h2 class="h5 mb-4 mt-4">Account information</h2>

                        <div class="col-md-12 mb-2">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->email }}" name="email">
                        </div>
                        <p class="mb-4 mt-4">Change Password</p>
                        <div class="col-md-6 mb-2">
                            <label for="">Old Password</label>
                            <input type="password" class="form-control" value="" name="old_password">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="">New Password</label>
                            <input type="password" class="form-control" value="" name="new_password">
                        </div>

                        <div class="col-md-6 mb-2 mt-2">
                          <button type="submit" class="btn btn-primary">Save All</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card shadow border-0 text-center p-0">
                        <div wire:ignore.self class="profile-cover rounded-top"
                            data-background="https://img.freepik.com/premium-photo/close-up-wall-with-many-different-colored-squares-generative-ai_958124-31090.jpg?w=360"></div>
                        <div class="card-body pb-5">
                            @if(Auth::user()->photo == null)
                                <img src="{{ asset('storage/icon/profile-placeholder.jpg') }}" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait" id="update-profile-photo">
                            @else
                                <img src="{{ asset('storage/profile-photo/'.Auth::user()->photo) }}" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait" id="update-profile-photo">
                            @endif
                            <h4 class="h3">
                                {{  auth()->user()->first_name ? auth()->user()->first_name . ' ' . auth()->user()->last_name : 'User Name'}}
                            </h4>
                            @if(Auth::user()->type == 1)
                                <h5 class="fw-normal">System Administrator</h5>
                                <p class="text-gray mb-4">Municipality of Bontoc, Southern Leyte</p>
                            @endif

                            @if(Auth::user()->type == 2)
                                <h5 class="fw-normal">Barangay Administrator</h5>
                                <p class="text-gray mb-4">{{ Auth::user()->Barangay->brgy }}, Bontoc, Southern Leyte</p>
                            @endif

                            @if(Auth::user()->type == 3)
                                <h5 class="fw-normal">User/Citizen</h5>
                                <p class="text-gray">{{ Auth::user()->Barangay->brgy }}, Bontoc, Southern Leyte</p>
                                @if(Auth::user()->status == 0)
                                <p class="text-success mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z"/>
                                    </svg>
                                    Verified
                                </p>
                                @endif

                                @if(Auth::user()->status == 1)
                                <p class="text-danger mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-shield-fill-minus" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zM6 7.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1H6z"/>
                                    </svg>
                                    Account Under Review
                                </p>
                                @endif
                            @endif

                            <a class="btn btn-sm btn-secondary d-inline-flex align-items-center me-2" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
                                Profile Overview
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
