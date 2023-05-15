<x-base-layout title="{{ $category->name }}">
  <section class="min-vh-100" id="category_course" style="padding-top: 120px;">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <h2 class="heading">{{ $category->name }}</h2>
          <p class="text">Layanan foto studio yang menyediakan sesi pemotretan yang cepat dengan waktu proses pengambilan foto yang singkat, cocok untuk keperluan yang membutuhkan hasil foto dalam waktu yang singkat.</p>
          <a href="{{ route('categories.index') }}" class="btn btn-outline-primary shadow-sm">Kategori</a>
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