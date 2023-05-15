<x-admin-layout title="Edit Course">
  <div class="page-heading">
    <h3>Edit Kelas</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-md-6 col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Edit Kelas</h5>
            <form action="{{ route('admin.courses.update', $course->slug) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <img class="img-thumbnail" width="200" src="{{ url('assets/images/courses/' . $course->image) }}" alt="course" loading="lazy">
              <div class="form-group mb-4">
                <label for="image" class="mb-2">Select Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" onchange="previewImage(this)">
              </div>
              <div class="form-group mb-4">
                <label for="name" class="mb-2">Course Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Course Name" value="{{ old('name', $course->name) }}" autofocus autocomplete="off">
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label for="category_id" class="mb-2">Course Category</label>
                <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                  <option value="">Select Category</option>
                  @foreach ($categories as $category)
                  @if ($category->id === $course->category_id)
                  <option value="{{ $course->category_id }}" selected>{{ $course->category->name }} (SELECTED)
                  </option>
                  @else
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endif
                  @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label for="rating" class="mb-2">Course Rating</label>
                <input type="text" class="form-control @error('rating') is-invalid @enderror" name="rating" id="rating" placeholder="Course Rating" value="{{ old('rating', $course->rating) }}" autocomplete="off">
                @error('rating')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label for="price" class="mb-2">Course Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="Course Price" value="{{ old('price', $course->price) }}" autocomplete="off">
                @error('price')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label for="description" class="mb-2">Course Description</label>
                <textarea cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Course Description" value="{{ old('description', $course->description) }}" autocomplete="off">{{ $course->description }}</textarea>
                @error('description')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-primary mx-2">
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