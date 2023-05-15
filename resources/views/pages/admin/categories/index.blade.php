<x-admin-layout title="All Category">
  <div class="page-heading">
    <h3>Kategori</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-12">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                  <i class="bi bi-plus-lg"></i>
                  <span class="mx-1">tambah kategori</span>
                </a>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <div class="table-responsive">
                  <table class="table table-hover" id="categories_table">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($categories as $category)
                      <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>
                          <img src="{{ url('assets/images/categories/' . $category->image) }}" alt="category" class="img-thumbnail" width="150" load="lazy">
                        </td>
                        <td>{{ $category->name }}</td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ route('admin.categories.show', $category->slug) }}">
                                <i class="bi bi-info-circle-fill text-primary"></i>
                                <span class="mx-1">Details</span>
                              </a>
                              <a class="dropdown-item" href="{{ route('admin.categories.edit', $category->slug) }}">
                                <i class="bi bi-pencil-fill text-primary"></i>
                                <span class="mx-1">Edit</span>
                              </a>
                              <form action="{{ route('admin.categories.destroy', $category->slug) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class='dropdown-item text-danger' onclick="return confirm('Are you sure?');">
                                  <i class="bi bi-trash-fill"></i>
                                  <span class="mx-1">Delete</span>
                                </button>
                              </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="4">
                          <div class="alert alert-light-primary" role="alert">
                            <i class="bi bi-exclamation-circle"></i>
                            <span class="mx-1">No data</span>
                          </div>
                        </td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @push('addon-scripts')
  <script>
    $(document).ready(function() {
      $('#categories_table').DataTable();
    });
  </script>
  @endpush
</x-admin-layout>