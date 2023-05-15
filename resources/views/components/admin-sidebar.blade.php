<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
      <div class="d-flex justify-content-between align-items-center">
        <div class="logo">
          <a href="{{ route('home') }}" style="font-size: 20px;">Ventuno Production</a>
        </div>
        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
            <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
              <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
              <g transform="translate(-210 -1)">
                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                <circle cx="220.5" cy="11.5" r="4"></circle>
                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
              </g>
            </g>
          </svg>
          <div class="form-check form-switch fs-6">
            <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
            <label class="form-check-label"></label>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
            <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
            </path>
          </svg>
        </div>
        <div class="sidebar-toggler x">
          <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
        </div>
      </div>
    </div>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-title">Menu</li>
        @if (auth()->user()->role === 'admin')
        <li class="sidebar-item {{ Route::current()->getName() === 'admin.dashboard' ? 'active' : '' }}">
          <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
            <i class="bi bi-house-fill"></i>
            <span>Dashboard</span>
          </a>
        </li>
        @endif
        <li class="sidebar-item has-sub {{ str_contains(Route::current()->getName(), 'profile') ? 'active' : '' }}">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-door-open-fill"></i>
            <span>Profile</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <a href="{{ route('profile.show') }}">My Profile</a>
            </li>
            <li class="submenu-item">
              <a href="{{ route('profile.edit') }}">Edit Profile</a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item has-sub {{ str_contains(Route::current()->getName(), 'my-course') ? 'active' : '' }}">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-door-open-fill"></i>
            <span>Pesanan</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <a href="{{ route('my-course.index') }}">Pesanan</a>
            </li>
          </ul>
        </li>
        @if (auth()->user()->role === 'admin')
        <li class="sidebar-item has-sub {{ str_contains(Route::current()->getName(), 'admin.categories') ? 'active' : '' }}">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-door-open-fill"></i>
            <span>Kategori</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <a href="{{ route('admin.categories.index') }}">Kategori</a>
            </li>
            <li class="submenu-item">
              <a href="{{ route('admin.categories.create') }}">Tambah Kategori</a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item has-sub {{ str_contains(Route::current()->getName(), 'admin.courses') ? 'active' : '' }}">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-door-open-fill"></i>
            <span>Layanan</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <a href="{{ route('admin.courses.index') }}">Layanan</a>
            </li>
            <li class="submenu-item">
              <a href="{{ route('admin.courses.create') }}">Tambah Layanan</a>
            </li>
          </ul>
        </li>
        <!-- <li class="sidebar-item has-sub {{ str_contains(Route::current()->getName(), 'admin.lessons') ? 'active' : '' }}">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-door-open-fill"></i>
            <span>Materi</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <a href="{{ route('admin.lessons.index') }}">Materi</a>
            </li>
            <li class="submenu-item">
              <a href="{{ route('admin.lessons.create') }}">Tambah Materi</a>
            </li>
          </ul>
        </li> -->
        <li class="sidebar-item has-sub {{ str_contains(Route::current()->getName(), 'admin.manage-users') ? 'active' : '' }}">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-door-open-fill"></i>
            <span>Kelola Pengguna</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <a href="{{ route('admin.manage-users.index') }}">Pengguna</a>
            </li>
          </ul>
        </li>
        @endif
        <li class="sidebar-item mt-5">
          <a href="{{ route('home') }}" class='btn btn-primary'>
            <i class="bi bi-house-fill"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="sidebar-item mt-2">
          <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#logout">
            <i class="bi bi-box-arrow-left"></i>
            <span class="mx-1">Logout</span>
          </button>
        </li>
      </ul>
    </div>
  </div>
</div>

<!--Logout Modal -->
<div class="modal fade text-left" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Logout</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure to logout?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">
          <i class="bx bx-x"></i>
          <span class="mx-1">Cancel</span>
        </button>
        <form action="{{ route('logout') }}" method="POST" class="d-inline ml-1" data-bs-dismiss="modal">
          @csrf
          <button type="submit" class='btn btn-primary'>
            <i class="bi bi-box-arrow-left"></i>
            <span class="mx-1">Logout</span>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>