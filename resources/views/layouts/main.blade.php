<!DOCTYPE html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <style>
  #chartdiv {
  width: 100%;
  height: 500px;
}

.amcharts-g2 {
  stroke-dasharray: 3px 3px;
  stroke-linejoin: round;
  stroke-linecap: round;
  -webkit-animation: am-moving-dashes 1s linear infinite;
  animation: am-moving-dashes 1s linear infinite;
}

@-webkit-keyframes am-moving-dashes {
  100% {
    stroke-dashoffset: -31px;
  }
}
@keyframes am-moving-dashes {
  100% {
    stroke-dashoffset: -31px;
  }
}

.amcharts-graph-column-front {
  -webkit-transition: all .3s .3s ease-out;
  transition: all .3s .3s ease-out;
}
.amcharts-graph-column-front:hover {
  fill: #FFF;
  stroke: #FFF;
  -webkit-transition: all .3s ease-out;
  transition: all .3s ease-out;
}

.amcharts-g3 {
  stroke-linejoin: round;
  stroke-linecap: round;
  stroke-dasharray: 500%;
  stroke-dasharray: 0 /;    /* fixes IE prob */
  stroke-dashoffset: 0 /;   /* fixes IE prob */
  -webkit-animation: am-draw 40s;
  animation: am-draw 40s;
}
@-webkit-keyframes am-draw {
    0% {
        stroke-dashoffset: 500%;
    }
    100% {
        stroke-dashoffset: 0%;
    }
}
@keyframes am-draw {
    0% {
        stroke-dashoffset: 500%;
    }
    100% {
        stroke-dashoffset: 0%;
    }
}

  .nav-item{
    border-radius: 10px;
  }

  .nav-item:hover{
  background:

  }
  .shadow-lg:hover{
    /* border:1px solid rgb(190, 190, 190); */
    /* box-shadow: 0 0rem 0rem rgba(0,0,0,0) !important; */
  }

  .tooltip-inner {
  background-color: #065E74 !important;
  color: white ;
}
  .bs-tooltip-right .arrow::before, .bs-tooltip-auto[x-placement^="right"] .arrow::before {
  border-right-color: #065E74 !important;
}

  /* .card:hover{
    border: 1px solid #4e73df;
  } */

  .bg-custom-sidebar{
    background-color: #4E73DF;
    background-size: auto;
  }
  </style>

  <title>{{ config('app.name', 'Sisfo - Instruktur') }} - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset ('/sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <!-- Custom styles for this template-->
  <link href="{{ asset ('/sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="{{ asset ('/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset ('/sbadmin/vendor/jquery/jquery.min.js') }}"></script>
  <!-- adminpix -->

  <link href="{{ asset ('/adminpix/base.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset ('/adminpix/export.css') }}" rel="stylesheet" type="text/css">

  <link href="{{ asset ('/adminpix/style.css') }}" rel="stylesheet" type="text/css">
  @yield('css-custom')

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-custom-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3 mb-2" href="{{route('home')}}">
        <div class="sidebar-brand-icon">
          <img src="{{ asset('img/logopjb3.png') }}" alt="logo" height="auto" width="100px">
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0 mt-3">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

      <b class="text-light" style="font-size:15px ;margin-left:20px ;margin-top:10px">Menu</b>

      <li class="nav-item "  data-toggle="tooltip" data-placement="right" title="Tampilan Ringkasan!">
      <div class="shadow-lg m-2">
        <a class="nav-link collapsed text-light" href="{{ route('home') }}">
            <i class="fas fa-tachometer-alt text-light" style="font-size:20px"></i>
          <span style="font-size:15px ;margin-left:15px; font-weight:600"> Dashboard</span>
        </a>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block mt-3">

      <b class="text-light" style="font-size:15px ;margin-left:20px ;margin-top:10px">Presensi</b>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item "  data-toggle="tooltip" data-placement="right">
         <div class="shadow-lg m-2">
        <a class="nav-link collapsed" href="{{ route('PresensiInput') }}">
            <i class="fas fa-user-check" style="font-size:20px"></i>
            <span style="font-size:15px ;margin-left:15px">Input</span>
        </a>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item "  data-toggle="tooltip" data-placement="right">
        <div class="shadow-lg m-2">
       <a class="nav-link collapsed" href="{{ route('RecentPresensi') }}">
           <i class="fas fa-history" style="font-size:25px"></i>
           <span style="font-size:15px ;margin-left:15px">History</span>
       </a>
       </div>
     </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block mt-3">

      <b class="text-light" style="font-size:15px ;margin-left:20px ;margin-top:20px ;margin-bottom :5px">Data Master</b>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tampilan Data Instruktur!">
      <div class="shadow-lg m-2">
        <a class="nav-link collapsed" href="{{ route('dashboard.instruktur') }}">
          <i class="fas fa-chalkboard-teacher" style="font-size:20px"></i>
          <span style="font-size:15px ;margin-left:15px" >Instruktur</span>
        </a>
        </div>
      </li>

      {{-- <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item "  data-toggle="tooltip" data-placement="right" title="Tampilan Data Pegawai!">
        <div class="shadow-lg m-2">
          <a class="nav-link collapsed text-light" href="{{ route('dashboard.pegawai') }}">
            <i class="fas fa-users" style="font-size:20px"></i>
            <span style="font-size:15px ;margin-left:15px">Pegawai</span>
          </a>
        </div>
      </li> --}}

        <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Tampilan Data Pelatihan!">
        <div class="shadow-lg m-2">
        <a class="nav-link collapsed" href="{{ route('dashboard.pelatihan') }}">
          <i class="fas fa-user-shield" style="font-size:20px"></i>
          <span style="font-size:15px ;margin-left:15px">Pelatihan</span>
        </a>
        </div>
      </li>

        <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item "  data-toggle="tooltip" data-placement="right" title="Tampilan Data Sertifikasi!">
        <div class="shadow-lg m-2">
        <a class="nav-link collapsed" href="{{ route('dashboard.sertifikasi') }}">
            <i class="fas fa-file-pdf" style="font-size:20px"></i>
            <span style="font-size:15px ;margin-left:25px">Sertifikasi</span>
        </a>
        </div>
      </li>

      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="<img src='http://getbootstrap.com/apple-touch-icon.png' />">
      <div class="shadow-lg m-2 bg-light" >
        <a class="nav-link text-dark" href="/pegawai/laporan">
          <i class="fas fa-fw fa-table text-dark"></i>
          <span>Laporan</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block mt-3">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle" style=";margin-top:25px"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar bg-custom-navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <img src="/img/siinstruktur.png" width="280" height="auto" padding="20">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="cari form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                  <div class="karyawanList"></div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="/foto/D01.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" > {{ __('Logout') }}
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

@yield('konten')


        </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <!-- <div class="row">
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
        </div> -->
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script>
function border() {
  document.getElementByClassName("ubahBorder").style.borderRadius = "10% 0% 61% 0% / 100% 73% 172% 13%";
}
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip({
    animated: 'fade',
    html: true
  });
});

</script>

<script src="{{ asset ('/js/select2.min.js') }}"></script>
<script type="text/javascript">
  $('.cari').select2({
    placeholder: 'Cari...',
    ajax: {
      url: '/cari',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
            return {
              text: item.email,
              id: item.id
            }
          })
        };
      },
      cache: true
    }
  });

</script>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset ('/sbadmin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset ('/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset ('/sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset ('/sbadmin/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset ('/sbadmin/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset ('/sbadmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset ('/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset ('/sbadmin/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset ('/sbadmin/js/demo/chart-pie-demo.js') }}"></script>
  <script src="{{ asset ('/sbadmin/js/demo/chart-bar-demo.js') }}"></script>
  <script src="{{ asset ('/sbadmin/js/demo/datatables-demo.js') }}"></script>


          <!-- START CORE PLUGINS -->
        <!-- <script src="{{ asset ('adminpix/jquery-slimscroll.js') }}"></script>
        <script src="{{ asset ('adminpix/plugins/fastclick/fastclick.js') }}"></script>
        <script src="{{ asset ('adminpix/plugins/metisMenu/metismenu.js') }}"></script>
        <script src="{{ asset ('adminpix/plugins/lobipanel/lobipanel.js') }}"></script> -->
        <!-- Amcharts Js -->

        <!-- START THEME LABEL SCRIPT -->
        <!-- <script src="{{ asset ('adminpix/theme.js') }}"></script> -->

        @include('vendor.sweetalert.alert')

    @yield('script-js')

</body>

</html>
