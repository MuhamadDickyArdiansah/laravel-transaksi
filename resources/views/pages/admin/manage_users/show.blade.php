<x-admin-layout title="User">
  <div class="page-heading">
    <h3>Pengguna</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-md-6 col-12">
        <div class="card">
          <div class="card-body">
            <div class="card-content">
              <img src="{{ url('assets/images/faces/2.jpg') }}" class="card-img-top img-fluid" alt="user">
              <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <h6 class="card-subtitle text-muted mb-4">{{ $user->username }}</h6>
                <p class="card-text">
                  Email: {{ $user->email }}
                  <br />
                  Role: {{ $user->role }}
                  <br />
                  Status: {{ $user->status === 1 ? 'Active' : 'Not Active' }}
                </p>
              </div>
            </div>
            <div class="card-footer">
              <a href="{{ route('admin.manage-users.index') }}" class="btn btn-primary">
                <i class="bi bi-box-arrow-in-left"></i>
                <span class="mx-1">Back</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</x-admin-layout>