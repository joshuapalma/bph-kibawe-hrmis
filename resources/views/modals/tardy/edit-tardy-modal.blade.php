<div class="modal fade" id="editTardyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Tardy</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="POST" id="edit-tardy-form" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      @component('components.input.select')
                          @slot('label', 'Name')
                          @slot('options', getEmployeeName())
                          @slot('attributes', [
                              'name' => 'name',
                              'id' => 'edit_name',
                              'value' => "",
                              'class' => 'form-control',
                              'onchange' => "getDesignationByName(this, '#edit_designation')"
                          ])
                      @endcomponent
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" class="form-control" id="edit_designation" name="designation" placeholder="Designation" readonly>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>No. of times Tardy</label>
                            <input type="number" class="form-control" id="edit_tardy" name="tardy" placeholder="No. of times Tardy">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>No. of times Undertime</label>
                            <input type="number" class="form-control" id="edit_undertime" name="undertime" placeholder="No. of times Undertime">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Hours</label>
                            <input type="number" class="form-control" id="edit_hours" name="hours" placeholder="Hours">
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Minutes</label>
                          <input type="number" class="form-control" id="edit_mins" name="mins" placeholder="Minutes" max="60">
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Save</button>
              </div>
        </form>
      </div>
    </div>
  </div>