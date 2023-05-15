<x-admin-layout title="My Course">
  <div class="page-heading">
    <h3>Pesanan</h3>
  </div>
  <div class="page-content">
    <section class="row">
      @forelse ($wishlists as $wishlist)
      <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
          <div class="card-body">
            <div class="card-content">
              @if ($wishlist->course->image === null)
              <img src="{{ url('assets/images/samples/bg-mountain.jpg') }}" class="card-img-top img-fluid" alt="course">
              @else
              <img src="{{ url('assets/images/courses/' . $wishlist->course->image) }}" class="card-img-top img-fluid" alt="course">
              @endif
              <div class="card-body">
                <h5 class="card-title">{{ $wishlist->course->name }}</h5>
                <h6 class="card-subtitle text-muted mb-4">{{ $wishlist->course->category->name }}</h6>
                <p class="card-text">
                  <!-- {{ $wishlist->course->description }} -->
                  {!! nl2br(e($wishlist->course->description)) !!}
                </p>
              </div>
            </div>
            <div class="card-footer">
              <div class="d-flex justify-content-end align-items-center" style="gap: 1rem;">
                <form action="{{ route('my-course.destroy', $wishlist->course->slug) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-outline-primary" onclick="return confirm('Are you sure?');">
                    <i class="bi bi-check-lg"></i>
                    <span class="mx-1">Complete</span>
                  </button>
                </form>
                <form action="{{ route('my-course.store', $wishlist->course->slug) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-primary shadow">
                    <i class="bi bi-eye-fill"></i>
                    <span class="mx-1">Show</span>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="col-lg-4 col-md-6 col-12">
        <div class="alert alert-light-primary" role="alert">
          <i class="bi bi-exclamation-circle"></i>
          <span class="mx-1">No data</span>
        </div>
      </div>
      <div class="col-12">
        <a href="{{ route('courses.index') }}" class="btn btn-primary">
          <i class="bi bi-grid-3x3-gap"></i>
          <span class="mx-1">Telusuri Layanan Baru</span>
        </a>
      </div>
      @endforelse
    </section>
  </div>
</x-admin-layout>