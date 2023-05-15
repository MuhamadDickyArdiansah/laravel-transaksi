<x-admin-layout title="Edit Profile">
  <div class="page-heading">
    <h3>Edit Profile</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-md-6 col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Edit Profile</h5>
            <form action="{{ route('profile.update') }}" method="POST">
              @csrf
              @method('PATCH')
              <div class="form-group mb-4">
                <label for="name" class="mb-2">Full Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                  id="name" placeholder="Full Name" value="{{ old('name', auth()->user()->name) }}" autofocus
                  autocomplete="off">
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label for="username" class="mb-2">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                  id="username" placeholder="Username" value="{{ old('username', auth()->user()->username) }}"
                  autocomplete="off">
                @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label for="email" class="mb-2">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                  id="email" placeholder="Email" value="{{ old('email', auth()->user()->email) }}"
                  autocomplete="off">
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('profile.show') }}" class="btn btn-outline-primary mx-2">
                  <i class="bi bi-box-arrow-in-left"></i>
                  <span class="mx-1">Back</span>
                </a>
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-plus-lg"></i>
                  <span class="mx-1">Update</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

  @push('addon-scripts')
    <script>
      const image = document.querySelector('.img-thumbnail');
      const previewImage = (input) => {
        const reader = new FileReader();
        reader.onload = function(e) {
          image.src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
      }
    </script>
  @endpush
</x-admin-layout>
