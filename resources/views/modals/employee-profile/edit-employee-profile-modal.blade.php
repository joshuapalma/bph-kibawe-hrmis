<div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="POST" id="edit-employee-form" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" class="form-control" id="edit_first_name" value="" name="first_name" placeholder="First Name">
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Middle Name</label>
                          <input type="text" class="form-control" id="edit_middle_name" value="" name="middle_name" placeholder="Middle Name">
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" class="form-control" id="edit_last_name" value="" name="last_name" placeholder="Last Name">
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Address</label>
                          <input type="text" class="form-control" id="edit_address" value="" name="address" placeholder="Address">
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Designation</label>
                          <input type="text" class="form-control" id="edit_designation" value="" name="designation" placeholder="Designation">
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