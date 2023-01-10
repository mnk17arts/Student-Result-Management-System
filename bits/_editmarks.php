

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background:#ff8800;">
            <div class="modal-header" style="color:#222;background:#ff5e00;">
                <h5 class="modal-title" id="editModalLabel" ><?php echo $rowv['name']."'s Marks";?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/task-3/adminportal.php" method="POST" style="color: #222;">

                <div class="modal-body" >
                    <!-- <h3>Edit this Note</h3> -->
                    <input type="number" name="snoedit" <?php echo "value='". $rowv['sno']."'";?>  id="snoedit" style="display:none;">

                    <div class="form-group row">
                        <label for="emaths" class="form-label col-sm-6"> Edit Mathematics</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" <?php echo "value='". $rowv['maths']."'";?> name="emaths" id="emaths" ></div>
                    </div>
                    <div class="form-group row">
                        <label for="ephy" class="form-label col-sm-6">Edit Physics</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" <?php echo "value='". $rowv['physics']."'";?> name="ephy" id="ephy" ></div>
                    </div>
                    <div class="form-group row">
                        <label for="echem" class="form-label col-sm-6">Edit Chemistry</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" <?php echo "value='". $rowv['chemistry']."'";?> name="echem" id="echem" ></div>
                    </div>
                    <div class="form-group row">
                        <label for="eeng" class="form-label col-sm-6">Edit English</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" <?php echo "value='". $rowv['english']."'";?> name="eeng" id="eeng" ></div>
                    </div>
                    <div class="form-group row">
                        <label for="esan" class="form-label col-sm-6">Edit Sanskrit</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" <?php echo "value='". $rowv['sanskrit']."'";?> name="esan" id="esan" ></div>
                    </div>
                    
                    <input type="text" class="form-control" value="edit" name="operation" id="operation"
                        style="display:none;">

                </div>
                <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>