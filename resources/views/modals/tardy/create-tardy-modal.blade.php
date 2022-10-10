<div class="modal fade" id="addTardyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Tardy / Undertime</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('tardy.store') }}" method="POST" id="add-tardy-form" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label>Name</label>
                        <select class="form-control" id="name" name="name" onchange='getDesignationByName(this, "#designation")' placeholder="Select">
                          <option selected disabled>Select</option>
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
                          <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" readonly>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>No. of times Tardy</label>
                          <input type="number" class="form-control" id="tardy" name="tardy" placeholder="No. of times Tardy">
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>No. of times Undertime</label>
                          <input type="number" class="form-control" id="undertime" name="undertime" placeholder="No. of times Undertime">
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Hours</label>
                          <input type="number" class="form-control" id="hours" name="hours" placeholder="Hours">
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Minutes</label>
                        <input type="number" class="form-control" id="mins" name="mins" placeholder="Minutes">
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