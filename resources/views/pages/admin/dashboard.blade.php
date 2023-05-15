<x-admin-layout title="Dashboard">
  <div class="page-heading">
    <h3>Dashboard</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
          <div class="card-body py-4 px-4">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xl">
                <img src="{{ url('assets/images/faces/Pas-Photo.jpg') }}" alt="Profile Image">
              </div>
              <div class="ms-3 name">
                <h5 class="font-bold">{{ auth()->user()->name }}</h5>
                <h6 class="text-muted mb-0">{{ '@' . auth()->user()->username }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-lg-3 col-4 d-flex justify-content-start ">
                <div class="stats-icon blue mb-2">
                  <i class="iconly-boldUser1"></i>
                </div>
              </div>
              <div class="col-lg-9 col-8">
                <h6 class="text-muted font-semibold">Pengguna</h6>
                <h6 class="font-extrabold mb-0">{{ $users_count }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-lg-3 col-4 d-flex justify-content-start ">
                <div class="stats-icon purple mb-2">
                  <i class="iconly-boldUser"></i>
                </div>
              </div>
              <div class="col-lg-9 col-8">
                <h6 class="text-muted font-semibold">Layanan</h6>
                <h6 class="font-extrabold mb-0">{{ $courses_count }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</x-admin-layout>