<div class="card shadow rounded">
  @if ($category->image === null)
  <img class="card-img-top rounded" src="{{ url('assets/images/samples/bg-mountain.jpg') }}" alt="category-image" loading="lazy">
  @else
  <img class="card-img-top rounded" src="{{ url('assets/images/categories/' . $category->image) }}" alt="category-image" loading="lazy">
  @endif
  <div class="card-body">
    <h5 class="card-title mb-4">{{ $category->name }}</h5>
    <a href="{{ route('categories.show', $category->slug) }}" class="btn btn-danger shadow">Tampil lebih banyak</a>
  </div>
</div>