<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-3 fixed-top">
  <div class="container">
    <a class="navbar-brand text-danger" href="{{ route('home') }}">Ventuno Production</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-4">
        <li class="nav-item {{ Route::current()->getName() === 'home' ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item {{ str_contains(Route::current()->getName(), 'courses') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('courses.index') }}">Layanan</a>
        </li>
        <li class="nav-item {{ str_contains(Route::current()->getName(), 'categories') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('categories.index') }}">Kategori</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        @auth
        <li class="nav-item active dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            <span class="mx-2 d-none d-lg-inline">{{ auth()->user()->username }}</span>
            <img class="d-inline img-fluid rounded-circle" src="{{ url('assets/images/faces/Pas-Photo.jpg') }}" alt="profile" width="50" height="50" loading="lazy">
            <span class="mx-2 d-lg-none">{{ auth()->user()->username }}</span>
          </a>
          <div class="dropdown-menu">
            @if (auth()->user()->role === 'admin')
            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            @endif
            <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
            <a class="dropdown-item" href="{{ route('my-course.index') }}">Pesanan</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
        @else
        <li class="nav-item">
          <a class="btn btn-danger shadow" href="{{ route('login') }}">Masuk</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-danger shadow-sm" href="{{ route('register') }}">Daftar</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<x-logout-modal />