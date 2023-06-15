<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <div class="dropdown">
      <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Welcome back, {{ auth()->user()->name }}
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="/">Home</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="dropdown-item"><i class="bi-box-arrow-right"></i>Logout</button>
          </form>
        </li>
      </div>
    </div>
  </ul>
</nav>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="http://127.0.0.1:8000/" class="brand-link">
    <img src="../../dist/img/karsala.jpg" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Karsala Living</span>
  </a>
  
     <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{strtoupper(auth()->user()->roles)}}</a>
      </div>
    </div>
  
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
              <li class="nav-item">
                <a href="{{ url('') }}" class="nav-link @if(Request::getPathInfo() == '/') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a> 
              </li>
          </li>
          <li class="nav-item">
              <a href="{{ url('barang') }}" class="nav-link @if(Request::getPathInfo() == '/barang') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('transaksi') }}" class="nav-link @if(Request::getPathInfo() == '/transaksi') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Transaksi</p>
            </a>
          </li>
          @if(strtoupper(auth()->user()->roles) != 'PEGAWAI')
          <li class="nav-item">
              <a href="{{ url('pegawai') }}" class="nav-link  @if(Request::getPathInfo() == '/pegawai') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pegawai</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('store') }}" class="nav-link @if(Request::getPathInfo() == '/store') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Store</p>
            </a>
          </li>
          @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>