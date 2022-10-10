<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('employee-profile.store') }}" method="POST" id="add-employee-form" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Middle Name</label>
                          <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name">
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Address</label>
                          <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Designation</label>
                          <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">
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