@php
    $allsetting = allsetting();
@endphp
<!DOCTYPE HTML>
<html class="no-js" lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="{{allsetting()['meta_description']}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{allsetting()['meta_title']}}"/>
    <meta property="og:image" content="{{asset('assets/admin/images/logo.svg')}}">
    <meta property="og:site_name" content="{{allsetting()['app_title']}}"/>
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta itemprop="image" content="{{asset('assets/admin/images/logo.svg')}}" />

    <link rel="shortcut icon" href="{{asset(IMG_PATH.allsetting()['favicon'])}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/custom.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
    @yield('style')
    <title>@yield('title') {{'| '.allsetting()['meta_title']}}</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                    <i class="fas fa-angle-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('admin_profile')}}" class="dropdown-item">
                        <i class="fas fa-user mr-1"></i></i> {{__('Profile')}}
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('logOut')}}" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-1"></i> {{__('Logout')}}
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{route('admin_dashboard')}}" class="brand-link">
            <img src="{{is_null(allsetting()['login_logo']) || allsetting()['login_logo'] == '' ? asset(IMG_STATIC_PATH.'preloader.png') : asset(IMG_PATH.allsetting()['login_logo'])}}" alt="{{__('logo')}}" class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-light">{{allsetting()['app_title']}}</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item @if(isset($menu) && $menu == 'dashboard') menu-open @endif">
                        <a href="{{route('admin_dashboard')}}" class="nav-link @if(isset($menu) && $menu == 'dashboard') active @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                {{__('Dashboard')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if(isset($menu) && $menu == 'users') menu-open @endif">
                        <a href="#" class="nav-link @if(isset($menu) && $menu == 'users') active @endif">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                {{__('User Management')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin_users')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'user') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('User')}}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if(isset($menu) && $menu == 'coin') menu-open @endif">
                        <a href="#" class="nav-link @if(isset($menu) && $menu == 'coin') active @endif">
                            <i class="nav-icon fas fa-coins"></i>
                            <p>
                                {{__('Coin Management')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('coin_list')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'coin_list') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('Coin List')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('api_settings')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'api-settings') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('Coin API')}}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if(isset($menu) && $menu == 'wallet') menu-open @endif">
                        <a href="{{route('admin_wallet_list')}}" class="nav-link @if(isset($menu) && $menu == 'wallet') active @endif">
                            <i class="nav-icon fas fa-wallet"></i>
                            <p>
                                {{__('Wallet')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if(isset($menu) && $menu == 'transaction') menu-open @endif">
                        <a href="#" class="nav-link @if(isset($menu) && $menu == 'transaction') active @endif">
                            <i class="nav-icon fas fa-university"></i>
                            <p>
                                {{__('Deposit/Withdrawal')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('deposit_history')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'deposit') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('Deposit')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin_pending_withdrawal')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'withdrawal') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('Withdrawal')}}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if(isset($menu) && $menu == 'earnings') menu-open @endif">
                        <a href="{{route('admin_platform_earnings')}}" class="nav-link @if(isset($menu) && $menu == 'earnings') active @endif">
                            <i class="nav-icon fas fa-money-check"></i>
                            <p>
                                {{__('Earnings')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if(isset($menu) && $menu == 'service-transaction') menu-open @endif">
                        <a href="#" class="nav-link @if(isset($menu) && $menu == 'service-transaction') active @endif">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                {{__('Transactions')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin_all_transaction')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'all-transactions') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('All Transactions')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin_transaction_settings')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'transaction-settings') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('Service Charges')}}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if(isset($menu) && $menu == 'category_list') menu-open @endif">
                        <a href="{{route('admin_category_list')}}" class="nav-link @if(isset($menu) && $menu == 'category_list') active @endif">
                            <i class="nav-icon fa fa-list-alt"></i>
                            <p>
                                {{__('Categories')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if(isset($menu) && $menu == 'service_list') menu-open @endif">
                        <a href="{{route('admin_service_list')}}" class="nav-link @if(isset($menu) && $menu == 'service_list') active @endif">
                            <i class="nav-icon fas fa-hand-holding-heart"></i>
                            <p>
                                {{__('Artworks')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if(isset($menu) && $menu == 'contacts') menu-open @endif">
                        <a href="{{route('admin_contact_list')}}" class="nav-link @if(isset($menu) && $menu == 'contacts') active @endif">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>
                                {{__('Contacts')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if(isset($menu) && $menu == 'subscribers') menu-open @endif">
                        <a href="{{route('admin_subscriber_list')}}" class="nav-link @if(isset($menu) && $menu == 'subscribers') active @endif">
                            <i class="nav-icon fas fa-list-ol"></i>
                            <p>
                                {{__('Subscribers')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if(isset($menu) && $menu == 'news_list') menu-open @endif">
                        <a href="{{route('admin_news_list')}}" class="nav-link @if(isset($menu) && $menu == 'news_list') active @endif">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                {{__('News')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if(isset($menu) && $menu == 'faq') menu-open @endif">
                        <a href="#" class="nav-link @if(isset($menu) && $menu == 'faq') active @endif">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                {{__('FAQ')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin_faq_heading')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'heading') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('Heading')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin_faq_content')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'contents') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('Contents')}}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if(isset($menu) && $menu == 'setting') menu-open @endif">
                        <a href="#" class="nav-link @if(isset($menu) && $menu == 'setting') active @endif">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                {{__('Settings')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin_settings')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'general') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('General Settings')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin_slider')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'slider') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('Slider')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin_contents')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'contents') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('Contents')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin_counters')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'counters') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('Counters')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin_payment_setting')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'payment-method') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('Payment Method')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('withdrawal_coin_settings')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'withdrawal-limit') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('Withdrawal Limit')}}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if(isset($menu) && $menu == 'seo') menu-open @endif">
                        <a href="{{route('admin_seo_settings')}}" class="nav-link @if(isset($menu) && $menu == 'seo') active @endif">
                            <i class="nav-icon fab fa-yoast"></i>
                            <p>
                                {{__('SEO')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if(isset($menu) && $menu == 'language') menu-open @endif">
                        <a href="{{route('admin_all_languages')}}" class="nav-link @if(isset($menu) && $menu == 'language') active @endif">
                            <i class="nav-icon fa fa-language"></i>
                            <p>
                                {{__('Language')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if(isset($menu) && $menu == 'caching') menu-open @endif">
                        <a href="#" class="nav-link @if(isset($menu) && $menu == 'caching') active @endif">
                            <i class="nav-icon fab fa-cloudflare"></i>
                            <p>
                                {{__('Caching')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin_cache_configuration')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'cdn') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('CDN')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin_cache_clear')}}" class="nav-link @if(isset($sub_menu) && $sub_menu == 'cache_clear') active @endif">
                                    <i class="fas fa-window-minimize nav-icon"></i>
                                    <p>{{__('Cache Clear')}}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @yield('content')
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>{{allsetting()['copyright_text']}} <a href="javascript:void(0)">{{allsetting()['app_title']}}</a>{{__('.')}}</strong>
        {{__('All rights reserved.')}}
        <div class="float-right d-none d-sm-inline-block">
            <b>{{__('Version')}}</b> {{__('2.1')}}
        </div>
    </footer>
</div>
<!-- js file start -->
<!-- jQuery -->
<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('assets/admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('assets/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/admin/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/admin/dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('assets/admin/chart/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/admin/dist/js/custom.js')}}"></script>
@yield('script')
<!-- End js file -->
</body>
</html>
