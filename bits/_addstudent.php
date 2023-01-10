<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background:#ff8800;">
            <div class="modal-header" style="color:#222;background:#ff5e00;">
                <h5 class="modal-title" id="addModalLabel" >Record Insertion Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/task-3/adminportal.php" method="POST" style="color: #222;">

                <div class="modal-body">
                    <!-- <h3>add this Note</h3> -->
                    <input type="number" name="snoadd" id="snoadd" style="display:none;">

                    <div class="mb-3">
                        <label for="aname" class="form-label">Name</label>
                        <input type="text" class="form-control" name="aname" id="aname" required >
                    </div>
                    <div class="mb-3">
                        <label for="aid" class="form-label">Id</label>
                        <input type="text" class="form-control" name="aid" id="aid" required>
                    </div>
                    <div class="mb-3">
                        <label for="amath" class="form-label">Math Marks</label>
                        <input type="number" class="form-control" name="amath" id="amath" required>
                    </div>
                    <div class="mb-3">
                        <label for="aphy" class="form-label">Physics Marks</label>
                        <input type="number" class="form-control" name="aphy" id="aphy" required>
                    </div>
                    <div class="mb-3">
                        <label for="achem" class="form-label">Chemistry Marks</label>
                        <input type="number" class="form-control" name="achem" id="achem" required>
                    </div>
                    <div class="mb-3">
                        <label for="aeng" class="form-label">English Marks</label>
                        <input type="number" class="form-control" name="aeng" id="aeng" required >
                    </div>
                    <div class="mb-3">
                        <label for="asan" class="form-label">Sanskrit Marks</label>
                        <input type="number" class="form-control" name="asan" id="asan" required>
                    </div>
                    
                    <input type="text" class="form-control" value="add" name="operation" id="operation"
                        style="display:none;">

                </div>
                <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Insert Record</button>
                </div>
            </form>
        </div>
    </div>
</div>