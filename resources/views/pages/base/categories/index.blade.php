<x-base-layout title="All Categories">
  <section class="min-vh-100" id="all_categories" style="padding-top: 120px;">
    <div class="container">
      <div class="row mb-4">
        <div class="col-12">
          <h2 class="heading">Kategori</h2>
          <p class="text">Temukan layanan berdasarkan kategori yang telah kami sediakan.</p>
        </div>
      </div>
      <div class="row">
        @forelse ($categories as $category)
        <div class="col-lg-4 col-md-6 col-12 mb-3">
          <x-base-category-card :category="$category" />
        </div>
        @empty
        <div class="col-lg-4 col-md-6 col-12">
          <x-primary-alert :message="'No data'" />
        </div>
        @endforelse
      </div>
      <div class="row mt-4">
        <div class="col-12 d-flex justify-content-end align-items-center">
          {{ $categories->links() }}
        </div>
      </div>
    </div>
  </section>
</x-base-layout>