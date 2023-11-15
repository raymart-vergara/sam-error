<!-- Modal -->
<form action="" method="post">
  <div class="modal fade" id="target_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Target Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-lg-12 col-12 mt-3">
            <div class="row mb-3">
              <div class="col-6">
              <select name="input_sam_machine" id="input_sam_machine" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .22rem; border: 1px solid #ced4da; background: #FFF;height:37px; width:100%;"
                            class="pl-2" required>
                            <!-- <option>Select Machine</option> -->
                        </select>
              </div>
              <div class="col-6">
                <input type="number" id="input_target" class="form-control" autocomplete="off"
                  placeholder="Input Target">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-lg-12 mb-3">
                <input type="date" id="input_date_from" class="form-control" autocomplete="off">
              </div>
              <div class="col-lg-12">
                <input type="date" id="input_date_to" class="form-control" autocomplete="off">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" value="Add Target" class="btn btn-info col-sm-12" name="add_target">
        </div>
      </div>
    </div>
  </div>
</form>