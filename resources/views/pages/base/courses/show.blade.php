<x-lesson-layout title="{{ $course->name }}">
  <x-lesson-sidebar :course="$course" />

  <div id="main">
    <header class="mb-3">
      <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
      </a>
    </header>

    <div class="page-heading">
      <h3>{{ $course->name }}</h3>
    </div>

    <div class="page-content">
      <section class="row">
        <div class="col-lg-6 col-md-8 col-12">
          <div class="card">
            @if ($course->image === null)
            <img src="{{ url('assets/images/samples/1.png') }}" class="card-img-top img-fluid" alt="singleminded">
            @else
            <img src="{{ url('assets/images/courses/' . $course->image) }}" class="card-img-top img-fluid" alt="singleminded">
            @endif
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-12">
                  <h5 class="card-title mb-4">{{ $course->name }}</h5>
                  <p>{!! nl2br(e($course->description)) !!}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</x-lesson-layout>