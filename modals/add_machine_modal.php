<div class="modal fade bd-example-modal-xl" id="add_new_machine" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel">
                    <b>Add Machine</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row mt-3">
                    <div class="col-lg-12 col-12">
                        <input type="text" id="username" class="form-control" autocomplete="off"
                            placeholder=" Username" />
                    </div>
                    <div class="col-lg-12 col-12 mt-3">
                        <input type="text" id="full_name" class="form-control" autocomplete="off"
                            placeholder=" Fullname">
                    </div>
                    <div class="col-lg-12 col-12 mt-3">
                        <input type="password" id="password" class="form-control" autocomplete="off"
                            placeholder=" Password">
                    </div>
                    <div class="col-lg-12 col-12 mt-3">
                        <select id="role" class="form-control">
                            <option value="">Select User Type</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>

                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <a type="button" class="btn btn-danger mx-3" data-dismiss="modal" aria-label="Close"> Cancel</a>
                            <a href="#" class="btn btn-info mx-3" onclick="register_accounts()">Register</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>