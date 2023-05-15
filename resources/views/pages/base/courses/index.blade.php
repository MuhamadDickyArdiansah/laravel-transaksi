<x-base-layout title="All Courses">
  <section class="min-vh-100" id="all_courses" style="padding-top: 120px;">
    <div class="container">
      <div class="row mb-4">
        <div class="col-12">
          <h2 class="heading">Daftar Layanan</h2>
        </div>
      </div>
      <div class="row">
        @forelse ($courses as $course)
        <div class="col-lg-4 col-md-6 col-12 mb-3">
          <x-base-course-card :course="$course" />
        </div>
        @empty
        <div class="col-lg-4 col-md-6 col-12">
          <x-primary-alert :message="'No data'" />
        </div>
        @endforelse
      </div>
      <div class="row mt-4">
        <div class="col-12 d-flex justify-content-end align-items-center">
          {{ $courses->links() }}
        </div>
      </div>
    </div>
  </section>
</x-base-layout>