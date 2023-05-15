<x-lesson-layout title="{{ $course->name }}">
  <x-lesson-sidebar :course="$course" />

  <div id="main">
    <header class="mb-3">
      <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
      </a>
    </header>

    <div class="page-heading">
      <h3>{{ $lesson->name }}</h3>
    </div>

    <div class="page-content">
      <section class="row">
        <div class="col-12">
          <div class="card">
            <iframe class="card-img-top" height="500" src="{{ $lesson->youtube_url }}" title="{{ $lesson->name }}"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen>
            </iframe>
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-12">
                  <h5 class="card-title mb-4">{{ $lesson->name }}</h5>
                  <div class="d-flex justify-content-end align-items-center" style="gap: 1rem;">
                    @if ($prev_lesson_slug !== null)
                      <a href="{{ route('courses.lesson', [$course->slug, $prev_lesson_slug]) }}"
                        class="btn btn-lg btn-outline-primary shadow-sm">Previous</a>
                    @endif
                    @if ($next_lesson_slug !== null)
                      <a href="{{ route('courses.lesson', [$course->slug, $next_lesson_slug]) }}"
                        class="btn btn-lg btn-primary shadow-sm">Next</a>
                    @endif
                    @if ($course->wishlist !== null && $latest_lesson->id === $lesson->id)
                      <form action="{{ route('my-course.destroy', $course->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-lg btn-primary shadow-sm"
                          onclick="return confirm('Are you sure?')">Complete</button>
                      </form>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</x-lesson-layout>
