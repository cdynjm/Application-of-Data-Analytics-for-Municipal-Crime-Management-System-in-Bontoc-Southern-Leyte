<!-- The Modal -->
<div class="modal fade" id="create-barangay-account-modal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Barangay Account</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-account'></div>
                    
                    <form id="create-barangay-account" action="#">
                        @csrf
                        <label for="">First Name</label>
                        <input type="text" class="form-control mb-2" name="first_name" required>

                        <label for="">Last Name</label>
                        <input type="text" class="form-control mb-2" name="last_name" required>

                        <label for="">Barangay</label>
                        <select name="address" id="" class="form-select mb-2" required>
                            <option value="">Select...</option>
                            @foreach ($barangay as $brgy)
                                <option value="{{ $brgy->id }}">{{ $brgy->brgy }}</option>
                            @endforeach
                        </select>

                        <label for="">Contact Number</label>
                        <input type="text" class="form-control mb-2" name="contact_number" required>

                        <label for="">Email/Username</label>
                        <input type="email" class="form-control mb-2" name="email" required>

                        <label for="">Password</label>
                        <input type="password" class="form-control mb-2" name="password" required>

                        <button class="btn btn-primary mt-2">Create</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div> 