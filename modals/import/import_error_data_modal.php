<div class="modal fade" id="import_error_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h4 class="modal-title text-white" id="exampleModalLabel"><b>Import Machine</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../../process/admin/import/import_machine.php" enctype="multipart/form-data" method="POST">
        <div class="modal-body">
          <div class="row">
            <select name="import_machine_data" id="import_machine_data" autocomplete="off" onchange="fitler_all()"
              class="pl-2 form-control btn bg-secondary shadow mb-3" required>
              <!-- <option>Select Machine</option> -->
            </select>
            <input type="file" name="file" class="form-control-md text-center" accept=".csv">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-info" name="upload" value="Upload" id="import_machine_btn">
        </div>
      </form>
    </div>
  </div>
</div>