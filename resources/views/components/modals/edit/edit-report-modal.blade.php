<!-- The Modal -->
<div class="modal fade" id="edit-report-modal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Report</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='edit-processing-report'></div>
                    <form id="update-report" action="#" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" name="reportid" id="edit-reportid">
                        <div class="row">
                            <div class="col-md-12">

                                <label for="">Description</label>
                                <textarea class="form-control mb-2" name="description" id="edit-description" cols="30" rows="5"></textarea>

                                <label for="">Type</label>
                                <select name="type" id="edit-type" class="form-select mb-2" required>
                                    <option value="">Select Type</option>
                                    <option value="Accident">Accident</option>
                                    <option value="Crime/Scandal">Crime/Scandal</option>
                                </select>

                                <div class="edit-accident" style="display: none;">
                                    <label for="">Accident Type</label>
                                    <select name="accident" id="edit-accident-select"  class="form-select mb-2">
                                        <option value="">Select Accident Type</option>
                                        @foreach ($type as $ty)
                                            @if($ty->type == 1)
                                                <option value="{{ $ty->id }}">{{ $ty->subtype }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="edit-crime" style="display: none;">
                                    <label for="">Crime/Scandal Type</label>
                                    <select name="crime" id="edit-crime-select" class="form-select mb-2">
                                        <option value="">Select Crime Type</option>
                                        @foreach ($type as $ty)
                                            @if($ty->type == 2)
                                                <option value="{{ $ty->id }}">{{ $ty->subtype }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <label for="">Barangay</label>
                                <select name="location" id="edit-location" class="form-select mb-2" required>
                                    <option value="">Select...</option>
                                    @foreach ($barangay as $brgy)
                                        <option value="{{ $brgy->id }}">{{ $brgy->brgy }}</option>
                                    @endforeach
                                </select>

                                <label for="">Purok/Street/Zone</label>
                                <input type="text" class="form-control mb-2" name="zone" placeholder="Pls Specify..." id="edit-zone" required>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-2">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div> 