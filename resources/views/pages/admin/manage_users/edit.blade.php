<x-admin-layout title="Edit User">
  <div class="page-heading">
    <h3>Edit Pengguna</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-md-6 col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Edit Pengguna</h5>
            <form action="{{ route('admin.manage-users.update', $user->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <div class="form-group mb-4">
                <label for="name" class="mb-2">Full Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Full Name" value="{{ old('name', $user->name) }}" autofocus autocomplete="off">
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label for="username" class="mb-2">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" value="{{ old('username', $user->username) }}" autocomplete="off">
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label for="email" class="mb-2">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ old('email', $user->email) }}" autocomplete="off">
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label for="role" class="mb-2">Role</label>
                <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                  <option value="">Select Category</option>
                  @foreach ($user->roles as $role)
                  @if ($role === $user->role)
                  <option value="{{ $user->role }}" selected>{{ $user->role }} (SELECTED)
                  </option>
                  @else
                  <option value="{{ $role }}">{{ $role }}</option>
                  @endif
                  @endforeach
                </select>
                @error('role')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label for="status" class="mb-2">Status</label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                  <option value="">Select Category</option>
                  @foreach ($user->statuses as $status)
                  @if ($status === $user->status)
                  <option value="{{ $user->status }}" selected>{{ $user->status === 1 ? 'Active' : 'Not Active' }}
                    (SELECTED)
                  </option>
                  @else
                  <option value="{{ $status }}">{{ $status === 1 ? 'Active' : 'Not Active' }}</option>
                  @endif
                  @endforeach
                </select>
                @error('status')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.manage-users.index') }}" class="btn btn-outline-primary mx-2">
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