<x-admin-layout title="Edit Category">
  <div class="page-heading">
    <h3>Edit Kategori</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-md-6 col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Edit Kategori</h5>
            <form action="{{ route('admin.categories.update', $category->slug) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <img class="img-thumbnail" width="200" src="{{ url('assets/images/categories/' . $category->image) }}" alt="category" loading="lazy">
              <div class="form-group mb-4">
                <label for="image" class="mb-2">Select Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" onchange="previewImage(this)">
              </div>
              <div class="form-group mb-4">
                <label for="name" class="mb-2">Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Category Name" value="{{ old('name', $category->name) }}" autofocus autocomplete="off">
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-primary mx-2">
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