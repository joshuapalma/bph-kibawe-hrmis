<div class="modal fade" id="filterLeaveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
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
                        @slot('label', 'Nature of Leave')
                        @slot('options', getNatureOfLeave())
                        @slot('attributes', [
                            'name' => 'nature_of_leave',
                            'id' => 'nature_of_leave',
                            'value' => "",
                            'class' => 'form-control',
                            'placeholder' => 'Select'
                        ])
                    @endcomponent
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-date-input" class="form-control-label">From</label>
                          <input class="form-control" type="date" value="" name="from_date" id="from_date">
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-date-input" class="form-control-label">To</label>
                          <input class="form-control" type="date" value="" name="to_date" id="to_date">
                      </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Filter</button>
              </div>
        </form>
      </div>
    </div>
  </div>