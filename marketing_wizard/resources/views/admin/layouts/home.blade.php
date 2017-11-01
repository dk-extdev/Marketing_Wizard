<!DOCTYPE html>
<html lang="en">
  <head>
      @include('admin.layouts.head')
  </head> 
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      @include('admin.layouts.header')
      @include('admin.layouts.sidebar')
      <div class="content-wrapper">
      @yield('content')
      </div>
      @include('admin.layouts.footer')
    </div>
    @include('admin.layouts.javascript')
    @yield('scripts')
  </body>
</html>