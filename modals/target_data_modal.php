<!-- Modal -->
<form action="" method="post">
  <div class="modal fade" id="target_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Target Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-lg-12 col-12 mt-3">
            <div class="row">
              <div class="col-12">
              <input type="text" id="sam_machine_data" class="form-control" autocomplete="off"
                placeholder="SAM MACHINE">
              </div>
              <div class="col-12">
              <input type="number" id="input_target" class="form-control" autocomplete="off" placeholder="Input Target">
              </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                  <input type="date" id="input_date_from" class="form-control" autocomplete="off">
                </div>
                <div class="col-lg-6">
                  <input type="date" id="input_date_to" class="form-control" autocomplete="off">
                </div>
              </div>

          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" value="Logout" class="btn btn-danger col-sm-12" name="Logout">
        </div>
      </div>
    </div>
  </div>
</form>