<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('judul')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
  <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('demo/demo.css')}}" rel="stylesheet" />
  <style>
    img {
      background-color: white;
      height: 140px;
      width: 170px;
      border: 1px solid white;
      margin-top: 0px;
      margin-left: 25px;
      box-shadow: 0 8px 6px -6px black;
    }
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
          </div>
        </a>
        <a href="#" class="simple-text logo-normal">
          Restaurant
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="">
            <a href="{{'/home'}}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @if (auth()->user()->role == 'Administrator')
          <li>
            <a href="/paketMenu"><i class="nc-icon nc-cart-simple"></i>Paket Menu</a>
          </li>
          <li>
            <a href="{{Route('add_Admin')}}"><i class="nc-icon nc-box"></i>Registrasi</a>
          </li>
          <li>
            <a href="/add/Menu"><i class="nc-icon nc-paper"></i>Tambah Menu</a>
          </li>
          <li>
            <a href="/add/paketMenu"><i class="nc-icon nc-bullet-list-67"></i>Tambah Paket Menu</a>
          </li>
          <li>
            <a href="/list/Order"><i class="nc-icon nc-laptop"></i>Transaksi</a>
          </li>
          <li>
            <a href="/generate/laporan"><i class="nc-icon nc-paper"></i>Generate Laporan</a>
          </li>
          @endif
          @if(auth()->user()->role == 'Waiter')
          <li>
            <a href="/paketMenu"><i class="nc-icon nc-cart-simple"></i>Paket Menu</a>
          </li>
          <li>
            <a href="{{Route('add_Admin')}}"><i class="nc-icon nc-box"></i>Registrasi</a>
          </li>
          @endif
          @if(auth()->user()->role == 'Kasir')
          <li>
            <a href="/paketMenu"><i class="nc-icon nc-cart-simple"></i>Paket Menu</a>
          </li>
          <li>
            <a href="/list/Order"><i class="nc-icon nc-laptop"></i>Transaksi</a>
          </li>
          @endif
          @if(auth()->user()->role == 'Pelanggan')
          <li>
            <a href="/paketMenu"><i class="nc-icon nc-cart-simple"></i>Paket Menu</a>
          </li>
          @endif
          @if(auth()->user()->role == 'Owner')
          <li>
            <a href="/paketMenu"><i class="nc-icon nc-cart-simple"></i>Paket Menu</a>
          </li>
          <li>
            <a href="/generate/laporan"><i class="nc-icon nc-paper"></i>Generate Laporan</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Application Restaurant</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <img src="{{ asset('img/logo-small.png')}}" style="height:50px; width:50px;" alt="">
                <h2 class="d-inline"><i>Daftar Menu</i></h2>
              </div>
              @if (session('status'))
              <div class="alert alert-success my-3">
                {{ session('status') }}
              </div>
              @endif
              <hr>
              <div class="card-body ">
                <div class="container">

                  <div class="row">
                    @foreach($data as $dt)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                      <div class="card card-stats">
                        <div class="card-body ">
                          <div class="row">
                            <div class="col-10 col-md-9">
                              <div class="icon-big text-center icon-warning">
                                <img data-original="http://localhost/FRAMEWORK_PHP/laravel7/project/belajar_laravel5/public/images/{{$dt->gambar}}" />
                              </div>
                            </div>
                            <div class="col-10 col-md-11">
                              <div class="numbers">
                                <center>
                                  <p class="card-category my-2" style="margin-left:20px;">{{$dt->nama_menu}}</p>
                                </center>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer ">
                          <hr>
                          <div class="stats">
                            <i class="fa fa-refresh"></i>
                            <a href="/detail/{{$dt->id}}" style="text-decoration:none;">Order Now</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/jquery.min.js')}}"></script>
    <script src="{{ asset('js/core/popper.min.js')}}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{ asset('js/plugins/chartjs.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('demo/demo.js')}}"></script>
    <script src="{{ asset('js/jquery.lazyload.min.js')}}"></script>
    <script>
      $(document).ready(function() {
        $('img').lazyload();
      });
    </script>

</body>

</html>