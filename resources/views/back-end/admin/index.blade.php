<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CRM</title>
    <link rel="icon" href="{!! asset('/crmlogo.png') !!}">
    <!-- Tell the browser to be responsive to screen width -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- <link rel="stylesheet" href="{{ asset('/admin/plugins/datepicker/datepicker3.css') }}"> -->
    <!-- summernote -->
    <link rel="stylesheet" href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('header')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@400&display=swap');

        body {
            font-family: 'IBM Plex Sans Thai', sans-serif;
        }

        .datepicker {
            z-index: 1190 !important;
        }

        .modal-backdrop {
            width: 100% !important;
            height: 100% !important;
        }
    </style>
    <style>
        [v-cloak]>* {
            display: none;
        }

        [v-cloak]::before {
            content: " ";
            display: block;
            position: absolute;
            width: 80px;
            height: 80px;
            /* background-image: url(http://pluspng.com/img-png/loader-png-indicator-loader-spinner-icon-512.png); */
            background-size: cover;
            left: 50%;
            top: 50%;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed text-sm sidebar-collapse target">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-light navbar-dark ">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto" id="user_notify">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        @if(auth()->user()->photo)
                        <img src="{{ Storage::disk('spaces')->url(auth()->user()->photo) }}" class="user-image img-circle elevation-2" alt="User Image">
                        @else
                        <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" class="user-image img-circle elevation-2" alt="User Image">
                        @endif
                        <span class="d-none d-md-inline">ตั้งค่า</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if(auth()->user()->photo)
                                    <img src="{{ Storage::disk('spaces')->url(auth()->user()->photo) }}" alt="User profile picture" class="profile-user-img img-fluid img-circle">
                                    @else
                                    <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="User Avatar" class="profile-user-img img-fluid img-circle">
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

                                <p class="text-center  text-success">{{auth()->user()->branch ?auth()->user()->branch->name : '-'}}</p>

                                <ul class="list-group list-group-unbordered mb-3 mt-2">

                                    <li class="list-group-item">
                                        <!-- <a href="/project/commission/user">
                                            <button type="button" class="btn btn-flat btn-block btn-outline-success btn-flat mt-1">โครงการที่รับผิดชอบ</button>
                                        </a> -->
                                        <a href="/user/show">
                                            <button type="button" class="btn btn-flat btn-block btn-outline-secondary btn-flat mt-1">จัดการข้อมูลส่วนตัว</button>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item dropdown-footer"><i class="fa fa-btn fa-sign-out"></i> ออกจากระบบ</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4" id="main_app">
            <a href="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/index3.html" class="brand-link">
                <img src="{{asset('/crmlogo.png')}}" alt="CRM LOGO" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">CRM</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if(auth()->user()->profile_photo_path)
                        <img src="{{ Storage::disk('spaces')->url(auth()->user()->profile_photo_path) }}" alt="User Avatar" class="img-size-50 img-circle">
                        @else
                        <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="User Avatar" class="img-size-50 img-circle">
                        @endif
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{auth()->user()->name}}</a>
                    </div>
                </div>
                <!-- <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header text-info"><i class="fas fa-caret-down"></i>สินค้า</li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (request()->is('group/resource')) ? 'active' : '' }} (request()->is('steels/resources')) ? 'active' : '' }} {{ (request()->is('resource/unit')) ? 'active' : '' }} {{ (request()->is('type/resource')) ? 'active' : '' }} ; ">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    สินค้า
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: {{ (request()->is('group/resource')) ? 'block' : '' }} {{ (request()->is('steels/resources')) ? 'block' : '' }} {{ (request()->is('type/resource')) ? 'block' : '' }} {{ (request()->is('resource/unit')) ? 'block' : '' }} ;">
                                <li class="nav-item">
                                    <a href="/steels/resources" class="nav-link {{ (request()->is('steels/resources') ? 'active' : '' ) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>สินค้า</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/type/resource" class="nav-link {{ (request()->is('type/resource')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ประเภทสินค้า</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/group/resource" class="nav-link {{ (request()->is('group/resource')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>กลุ่มสินค้า</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/resource/unit" class="nav-link {{ (request()->is('resource/unit')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>หน่วยสินค้า</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav> -->
                @can('setting')
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header text-info"><i class="fas fa-caret-down"></i> ตั้งค่า</li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (request()->is('admin/users')) ? 'active' : '' }} {{ (request()->is('admin/permissions')) ? 'active' : '' }} {{ (request()->is('admin/roles')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    พนักงาน
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: {{ (request()->is('admin/users')) ? 'block' : '' }} {{ (request()->is('admin/permissions')) ? 'block' : '' }} {{ (request()->is('admin/roles')) ? 'block' : '' }};">
                                <li class="nav-item">
                                    <a href="/admin/users" class="nav-link {{ (request()->is('admin/users')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายชื่อพนักงาน</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/roles" class="nav-link {{ (request()->is('admin/roles')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ตำแหน่ง</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/permissions" class="nav-link {{ (request()->is('admin/permissions')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>สิทธิ์การใช้งาน</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                @endcan
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>


        <aside class="control-sidebar control-sidebar-dark">
        </aside>



    </div>

    <!-- jQuery -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <!-- <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/moment/moment.min.js"></script>
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- <script src="{{ asset('/admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script> -->
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="https://taweechai-bucket.s3-ap-southeast-1.amazonaws.com/upvc/admin/dist/js/demo.js"></script>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <!-- https://sweetalert2.github.io/#download -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('footer')
</body>

</html>