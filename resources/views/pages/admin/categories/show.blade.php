<x-admin-layout title="Category">
  <div class="page-heading">
    <h3>Kategori</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-md-6 col-12">
        <div class="card">
          <div class="card-body">
            <div class="card-content">
              @if ($category->image === null)
              <img src="{{ url('assets/images/samples/1.png') }}" class="card-img-top img-fluid" alt="singleminded">
              @else
              <img src="{{ url('assets/images/categories/' . $category->image) }}" class="card-img-top img-fluid" alt="singleminded">
              @endif
              <div class="card-body">
                <h5 class="card-title mb-4">{{ $category->name }}</h5>
              </div>
            </div>
            <div class="card-footer">
              <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">
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