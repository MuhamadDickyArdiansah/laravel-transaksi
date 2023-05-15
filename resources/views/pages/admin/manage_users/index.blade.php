<x-admin-layout title="All Users">
  <div class="page-heading">
    <h3>Daftar Pengguna</h3>
  </div>
  <div class="page-content">
    <section class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-12">
                <div class="table-responsive">
                  <table class="table table-hover" id="users_table">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($users as $user)
                      <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->status === 1 ? 'Active' : 'Not Active' }}</td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ route('admin.manage-users.show', $user->id) }}">
                                <i class="bi bi-info-circle-fill text-primary"></i>
                                <span class="mx-1">Details</span>
                              </a>
                              <a class="dropdown-item" href="{{ route('admin.manage-users.edit', $user->id) }}">
                                <i class="bi bi-pencil-fill text-primary"></i>
                                <span class="mx-1">Edit</span>
                              </a>
                              <form action="{{ route('admin.manage-users.destroy', $user->id) }}" method="POST" class="d-inline">
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
      $('#users_table').DataTable();
    });
  </script>
  @endpush
</x-admin-layout>