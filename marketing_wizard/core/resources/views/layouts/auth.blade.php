<!DOCTYPE html>
<html lang="en">

<!-- index.html  2016 00:22:55  -->
<head>
    @include('partials.auth.header')
</head>

<body class="gray-bg">

<!--gt Wrapper Start-->
<div class="gt_wrapper">


    <!--Header Wrap Start-->
    @include('partials.auth.menubar')
    <!--Header Wrap End-->

    <!--Main Content Wrap Start-->
    @yield('content')
    <!--Main Content Wrap End-->

    <!--Footer Wrap Start-->
    <footer>
        @include('partials.auth.footer')
    </footer>
    <!--Footer Wrap End-->
    <!--Back to Top Wrap Start-->
    <div class="back-to-top">
        <a href="#home"><i class="fa fa-angle-up"></i></a>
    </div>
    <!--Back to Top Wrap Start-->

</div>
<!--gt Wrapper End-->

    @include('partials.auth.javascript')
            @yield('scripts')
</body>

<!-- index.html  2016 00:24:52  -->
</html>
