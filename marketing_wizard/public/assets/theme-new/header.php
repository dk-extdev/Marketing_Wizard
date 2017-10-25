<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dynamic Video Project</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    
</head>
    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="js/plugins/staps/jquery.steps.min.js"></script>

    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>

    <!-- Peity demo -->
    <script src="js/demo/peity-demo.js"></script>

<body class="top-navigation">

    <div id="wrapper" class = 'wrapper-body' >
        <div id="page-wrapper" class="dark-bg">
        <div class="row border-bottom white-bg top-header-bar">
            <div class = "container" >
                <nav class="navbar navbar-static-top" role="navigation">
                    <div class="navbar-header">
                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <i class="fa fa-reorder"></i>
                        </button>
                        <a href="index.php?menu=dashboard" class="navbar-brand">Dynamic Video</a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <li class = "create_video">
                                <a aria-expanded="false" role="button" href="index.php?menu=create_video"><i class="fa fa-play-circle-o"></i> <span class="nav-label">Create Video</span></a>
                            </li>
                            <li <?php if ($sel_menu == 'my_videos') echo 'class="active"'; ?>>
                                <a aria-expanded="false" role="button" href="index.php?menu=my_videos"><i class="fa fa-align-left"></i> <span class="nav-label">My Videos</span></a>
                            </li>
                            <li <?php if ($sel_menu == 'my_purchases') echo 'class="active"'; ?>>
                                <a aria-expanded="false" role="button" href="index.php?menu=my_purchases"><i class="fa fa-shopping-cart"></i> <span class="nav-label">My Purchases</span></a>
                            </li>
                            <li <?php if ($sel_menu == 'settings') echo 'class="active"'; ?>>
                                <a aria-expanded="false" role="button" href="index.php?menu=settings"><i class="fa fa-gear"></i> <span class="nav-label">Settings</span></a>
                            </li>
                        </ul>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                              customer@dynaticvideo.com
                            </li>
                            <li>
                                <a href="login.html">
                                    <i class="fa fa-sign-out"></i> 
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="wrapper wrapper-content">
          <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">