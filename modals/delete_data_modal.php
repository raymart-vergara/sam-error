<!-- Modal -->
<form action="" method="post">
  <div class="modal fade" id="delete_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title" id="exampleModalLabel">Error Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-lg-12 col-12 mt-3">
            <form action="">
              <div class="row mb-3">
                <div class="col-12">
                  <select name="delete_sam_machine" id="delete_sam_machine" autocomplete="off"
                    class="form-control btn bg-secondary shadow mb-3" required>
                    <!-- <option>Select Machine</option> -->
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-12 mb-3">
                  <input type="date" id="delete_date_from" class="form-control" autocomplete="off">
                </div>
                <div class="col-lg-12">
                  <input type="date" id="delete_date_to" class="form-control" autocomplete="off">
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" value="Delete Error" class="btn btn-danger col-sm-12"  onclick="update_target()">
        </div>
      </div>
    </div>
  </div>
</form>