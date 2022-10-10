<div class="modal fade" id="editLeaveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Leave</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="POST" id="edit-leave-form" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Name</label>
                          <select class="form-control" id="edit_name" name="name" value="" onchange='getDesignationByName(this, "#edit_designation")' placeholder="Select">
                            @foreach ($employeeName as $key => $row)
                                <option value="{{ $row }}" {{ $row ? "selected" : null}}>{{ $row }}</option>
                            @endforeach
                          </select>
                      </div>
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
                        <label for="example-date-input" class="form-control-label">Date of Leave</label>
                        <input class="form-control" type="date" value="" name="date_of_leave" id="edit_date_of_leave">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Nature of Leave</label>
                          <input type="text" class="form-control" id="edit_nature_of_leave" name="nature_of_leave" placeholder="Nature of Leave">
                      </div>
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