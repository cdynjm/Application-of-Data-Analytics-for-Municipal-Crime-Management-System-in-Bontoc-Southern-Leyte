@extends('components.modals.type-modal')
@extends('components.modals.edit.edit-type-modal')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <h4 class="h4">Types</h4>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="#" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center" id="create-type">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            New Type
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card card-body shadow border-0 table-wrapper table-responsive mb-4">
            <h6 class="text-danger"><span class="me-2"> Accident Types</h6>
            <table class="table table-centered table-nowrap mb-0 mt-4 rounded" >
                <thead class="thead-light">
                    <tr>
                        <th class="border-bottom">No.</th>
                        <th class="border-bottom">Description</th>
                        <th class="border-bottom">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $cnt = 1; @endphp
                    @foreach ($type as $ty)
                        @if($ty->type == 1)
                            <tr>
                                <td typeid="{{ $ty->id }}" hidden></td>
                                <td type="{{ $ty->type }}" hidden></td>
                                <td subtype="{{ $ty->subtype }}" hidden></td>
                                <td><span class="fw-normal">{{ $cnt }}</span></td>
                                <td><span class="fw-normal d-flex align-items-center">{{ $ty->subtype }}</span></td>
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
                                            <a class="dropdown-item d-flex align-items-center" href="#" id="edit-type">
                                                <span class="fas fa-user-shield me-2"></span>
                                                Edit
                                            </a>
                                            <a class="dropdown-item text-danger d-flex align-items-center" href="#" id="delete-type">
                                                <span class="fas fa-user-times me-2"></span>
                                                Delete
                                            </a>
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
    </div>
    <div class="col-md-6">
        <div class="card card-body shadow border-0 table-wrapper table-responsive">
            <h6 class="text-danger"><span class="me-2"> Crime Types</h6>
            <table class="table table-centered table-nowrap mb-0 mt-4 rounded" >
                <thead class="thead-light">
                    <tr>
                        <th class="border-bottom">No.</th> 
                        <th class="border-bottom">Description</th>
                        <th class="border-bottom">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $cnt = 1; @endphp
                    @foreach ($type as $ty)
                        @if($ty->type == 2)
                            <tr>
                                <td typeid="{{ $ty->id }}" hidden></td>
                                <td type="{{ $ty->type }}" hidden></td>
                                <td subtype="{{ $ty->subtype }}" hidden></td>
                                <td><span class="fw-normal">{{ $cnt }}</span></td>
                                <td><span class="fw-normal d-flex align-items-center">{{ $ty->subtype }}</span></td>
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
                                            <a class="dropdown-item d-flex align-items-center" href="#" id="edit-type">
                                                <span class="fas fa-user-shield me-2"></span>
                                                Edit
                                            </a>
                                            <a class="dropdown-item text-danger d-flex align-items-center" href="#" id="delete-type">
                                                <span class="fas fa-user-times me-2"></span>
                                                Delete
                                            </a>
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
    </div>
</div>