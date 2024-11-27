<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Dashboard')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/css/adminlte.min.css')}}">
 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="ion-android-person"></i> <i class="far fa-person"></i>
                  </a>
                  
                  <div class="dropdown-menu  dropdown-menu-right">
                      <button type="submit" class="dropdown-item dropdown-footer">Cerrar sesión</a>
                  </div>
              </li>
            </form>
        </ul>
    </nav>

    

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="/" class="d-block">Prueba de PHP</a>
        </div>
      </div>

      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Carga y venta</li>
          <li class="nav-item">
            <a href="/movements" class="nav-link {{ Request::is('movements') ? 'active' : '' }}">
              <i class="nav-icon far ion-card"></i>
              <p>
                POS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/movements" class="nav-link {{ Request::is('movements') ? 'active' : '' }}">
              <i class="nav-icon far ion-log-in"></i>
              <p>
                Cargar stock
              </p>
            </a>
          </li>
      </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Módulos</li>
          <li class="nav-item">
            <a href="/categories" class="nav-link {{ Request::is('categories') ? 'active' : '' }}">
              <i class="nav-icon far ion-android-checkbox-outline"></i>
              <p>
                Categorías
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/products" class="nav-link {{ Request::is('products') ? 'active' : '' }}">
              <i class="nav-icon far ion-cube"></i>
              <p>
                Productos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/sales" class="nav-link {{ Request::is('sales') ? 'active' : '' }}">
              <i class="nav-icon far ion-ios-cart"></i>
              <p>
                Ventas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/kanban.html" class="nav-link">
              <i class="nav-icon fas ion-ios-download"></i>
              <p>
                Cargas
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @yield('sectiontitle')
          </div>
          
        </div>
      </div>
    </div>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
  </div>

</div>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/js/adminlte.js')}}"></script>

@yield('scripts')

</body>
</html>
