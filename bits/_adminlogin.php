<!-- Modal -->
<div class="modal fade text-light" id="adminloginModal" tabindex="-1" aria-labelledby="adminloginModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content" style="background-color:#222;" >
            <div class="modal-header">
                <h5 class="modal-title" id="adminloginModalLabel">ADMIN PORTAL LOGIN</h5>
                <button type="button" class="btn-close btn-danger" style="background-color:#f00;"  data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- -->
                <form  action="/task-3/bits/_handleadminlogin.php" method="POST" >
                    <div class="mb-3">
                        <label for="auid" class="form-label">USER ID</label>
                        <input type="text" class="form-control" name="auid" id="auid"  required >
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">PASSWORD</label>
                        <input type="password" class="form-control" name="pwd" id="pwd" required>
                    </div>

                    <button type="submit" class="btn btn-warning">Login</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>