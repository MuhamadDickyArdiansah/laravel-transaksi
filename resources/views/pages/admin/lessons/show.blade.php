<x-admin-layout title="Lesson">
  <div class="page-heading">
    <h3>Materi</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-md-6 col-12">
        <div class="card">
          <div class="card-body">
            <div class="card-content">
              <img src="{{ url('assets/images/samples/1.png') }}" class="card-img-top img-fluid" alt="singleminded">
              <div class="card-body">
                <h5 class="card-title mb-4">{{ $lesson->name }}</h5>
                <p class="card-text">
                  Kelas: {{ $lesson->course->name }}
                  <br />
                  Youtube URL: <a href="{{ $lesson->youtube_url }}" target="_blank" rel="noreferrer noopener">{{ $lesson->youtube_url }}</a>
                </p>
              </div>
            </div>
            <div class="card-footer">
              <a href="{{ route('admin.lessons.index') }}" class="btn btn-primary">
                <i class="bi bi-box-arrow-in-left"></i>
                <span class="mx-1">Back</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</x-admin-layout>