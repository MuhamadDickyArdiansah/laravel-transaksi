<x-admin-layout title="Add New Lesson">
  <div class="page-heading">
    <h3>Tambah Materi</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-md-6 col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Tambah Materi</h5>
            <form action="{{ route('admin.lessons.store') }}" method="POST">
              @csrf
              <div class="form-group mb-4">
                <label for="name" class="mb-2">Lesson Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Lesson Name" value="{{ old('name') }}" autofocus autocomplete="off">
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label for="course_id" class="mb-2">Course</label>
                <select name="course_id" id="course_id" class="form-select @error('course_id') is-invalid @enderror">
                  <option value="">Select Course</option>
                  @foreach ($courses as $course)
                  <option value="{{ $course->id }}">{{ $course->name }}</option>
                  @endforeach
                </select>
                @error('course_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label for="youtube_url" class="mb-2">Youtube URL</label>
                <input type="text" class="form-control @error('youtube_url') is-invalid @enderror" name="youtube_url" id="youtube_url" placeholder="Youtube URL" value="{{ old('youtube_url') }}" autocomplete="off">
                @error('youtube_url')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.lessons.index') }}" class="btn btn-outline-primary mx-2">
                  <i class="bi bi-box-arrow-in-left"></i>
                  <span class="mx-1">Back</span>
                </a>
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-plus-lg"></i>
                  <span class="mx-1">Create</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</x-admin-layout>