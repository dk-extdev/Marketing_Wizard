<header class="main-header">
  <!-- Logo -->
  <a href="{{ route('admin_dashboard') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>DV</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>DynamicVideo</b> Admin</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
            <span class="hidden-xs">{{{ isset(Auth::guard('admin')->user()->name) ? Auth::guard('admin')->user()->name : Auth::guard('admin')->user()->email }}}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

              <p>
                {{{ isset(Auth::guard('admin')->user()->name) ? Auth::guard('admin')->user()->name : Auth::guard('admin')->user()->email }}}
                <small>Member since Nov. 2012</small>
              </p>
            </li>
            
            <!-- Menu Footer-->
            <li class="user-footer" style="background-color: #3c8dbc;">
              <div class="text-center">
                <a href="{{ route('admin-logout') }}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>