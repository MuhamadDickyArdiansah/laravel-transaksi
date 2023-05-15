<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure to logout?
      </div>
      <div class="modal-footer">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="button" class="btn btn-outline-danger shadow-sm mx-2" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger shadow">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>