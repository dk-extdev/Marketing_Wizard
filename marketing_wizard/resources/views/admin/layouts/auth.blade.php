<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.auth.header')
</head>

<body class="hold-transition login-page">
    @yield('content')
    @include('admin.auth.javascript')
    @yield('scripts')
</body>
</html>
