<x-guest-layout title="Register">
  <div class="col-lg-5 col-12">
    <div id="auth-left">
      <h5 class="auth-title">Register</h5>
      <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
          <input type="text" name="name" class="form-control form-control-xl @error('name') is-invalid @enderror"
            placeholder="Nama Lengkap" autofocus autocomplete="off" value="{{ old('name') }}">
          <div class="form-control-icon">
            <i class="bi bi-person"></i>
          </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
          <input type="text" name="username"
            class="form-control form-control-xl @error('username') is-invalid @enderror" placeholder="Username"
            autofocus autocomplete="off" value="{{ old('username') }}">
          <div class="form-control-icon">
            <i class="bi bi-person"></i>
          </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
          <input type="email" name="email" class="form-control form-control-xl @error('email') is-invalid @enderror"
            placeholder="Email" autofocus autocomplete="off" value="{{ old('email') }}">
          <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
          </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
          <input type="password" name="password"
            class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Password">
          <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
          </div>
        </div>
        <button type="submit" class="btn btn-danger btn-block btn-lg shadow-lg">Register</button>
      </form>
      <div class="text-center mt-5">
        <p class="text-gray-600">Sudah punya akun? <a href="{{ route('login') }}" class="font-bold">Masuk</a></p>
      </div>
    </div>
  </div>
  <div class="col-lg-7 d-none d-lg-block auth-image">
    <div class="overlay"></div>
    <div id="auth-right"
      style="background: url('{{ url('assets/images/samples/building.jpg') }}') no-repeat; background-size: cover; background-postion: center;">
    </div>
  </div>
</x-guest-layout>
