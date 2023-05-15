<x-guest-layout title="Login">
  <div class="col-lg-5 col-12">
    <div id="auth-left">
      <h5 class="auth-title">Login</h5>
      <form action="{{ route('login.store') }}" method="POST">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
          <input type="email" name="email" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" autofocus autocomplete="off" value="{{ old('email') }}">
          <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
          </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
          <input type="password" name="password" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Password">
          <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg">Login</button>
      </form>
      <div class="text-center mt-5">
        <p class="text-gray-600">Belum punya akun? <a href="{{ route('register') }}" class="font-bold">Daftar</a></p>
      </div>
    </div>
  </div>
  <div class="col-lg-7 d-none d-lg-block auth-image">
    <div class="overlay"></div>
    <div id="auth-right" style="background: url('{{ url('assets/images/samples/architecture1.jpg') }}') no-repeat; background-size: cover; background-postion: center;">
    </div>
  </div>
</x-guest-layout>