
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HOTDOT</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

 <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li>
  <div class="input-group input-group-sm" style="width: 200px;">
    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
      <div class="input-group-append">
         <button type="submit" class="btn btn-default">
           <i class="fas fa-search"></i>
        </button>
  </div>
</div>
      </li>
    </ul>
    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light">Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./images/profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
             <i class="fa fa-university nav-icon text-blue" aria-hidden="true"></i>
              <p>
                Dashboard
              </router-link>
            </a>
        </li>
       <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-users nav-icon text-orange" aria-hidden="true"></i>
              <p>
              Customer Manager
                <i class="right fas fa-angle-left nav-icon text-orange"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/cyberCustomers" class="nav-link">
                  <i class="fa fa-user nav-icon text-orange" aria-hidden="true"></i>
                  <p>Cyber Customers</p>
                </router-link>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="fa fa-user nav-icon text-orange" aria-hidden="true"></i>
                  <p>Internet Customers</p>
                </a>
              </li>
            </ul>
          </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
               <i class="fa fa-comments nav-icon" aria-hidden="true"></i>
              <p>
               SMS Manager
              </p>
            </a>
        </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
             <i class="fa fa-product-hunt nav-icon" aria-hidden="true"></i>
              <p>
              Products
                <i class="right fas fa-angle-left nav-icon"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
               <i class="fa fa-window-restore nav-icon" aria-hidden="true"></i>
                  <p>Add Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li>

        <li class="nav-item">
            <router-link to="/users" class="nav-link">
             <i class="fa fa-cog nav-icon" aria-hidden="true"></i>
              <p>
              Manage Users
              </p>
            </router-link>
        </li>

         <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                  <i class="fa fa-power-off nav-icon text-red" aria-hidden="true"></i>
               <p>
              {{ __('Logout') }}
              </p>
              </a>
       
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
        </li>
       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <router-view></router-view>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- Default to the left -->
    <strong>Hotdot Cyber
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/js/app.js"></script>
</body>
</html>
