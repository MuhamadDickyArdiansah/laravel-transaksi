<x-admin-layout title="All Lessons">
  <div class="page-heading">
    <h3>Materi</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-12">
                <a href="{{ route('admin.lessons.create') }}" class="btn btn-primary">
                  <i class="bi bi-plus-lg"></i>
                  <span class="mx-1">Tambah Materi</span>
                </a>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <div class="table-responsive">
                  <table class="table table-hover" id="lessons_table">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Youtube URL</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($lessons as $lesson)
                      <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>
                          <a href="{{ $lesson->youtube_url }}" target="_blank" rel="noreferrer noopener">
                            {{ $lesson->youtube_url }}
                          </a>
                        </td>
                        <td>{{ $lesson->name }}</td>
                        <td>{{ $lesson->course->name }}</td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ route('admin.lessons.show', $lesson->slug) }}">
                                <i class="bi bi-info-circle-fill text-primary"></i>
                                <span class="mx-1">Details</span>
                              </a>
                              <a class="dropdown-item" href="{{ route('admin.lessons.edit', $lesson->slug) }}">
                                <i class="bi bi-pencil-fill text-primary"></i>
                                <span class="mx-1">Edit</span>
                              </a>
                              <form action="{{ route('admin.lessons.destroy', $lesson->slug) }}" method="POST" class="d-inline">
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
                        <td colspan="5">
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
      $('#lessons_table').DataTable();
    });
  </script>
  @endpush
</x-admin-layout>