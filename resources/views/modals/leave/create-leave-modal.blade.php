<div class="modal fade" id="addLeaveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Leave</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('leave.store') }}" method="POST" id="add-leave-form" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                      @component('components.input.select')
                          @slot('label', 'Name')
                          @slot('options', getEmployeeName())
                          @slot('attributes', [
                              'name' => 'name',
                              'id' => 'name',
                              'value' => "",
                              'class' => 'form-control',
                              'placeholder' => 'Select',
                              'onchange' => "getDesignationByName(this, '#designation')"
                          ])
                      @endcomponent
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Designation</label>
                          <input type="text" class="form-control" id="designation" name="designation" value="" placeholder="Designation" readonly>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="example-date-input" class="form-control-label">Date of Leave</label>
                        <input class="form-control" type="date" value="" name="date_of_leave" id="date_of_leave" min={{date('Y-m-d')}}>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    @component('components.input.select')
                        @slot('label', 'Nature of Leave')
                        @slot('options', getNatureOfLeave())
                        @slot('attributes', [
                            'name' => 'nature_of_leave',
                            'id' => 'nature_of_leave',
                            'value' => "",
                            'class' => 'form-control',
                            'placeholder' => 'Select',
                            'onchange' => "displaySpecificOthersField(this)"
                        ])
                    @endcomponent
                  </div>
                </div>
                <div class="row specify_others_field" style="display: none;">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Specify Others</label>
                          <input type="text" class="form-control" id="specify_others" name="specify_others" placeholder="Specify Others">
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