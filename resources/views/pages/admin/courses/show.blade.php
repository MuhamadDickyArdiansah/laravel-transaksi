<x-admin-layout title="Course">
  <div class="page-heading">
    <h3>Layanan</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-md-6 col-12">
        <div class="card">
          <div class="card-body">
            <div class="card-content">
              @if ($course->image === null)
              <img src="{{ url('assets/images/samples/1.png') }}" class="card-img-top img-fluid" alt="singleminded">
              @else
              <img src="{{ url('assets/images/courses/' . $course->image) }}" class="card-img-top img-fluid" alt="singleminded">
              @endif
              <div class="card-body">
                <h5 class="card-title mb-4">{{ $course->name }}</h5>
                <p class="card-text">
                  Rating: {{ $course->rating ?? 'No rating' }}
                  <br>
                  <!-- Price: {{ $course->price ?? 'No price' }} -->
                  Rp.{{ number_format($course->price, 0, ',', '.') ?? 'No price' }}
                </p>
              </div>
            </div>
            <div class="card-footer">
              <a href="{{ route('admin.courses.index') }}" class="btn btn-primary">
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