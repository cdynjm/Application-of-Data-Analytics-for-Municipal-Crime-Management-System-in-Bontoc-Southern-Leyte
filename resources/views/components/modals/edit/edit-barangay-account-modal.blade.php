<!-- The Modal -->
<div class="modal fade" id="edit-barangay-account-modal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Barangay Account</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='edit-barangay-processing-account'></div>
                    
                    <form id="update-barangay-account" action="#">
                        @csrf
                        <input type="hidden" class="form-control" name="userid" id="edit-barangay-userid">

                        <label for="">First Name</label>
                        <input type="text" class="form-control mb-2" name="first_name" id="edit-barangay-firstname" required>

                        <label for="">Last Name</label>
                        <input type="text" class="form-control mb-2" name="last_name" id="edit-barangay-lastname" required>

                        <label for="">Barangay</label>
                        <select name="address" class="form-select mb-2" id="edit-barangay-address" required>
                            <option value="">Select...</option>
                            @foreach ($barangay as $brgy)
                                <option value="{{ $brgy->id }}">{{ $brgy->brgy }}</option>
                            @endforeach
                        </select>

                        <label for="">Contact Number</label>
                        <input type="text" class="form-control mb-2" name="contact_number" id="edit-barangay-contactnumber" required>

                        <label for="">Email</label>
                        <input type="email" class="form-control mb-2" name="email" id="edit-barangay-email" required>

                        <button class="btn btn-primary mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 