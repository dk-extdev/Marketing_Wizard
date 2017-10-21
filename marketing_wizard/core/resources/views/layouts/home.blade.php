<!DOCTYPE html>
<html lang="en">

<!-- index.html  2016 00:22:55  -->
<head>
    @include('partials.home.header')
</head>

<body class="wrapper-body">

<!--gt Wrapper Start-->
<div class="gt_wrapper">


    <!--Header Wrap Start-->
    @include('partials.home.menubar')
    <!--Header Wrap End-->

    <!--Main Content Wrap Start-->
    @yield('content')
    <!--Main Content Wrap End-->

    <!--Footer Wrap Start-->
    <footer>
        @include('partials.home.footer')
    </footer>
    <!--Footer Wrap End-->
    <!--Back to Top Wrap Start-->
    <!-- <div class="back-to-top">
        <a href="#home"><i class="fa fa-angle-up"></i></a>
    </div> -->
    <!--Back to Top Wrap Start-->

</div>
<!--gt Wrapper End-->

    @include('partials.home.javascript')
            @yield('scripts')
</body>

<!-- index.html  2016 00:24:52  -->
</html>
