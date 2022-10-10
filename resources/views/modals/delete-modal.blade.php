<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="#" method="POST" id="delete-form">
            @method('DELETE')
            @csrf
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="text-gradient text-danger mt-4">You should read this!</h4>
                    <p>Do you want to delete this item?</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-gradient-primary">Yes</button>
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">No</button>
            </div>
        </form>
      </div>
    </div>
</div>