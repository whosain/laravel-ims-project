<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Collapsed Sidebar Layout</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="{{ asset('asset/bootstrap/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('asset/dist/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/plugins/datatables/dataTables.bootstrap.css') }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('asset/dist/css/skins/_all-skins.min.css') }}">
        <link href="{{ asset('asset/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="skin-blue sidebar-collapse sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="{{ asset('asset/index2.html') }}" class="logo">
                  <!-- mini logo for sidebar mini 50x50 pixels -->
                  <span class="logo-mini"><b>UA</b></span>
                  <!-- logo for regular state and mobile devices -->
                  <span class="logo-lg"><b>User Akses</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                  <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ asset('asset/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                                    <span class="hidden-xs"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="{{ asset('asset/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                                        <p>
                                            {{Session::get('realname')}}
                                            <!-- <small>Member since Nov. 2012</small> -->
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <!-- <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                          <a href="#">Friends</a>
                                        </div>
                                    </li> -->
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                          <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                           <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <!-- <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li> -->
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar" style="height: auto;">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ asset('asset/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>{{Session::get('realname')}}</p>
                            
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MENU</li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ asset('asset/index.html') }}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                            </ul>
                        </li>
                        <li class="treeview active">
                            <a href="#">
                                <i class="fa fa-files-o"></i>
                                <span>Master</span>
                                <span class="label label-primary pull-right"></span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ url('/jenis') }}"><i class="fa fa-circle-o"></i> Master Jenis</a></li>
                                <li><a href="{{ url('/lokasi') }}"><i class="fa fa-circle-o"></i> Master Lokasi</a></li>
                                <li><a href="{{ url('/vendor') }}"><i class="fa fa-circle-o"></i> Master Vendor</a></li>
                                <li><a href="collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Master User</a></li>
                            </ul>
                        </li>
                        <li class="treeview active">
                            <a href="#">
                                <i class="fa fa-server"></i>
                                <span>Asset</span>
                                <span class="label label-primary pull-right"></span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ url('/jenis') }}"><i class="fa fa-circle-o"></i> Asset Atlasat</a></li>
                                <li><a href="{{ url('/lokasi') }}"><i class="fa fa-circle-o"></i> Asset SCN</a></li>
                                <li><a href="{{ url('/stb') }}"><i class="fa fa-circle-o"></i> Asset STB Header</a></li>
                                <li><a href="{{ url('/stbdetail') }}"><i class="fa fa-circle-o"></i> Asset STB Detail</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            

        
      


