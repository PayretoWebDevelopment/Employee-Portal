<div class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-payreto-darkblue fw-bold" id="addUserLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="../assets/modal/profile_validation.php">
                    <input type="text" style="display: none;" name="frmname" value="Edited user: ">
                    <div class="row">
                    <div class="mb-3 col-6">
                            <input type="hidden" id = "id_edit" name = "id">
                            <label for="message-text" class="col-form-label text-payreto-darkblue-900 fw-bold">Username:</label>
                            <input type="text" required class="form-control" name="uname2" id="uname2" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for="message-text" class="col-form-label text-payreto-darkblue-900 fw-bold">Email:</label>
                            <input type="text" required class="form-control" name="email2" id="email2" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for="message-text" class="col-form-label text-payreto-darkblue-900 fw-bold">First Name:</label>
                            <input type="text" required class="form-control" name="FN" id="FN" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for="message-text" class="col-form-label text-payreto-darkblue-900 fw-bold">Last Name:</label>
                            <input type="text" required class="form-control" name="LN" id="LN" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for="message-text" class="col-form-label text-payreto-darkblue-900 fw-bold">Role:</label>
                            <input type="text" required class="form-control" name="role" id="role">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="message-text" class="col-form-label text-payreto-darkblue-900 fw-bold">Location</label>
                            <input type="text" required class="form-control" name="location" id="location" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for="message-text" class="col-form-label text-payreto-darkblue-900 fw-bold">Department:</label>
                            <input type="text" required class="form-control" name="department" id="department">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="message-text" class="col-form-label text-payreto-darkblue-900 fw-bold">Privilege:</label>
                            <select class="form-select" name="admin" id="admin" required>
                                <option selected>-- Select Position --</option>
                                <option value="0">Employee</option>
                                <option value="1">P'Man Admin</option>
                                <option value="2">P'Dev Admin</option>
                                <option value="3">P'Acq Admin</option>
                                <option value="4">P'Sup Admin</option>
                                <option value="5">E'Adm Admin</option>
                                <option value="6">IT Helpdesk Admin</option>
                                <option value="7">Super Admin</option>
                            </select>
                        </div>
                    </div>
                        <div class="mb-3 col d-none">
                            <label for="message-text" class="col-form-label text-payreto-darkblue-900 fw-bold">Password:</label>
                            <input type="password" minlength="8" required class="form-control" name="password2" id="password2" value="<?php echo "Payreto@123456"?>" disabled>
                            <!-- <i class="far fa-eye" id="togglePassword2" style="margin-left: -30px; cursor: pointer;"></i> -->
                        </div>
                    </div>
            <div class="modal-footer text-center d-flex justify-content-center">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-payreto-darkblue-900" id="click-edit" name="editUserButton">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>