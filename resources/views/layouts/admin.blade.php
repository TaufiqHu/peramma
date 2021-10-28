<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <title>{{ $title ?? 'Perpustakaanku' }} | SMPN 4 Palopo</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}"/>
  <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}"/>
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')}}"/>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-bar-rating/css-stars.css')}}"/>
  <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}"/>
  @yield('css')
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/admin/style.css')}}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}">
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div style="position: fixed;overflow:scroll;max-height:100%;width:260px;">
        <ul class="nav">
          <li class="nav-item nav-profile border-bottom"></li>
          <li class="nav-item pt-1">
            <a class="nav-link d-block" href="index.html">
              <img class="sidebar-brand-logo" src="../assets/images/logo.svg" alt="" />
              <img class="sidebar-brand-logomini" src="../assets/images/logo-mini.svg" alt="" />
            </a>
          </li>
          <li class="pt-2 pb-1">
            <span class="nav-item-head">Applications</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="mdi mdi-apps menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
              <i class="mdi mdi mdi-logout menu-icon"></i>
              <span class="menu-title">Peminjaman</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
              <i class="mdi mdi mdi-login menu-icon"></i>
              <span class="menu-title">Pengembalian</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi mdi-chart-areaspline menu-icon"></i>
              <span class="menu-title">History</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/buttons.html">Peminjaman</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/dropdowns.html">Pengembalian</a>
                </li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="report">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Laporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="report">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/buttons.html">Anggota</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/dropdowns.html">Buku</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/dropdowns.html">Transaksi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/dropdowns.html">Pengunjung</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/dropdowns.html">Statistik</a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li class="pt-2 pb-1">
            <span class="nav-item-head">Data</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('classrooms.index') }}">
              <i class="mdi mdi-houzz-box menu-icon"></i>
              <span class="menu-title">Kelas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('bookcases.index') }}">
              <i class="mdi mdi-view-day menu-icon"></i>
              <span class="menu-title">Rak Buku</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('booktypes.index') }}">
              <i class="mdi mdi-book menu-icon"></i>
              <span class="menu-title">Jenis Buku</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('books.index') }}">
              <i class="mdi mdi-book-open menu-icon"></i>
              <span class="menu-title">Buku</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('student-index') }}">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Siswa</span>
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('setting.index') }}">
              <i class="mdi mdi-settings menu-icon"></i>
              <span class="menu-title">Pengaturan</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <ul class="navbar-nav">
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            @auth
            <li class="nav-item nav-profile d-sm-none d-md-block">
              <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <div class="nav-profile-text">
                  Logout
                </div>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
            @endauth
          </ul>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper pb-0">
          <div class="page-header flex-wrap">
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
              <div class="d-flex align-items-center">
                <h3 class="m-0 pr-3">{{ $title ?? 'Perpustakaanku' }}</h3>
              </div>
            </div>
          </div>
          <!-- first row starts here -->
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright &copy; Rahmawati Umar {{ date('Y') }}</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('assets/vendors/jquery-bar-rating/jquery.barrating.min.js ')}}"></script>
  <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('assets/vendors/flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('assets/vendors/flot/jquery.flot.categories.js') }}"></script>
  <script src="{{ asset('assets/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
  <script src="{{ asset('assets/vendors/flot/jquery.flot.stack.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets/js/misc.js') }}"></script>
  <script src="{{ asset('assets/js/settings.js') }}"></script>
  <script src="{{ asset('assets/js/todolist.js') }}"></script>
  <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <!-- End custom js for this page -->
  {{-- Global Custom JS --}}
  @yield('js')
  <script src="{{ asset('assets/js/app.js') }}"></script>
  <script>
    $(document).ready(function(){
      @if (session('success'))
      console.log('STATUS');
      Swal.fire({
        icon: 'success',
        title: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 1300
      })
      @endif

      @if (session('fail'))
      console.log('STATUS');
      Swal.fire({
        icon: 'error',
        title: '{{ session('fail') }}',
        showConfirmButton: true,
        timer: 2500
      })
      @endif
    })
  </script>
</body>
</html>
