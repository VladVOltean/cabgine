<div class="modal" id="loadPicture" tabindex="-1" aria-labelledby="pictureLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pictureLabel">Load file<span class="date"></h5>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="upload_file">
                    <div class="form-group">
                        <input type="hidden" name="id_consult" id="id_consult">
                        <input type="hidden" name="id_patient" id="id_patient">
                        <label for="file">Upload File</label>
                        <input type="file" multiple name="files[]" class="form-control-file" id="file">
                          <!-- Error -->
                        <div class='alert alert-danger mt-2 d-none' id="err_file"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="add_picture">Upload</button>
            </div>
        </div>
    </div>
</div>