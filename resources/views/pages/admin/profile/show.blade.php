<x-admin-layout title="My Profile">
  <div class="page-heading">
    <h3>My Profile</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-md-6 col-12">
        <div class="card">
          <div class="card-body">
            <div class="card-content">
              <img src="{{ url('assets/images/faces/Pas-Photo.jpg') }}" class="card-img-top img-fluid" alt="user">
              <div class="card-body">
                <h5 class="card-title">{{ auth()->user()->name }}</h5>
                <h6 class="card-subtitle text-muted mb-4">{{ auth()->user()->username }}</h6>
                <p class="card-text">
                  Email: {{ auth()->user()->email }}
                  <br />
                  Role: {{ auth()->user()->role }}
                  <br />
                  Status: {{ auth()->user()->status === 1 ? 'Active' : 'Not Active' }}
                </p>
              </div>
            </div>
            <div class="card-footer">
              <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                <i class="bi bi-box-arrow-in-left"></i>
                <span class="mx-1">Edit</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</x-admin-layout>