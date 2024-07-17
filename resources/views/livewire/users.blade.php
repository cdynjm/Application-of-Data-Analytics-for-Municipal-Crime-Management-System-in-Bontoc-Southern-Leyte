
@extends('components.modals.barangay-account-modal')
@extends('components.modals.edit.edit-barangay-account-modal')
@extends('components.modals.edit.edit-user-account-modal')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        
        <h2 class="h4">Users List</h2>
    </div>
    @if(Auth::user()->type == 1)
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="#" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center" id="create-barangay-account">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Barangay Account
        </a>
    </div>
    @endif
</div>
<div class="table-settings mb-4">
    <div class="row justify-content-between align-items-center">
        <div class="col-9 col-lg-8 d-md-flex">
            <div class="input-group me-2 me-lg-3 fmxw-300">
                <span class="input-group-text">
                    <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <input type="text" class="form-control" placeholder="Search Account" @if(Session::get('type') == 2) id="search-barangay-account" @endif @if(Session::get('type') == 3) id="search-user-account" @endif>
            </div>
            <select class="form-select fmxw-200 d-md-inline" id="change-type" aria-label="Message select example 2">
                <option value="">Select Account Type</option>
                <option @if(Session::get('type') == 2) selected @endif value="2">Barangay Accounts</option>
                <option @if(Session::get('type') == 3) selected @endif value="3">User Accounts</option>
            </select>
        </div>
    </div>
</div>
@if(Session::get('type') == 2)
<div class="card card-body shadow border-0 table-wrapper table-responsive">
    @if(Auth::user()->type == 1)
    <div class="d-flex mb-3">
        <select class="form-select fmxw-200" aria-label="Message select example" id="barangay-user-account">
            <option selected>Select Barangay...</option>
            @foreach ($barangay as $brgy)
                <option value="{{ $brgy->id }}">{{ $brgy->brgy }}</option>
            @endforeach
        </select>
        <button class="btn btn-sm px-3 btn-secondary ms-3" id="select-barangay-account">Apply</button>
    </div>
    @endif
    @include('livewire.table.barangay-accounts-table')
</div>
@endif
@if(Session::get('type') == 3)
<div class="card card-body shadow border-0 table-wrapper table-responsive">
    @if(Auth::user()->type == 1)
    <div class="d-flex mb-3">
        <select class="form-select fmxw-200" aria-label="Message select example" id="barangay-user-account">
            <option selected>Select Barangay...</option>
            @foreach ($barangay as $brgy)
                <option value="{{ $brgy->id }}">{{ $brgy->brgy }}</option>
            @endforeach
        </select>
        <button class="btn btn-sm px-3 btn-secondary ms-3" id="select-barangay-user-account">Apply</button>
    </div>
    @endif
    @include('livewire.table.user-accounts-table')
</div>
@endif