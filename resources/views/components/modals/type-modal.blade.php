<!-- The Modal -->
<div class="modal fade" id="create-type-modal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Type</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-type'></div>
                    <form id="create-type" action="#" enctype="multipart/form-data">
                        @csrf
    
                        <label for="">Description</label>
                        <input type="text" class="form-control mb-2" name="subtype" required>

                        <label for="">Type</label>
                        <select id="" class="form-select mb-2" name="type" required>
                            <option value="">Select Type</option>
                            <option value="1">Accident</option>
                            <option value="2">Crime/Scandal</option>
                        </select>

                        <button class="btn btn-primary mt-2">Create</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div> 