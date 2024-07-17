<!-- The Modal -->
<div class="modal fade" id="create-report-modal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Report</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-report'></div>
                    <form id="create-report" action="#" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Photo Evidence</label>
                                <input type="file" class="form-control mb-2" id="photo" name="photo" onchange="viewPhoto(this);" required>
                                <center>
                                    <img src="{{ asset('storage/icon/photo-placeholder.jpg') }}" alt="" class="mt-4 rounded img-fluid" id="photo-evidence">
                                </center>

                            </div>
                            <div class="col-md-6">

                                <label for="">Description</label>
                                <textarea class="form-control mb-2" name="description" id="" cols="30" rows="5" required></textarea>

                                <label for="">Type</label>
                                <select name="type" id="select-type" class="form-select mb-2" required>
                                    <option value="">Select Type</option>
                                    <option value="Accident">Accident</option>
                                    <option value="Crime/Scandal">Crime/Scandal</option>
                                </select>

                                <div class="select-accident" style="display: none;">
                                    <label for="">Accident Type</label>
                                    <select name="accident"  class="form-select mb-2">
                                        <option value="">Select Accident Type</option>
                                        @foreach ($type as $ty)
                                            @if($ty->type == 1)
                                                <option value="{{ $ty->id }}">{{ $ty->subtype }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="select-crime" style="display: none;">
                                    <label for="">Crime/Scandal Type</label>
                                    <select name="crime"  class="form-select mb-2">
                                        <option value="">Select Crime Type</option>
                                        @foreach ($type as $ty)
                                            @if($ty->type == 2)
                                                <option value="{{ $ty->id }}">{{ $ty->subtype }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <label for="">Barangay</label>
                                <select name="location"  class="form-select mb-2" required>
                                        <option value="">Select Location</option>
                                        @foreach ($barangay as $brgy)
                                            <option value="{{ $brgy->id }}">{{ $brgy->brgy }}</option>
                                        @endforeach
                                    </select>
                                <label for="">Purok/Street/Zone</label>
                                <input type="text" class="form-control mb-2" name="zone" placeholder="Pls Specify..." required>

                            </div>
                        </div>
                        <button class="btn btn-primary mt-2">Report</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div> 

<script>
    const compressImage = async (file, { quality = 1, type = file.type }) => {
        // Get as image data
        const imageBitmap = await createImageBitmap(file);

        // Draw to canvas
        const canvas = document.createElement('canvas');
        canvas.width = imageBitmap.width;
        canvas.height = imageBitmap.height;
        const ctx = canvas.getContext('2d');
        ctx.drawImage(imageBitmap, 0, 0);

        // Turn into Blob
        const blob = await new Promise((resolve) =>
            canvas.toBlob(resolve, type, quality)
        );

        // Turn Blob into File
        return new File([blob], file.name, {
            type: blob.type,
        });
    };

    // Get the selected file from the file input
    const input = document.querySelector('#photo');
    input.addEventListener('change', async (e) => {
        // Get the files
        const { files } = e.target;

        // No files selected
        if (!files.length) return;

        // We'll store the files in this data transfer object
        const dataTransfer = new DataTransfer();

        // For every file in the files list
        for (const file of files) {
            // We don't have to compress files that aren't images
            if (!file.type.startsWith('image')) {
                // Ignore this file, but do add it to our result
                dataTransfer.items.add(file);
                continue;
            }

            // We compress the file by 50%
            const compressedFile = await compressImage(file, {
                quality: 0.4,
                type: 'image/jpeg'
            });

            // Save back the compressed file instead of the original file
            dataTransfer.items.add(compressedFile);
        }

        // Set value of the file input to our new files list
        e.target.files = dataTransfer.files;
    });
</script>