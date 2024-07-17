<!-- The Modal -->
<div class="modal fade" id="edit-user-account-modal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User Account</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='edit-user-processing-account'></div>
                    
                    <form id="update-user-account" action="#">
                        @csrf
                        <input type="hidden" class="form-control" name="userid" id="edit-user-userid">

                        <label for="">First Name</label>
                        <input type="text" class="form-control mb-2" name="first_name" id="edit-user-firstname" required>

                        <label for="">Last Name</label>
                        <input type="text" class="form-control mb-2" name="last_name" id="edit-user-lastname" required>

                        <label for="">Barangay</label>
                        <select name="address" class="form-select mb-2" id="edit-user-address" required>
                            <option value="">Select...</option>
                            @foreach ($barangay as $brgy)
                                <option value="{{ $brgy->id }}">{{ $brgy->brgy }}</option>
                            @endforeach
                        </select>

                        <label for="">Contact Number</label>
                        <input type="text" class="form-control mb-2" name="contact_number" id="edit-user-contactnumber" required>

                        <label for="">Email</label>
                        <input type="email" class="form-control mb-2" name="email" id="edit-user-email" required>

                        <button class="btn btn-primary mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 