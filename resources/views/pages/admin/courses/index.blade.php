<x-admin-layout title="All Courses">
  <div class="page-heading">
    <h3>Layanan</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-12">
                <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
                  <i class="bi bi-plus-lg"></i>
                  <span class="mx-1">Tambah Layanan</span>
                </a>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <div class="table-responsive">
                  <table class="table table-hover" id="courses_table">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <!-- <th>Rating</th> -->
                        <th>Price</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($courses as $course)
                      <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>
                          <img src="{{ url('assets/images/courses/' . $course->image) }}" alt="course" class="img-thumbnail" width="150" load="lazy">
                        </td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->category->name }}</td>
                        <!-- <td>{{ $course->rating ?? 'No rating' }}</td> -->
                        <!-- <td>{{ $course->price ?? 'No price' }}</td> -->
                        <td>Rp.{{ number_format($course->price, 0, ',', '.') ?? 'No price' }}</td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ route('admin.courses.show', $course->slug) }}">
                                <i class="bi bi-info-circle-fill text-primary"></i>
                                <span class="mx-1">Details</span>
                              </a>
                              <a class="dropdown-item" href="{{ route('admin.courses.edit', $course->slug) }}">
                                <i class="bi bi-pencil-fill text-primary"></i>
                                <span class="mx-1">Edit</span>
                              </a>
                              <form action="{{ route('admin.courses.destroy', $course->slug) }}" method="POST" class="d-inline">
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
                        <td colspan="7">
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
      $('#courses_table').DataTable();
    });
  </script>
  @endpush
</x-admin-layout>