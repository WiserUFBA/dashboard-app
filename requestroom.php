<!-- Verify if a user is logged in -->
<?php include 'verify_restrict.php'; ?>
<!-- If it is... -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Smart-UFBA | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
        <!-- Theme style -->
        <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

        <!-- Ion Slider -->
        <link href="plugins/ionslider/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
        <!-- ion slider Nice -->
        <link href="plugins/ionslider/ion.rangeSlider.skinNice.css" rel="stylesheet" type="text/css" />


        <link href="dist/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />  

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo"><b>Smart-</b>UFBA</a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">2</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 2 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-warning text-aqua"></i> You have access to 261 of the IM room.
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-yellow"></i> Welcome to Smart-UFBA Dashboard 
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!--<li class="footer"><a href="#">View all</a></li>-->
                                </ul>
                            </li>

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="img/use-cassio.jpg" class="user-image" alt="User Image"/>
                                    <span class="hidden-xs">Cássio Prazeres</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="img/use-cassio.jpg" class="img-circle" alt="User Image" />
                                        <p>
                                            Cássio Prazeres - Research
                                            <small>Member since April. 2015</small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/use-cassio.jpg" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Cássio Prazeres</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">Options</li>
                        <li class="active treeview">
                            <a href="#">
                                <i class="fa fa-bars"></i> <span>My rooms</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active"><a href="dashboard.html"><i class="fa fa-dashboard"></i>IM261</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-plus"></i>
                                <span>Send request</span>
                                <!--<span class="label label-primary pull-right">4</span>-->
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Request room</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Request laboratory</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cog"></i>
                                <span>Settings</span>
                                <!--<span class="label label-primary pull-right">4</span>-->
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Name</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Password</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Email</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-question"></i> Help</a></li>
                        <li><a href="#"><i class="fa fa-bug"></i> Report Bug</a></li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- =============================================== -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Authorization request for room control
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Send Request</a></li>
                        <li class="active">Request room</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Complete the form to send the request</h3>
                            <div class="box-tools pull-right">
                                </div>
                        </div>
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" required="" class="form-control input-lg" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputNumber">Room code</label>
                                    <input type="text" required="" maxlength="8" class="form-control input-lg" id="exampleInputNumber" placeholder="Room number">
                                </div>
                                <div class="form-group has-warning">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" required="" class="form-control input-lg" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Written authorization</label>
                                    <input type="file" id="exampleInputFile">
                                    <p class="help-block">If you have.</p>
                                </div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div><!-- /.box -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.0
                </div>
                <strong>Copyright &copy; 2014-2015 <a href="#">WISER Group</a>.</strong> All rights reserved.
            </footer>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.3 -->
        <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- Ion Slider -->
        <script src="plugins/ionslider/ion.rangeSlider.min.js" type="text/javascript"></script>

        <!-- Bootstrap slider -->
        <script src="plugins/bootstrap-slider/bootstrap-slider.js" type="text/javascript"></script>

        <script src="js/js.js" type="text/javascript"></script>
        <!-- jQuery UI 1.11.2 -->
        <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
        <!-- Morris.js charts -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck 
        <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>-->
        <!-- Slimscroll -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

        <script src="dist/js/bootstrap-switch.min.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js" type="text/javascript"></script>

    </body>
</html>