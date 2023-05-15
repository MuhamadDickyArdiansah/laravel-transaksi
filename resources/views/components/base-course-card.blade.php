<div class="card shadow rounded">
  @if ($course->image === null)
  <img class="card-img-top rounded" src="{{ url('assets/images/samples/bg-mountain.jpg') }}" alt="course-image" loading="lazy">
  @else
  <img class="card-img-top rounded" src="{{ url('assets/images/courses/' . $course->image) }}" alt="course-image" loading="lazy">
  @endif
  <div class="card-body">
    <h5 class="card-title">{{ $course->name }}</h5>
    <h6 class="card-subtitle text-muted mb-4">
      <!-- Rp.{{ $course->price ?? 'No price' }} -->
      Rp.{{ number_format($course->price, 0, ',', '.') ?? 'No price' }}
    </h6>
    <div class="d-flex justify-content-between align-items-center">
      <p class="card-text">
        <span class="font-weight-bold">
          <!-- {{ $course->rating ?? 'No rating' }} -->
          <!-- {{ $course->description }} -->
          {!! nl2br(e($course->description)) !!}

        </span>
      </p>
      <form action="{{ route('my-course.store', $course->slug) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger shadow">Pesan</button>
      </form>
    </div>
  </div>
</div>