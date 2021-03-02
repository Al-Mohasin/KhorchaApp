<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend') }}/images/{{ App\Models\Logo::find(1)->favicon }}"> --}}
{{-- <title>Khorcha</title> --}}
<title>@yield("page_title")</title>
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

<!-- google font link -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

{{-- <link href="{{ asset('backend') }}/css/font-awesome.min.css" rel="stylesheet"> --}}
<link href="{{ asset('backend') }}/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('backend') }}/css/dataTables.bootstrap4.min.css" rel="stylesheet">

{{-- <link href="{{ asset('backend') }}/css/bootstrap-datepicker.min.css" rel="stylesheet"> --}}

<link href="{{ asset('backend') }}/css/style_admin_press.css" rel="stylesheet">
<link href="{{ asset('backend') }}/css/blue.css" id="theme" rel="stylesheet">
<link href="{{ asset('backend') }}/css/imageselect_crop/imgareaselect.css" rel="stylesheet">
<link href="{{ asset('backend') }}/css/style.css" rel="stylesheet">
</head>
<body class="fix-header fix-sidebar card-no-border">
<!-- ====================================================================================================== -->
<!-- ====================================================================================================== -->
<!-- Preloader -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10" />
    </svg>
</div>
<!-- / Preloader -->

<!-- MAIN WRAPPER -->
<div id="main-wrapper">
<!-- ======================================================================= -->
<!-- Topbar header -->
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">

        <!-- Logo (header top left) -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <b>
                    <img src="{{ asset('uploads') }}/logo.png" alt="homepage" class="myLogo" />
                    {{-- <img src="{{ asset('backend') }}/images/{{ App\Models\Logo::find(1)->logo }}" alt="homepage" class="myLogo" /> --}}
                </b>
            </a>
        </div>
        <!-- / Logo (header top left) -->

        <!-- header top right -->
        <div class="navbar-collapse">
            <!-- toggle and nav items -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

                <!-- Comment -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <div class="dropdown-menu mailbox animated slideInUp">
                        <ul>
                            <li>
                                <div class="drop-title">Notifications</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Luanch Admin</h5>
                                            <span class="mail-desc">Just see the my new admin!</span>
                                            <span class="time">9:30 AM</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- / Comment -->

                <!-- Messages -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <div class="dropdown-menu mailbox animated slideInUp" aria-labelledby="2">
                        <ul>
                            <li>
                                <div class="drop-title">You have 4 new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <a href="index.html#">
                                        <div class="user-img">
                                            <img src="{{ asset('backend') }}/images/users/1.jpg" alt="user" class="img-circle">
                                            <span class="profile-status online pull-right"></span>
                                        </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5>
                                            <span class="mail-desc">Just see the my admin!</span>
                                            <span class="time">9:30 AM</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- / Messages -->
            </ul>
            <!-- / toggle and nav items -->

            <!-- User profile and search -->
            <ul class="navbar-nav my-lg-0">
                <!-- Search -->
                <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                </li>
                <!-- / Search -->

                <!-- Language -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-bd"></i></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <a class="dropdown-item" href="index.html#"><i class="flag-icon flag-icon-in"></i> India</a>
                        <a class="dropdown-item" href="index.html#"><i class="flag-icon flag-icon-fr"></i> French</a>
                        <a class="dropdown-item" href="index.html#"><i class="flag-icon flag-icon-cn"></i> China</a>
                        <a class="dropdown-item" href="index.html#"><i class="flag-icon flag-icon-de"></i> Dutch</a>
                    </div>
                </li>
                <!-- / Language -->

                <!-- User Profile (header top) -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('uploads') }}/user/{{ Auth::user()->photo }}" alt="user" class="profile-pic" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img">
                                        <img src="{{ asset('uploads') }}/user/{{ Auth::user()->photo }}" alt="user">
                                    </div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p>
                                        <a href="{{ url('user_details/'.Auth::user()->id) }}" class="myButtonSmall">View Profile</a>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('user_details') }}/{{ Auth::user()->id }}"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <!-- logout -->
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> {{ __('Logout') }}</a>
                            </li>

                            <!-- / logout -->
                        </ul>
                    </div>
                </li>
                <!-- / User Profile (header top) -->
            </ul>
            <!-- / User profile and search -->
        </div>
        <!-- / header top right -->
    </nav>
</header>
<!-- / Topbar header -->
<!-- ======================================================================= -->
<!-- Left Sidebar -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">

        <!-- User profile (sidebar) -->
        <div class="user-profile">
            <div class="profile-img">
                <img src="{{ asset('uploads') }}/user/{{ Auth::user()->photo }}" alt="user" />
                <!-- blinking heartbit-->
                <div class="notify setpos">
                    <span class="heartbit"></span> <span class="point"></span>
                </div>
                <!-- / blinking heartbit-->
            </div>


            <div class="profile-text">
                <h5 class="logged_name">{{ Auth::user()->name }}</h5>
                <h5 class="logged_role">{{ Auth::user()->relation_role->role_name }}</h5>

                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                <a href="#l" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- Logout -->
                <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout">
                    <i class="mdi mdi-power"></i>
                </a>
                <!-- / Logout -->

                <div class="dropdown-menu animated flipInY">
                    <a href="{{ url('user_details/'.Auth::user()->id) }}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                    <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                    <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                    <div class="dropdown-divider"></div>
                    <!-- logout -->
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i> {{ __('Logout') }}
                    </a>
                    <!-- / logout -->
                </div>
            </div>
        </div>
        <!-- / User profile (sidebar) -->

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="nav-devider"></li>

                <li>
                    <a class=" waves-effect waves-dark" href="{{ route('home') }}" aria-expanded="false">
                        <i class="mdi mdi-home-outline"></i>
                        <span class="hide-menu">Home</span>
                    </a>
                </li>

                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="icon-people"></i>
                        <span class="hide-menu">User Info
                            <span class="label label-rouded label-themecolor pull-right">{{ Auth::user()->count() }}</span>
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('all_user') }}">All Users</a></li>
                        <li><a href="{{ route('add_user') }}">Register User</a></li>
                    </ul>
                </li>

                <li>
                    <a class=" waves-effect waves-dark" href="{{ url('all_summary') }}" aria-expanded="false">
                        <i class="fa fa-th-list"></i>
                        <span class="hide-menu">Summary</span>
                    </a>
                </li>

                <li>
                    <a class=" waves-effect waves-dark" href="{{ url('all_estimate') }}" aria-expanded="false">
                        <i class="fa fa-th"></i>
                        <span class="hide-menu">All Estimate</span>
                    </a>
                </li>

                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="fa fa-money"></i>
                        <span class="hide-menu">Earn</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('all_earn') }}">All Earn</a></li>
                        <li><a href="{{ url('add_earn') }}">Add Earn</a></li>
                        <li><a href="{{ url('all_earncategory') }}">All Earn-Category</a></li>
                        <li><a href="{{ url('add_earncategory') }}">Add Earn-Category</a></li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="fa fa-minus-circle"></i>
                        <span class="hide-menu">Paid</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('all_paid') }}">All Paid</a></li>
                        <li><a href="{{ url('add_paid') }}">Add Paid</a></li>
                        <li><a href="{{ url('all_paidcategory') }}">All Paid-Category</a></li>
                        <li><a href="{{ url('add_paidcategory') }}">Add Paid-Category</a></li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="icon-trash"></i>
                        <span class="hide-menu">Recycled</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('recycle_earn') }}">Earn </a></li>
                        <li><a href="{{ url('recycle_paid') }}">Paid </a></li>
                        <li><a href="{{ url('recycle_earncategory') }}">Earn-Category </a></li>
                        <li><a href="{{ url('recycle_paidcategory') }}">Paid-Category </a></li>
                    </ul>
                </li>

                <!-- Logout -->
                <li>
                    <a class=" waves-effect waves-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
                        <i class="fa fa-power-off"></i>
                        <span class="hide-menu">Logout</span>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                <!-- /Logout -->

            </ul>
        </nav>
        <!-- / Sidebar navigation -->
    </div>
    <!-- / Sidebar scroll-->
</aside>
<!-- / Left Sidebar  -->
<!-- ======================================================================= -->
<!-- Page wrapper  -->
<div class="page-wrapper">

    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">
                <b>@yield("page_title")</b>
            </h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb my_breadcrumb" style="white-space: nowrap; display: flex;">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="separator"> <i class="fa fa-chevron-right"></i> </li>
                <li class="breadcrumb-item active">@yield("breadcrumbs")</li>
            </ol>
        </div>
    </div>
    <!-- / Bread crumb and right sidebar toggle -->

    <!-- Content (changeable)  -->
    <div class="container-fluid">
        @yield("content")
    </div>
    <!-- / Content (changeable)  -->

    <footer class="footer text-center">
         © <?php echo date("Y");?> dm Admin by
         <a class="footer_link" href="https://www.developerm.com" target="_blank"> developerm.com</a>
     </footer>
</div>
<!-- / Page wrapper  -->
<!-- ======================================================================= -->
</div>
<!-- / MAIN WRAPPER -->

<!-- ====================================================================================================== -->
<!-- ====================================================================================================== -->
<!-- All JS -->
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script src="{{ asset('backend') }}/js/jQuery-3.3.1.min.js"></script>
<script src="{{ asset('backend') }}/js/popper.min.js"></script>
<script src="{{ asset('backend') }}/js/bootstrap.min.js"></script>

<script src="{{ asset('backend') }}/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend') }}/js/dataTables.bootstrap4.min.js"></script>

{{-- <script src="{{ asset('backend') }}/js/bootstrap-datepicker.min.js"></script> --}}

<script src="{{ asset('backend') }}/js/jquery.slimscroll.js"></script>
<script src="{{ asset('backend') }}/js/waves.js"></script>
<script src="{{ asset('backend') }}/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="{{ asset('backend') }}/js/sticky-kit.min.js"></script>
<script src="{{ asset('backend') }}/js/custom.min.js"></script>

<!-- admin js start ============ -->
<!-- counter -->
<script src="{{ asset('backend') }}/js/waypoints-4.0.1.min.js"></script>
<script src="{{ asset('backend') }}/js/jquery.counterup_new.min.js"></script>
<script src="{{ asset('backend') }}/js/jquery.sparkline.min.js"></script>
<!--morris JavaScript -->
<script src="{{ asset('backend') }}/js/raphael-min.js"></script>
<script src="{{ asset('backend') }}/js/morris.min.js"></script>
<!-- Chart JS -->
<script src="{{ asset('backend') }}/js/dashboard1.js"></script>
<!-- admin js ends =============-->

{{-- <script src="{{ asset('backend') }}/js/cropper.js"></script> --}}
<script src="{{ asset('backend') }}/js/jquery.imgareaselect.min.js"></script>
<script src="{{ asset('backend') }}/js/jQuery.style.switcher.js"></script>
<script src="{{ asset('backend') }}/js/sweetalert2.all.min.js"></script>
<script src="{{ asset('backend') }}/js/my_custom.js"></script>
<script>
    $(document).ready(function() {
        $("#my_datatable").DataTable();
        $("#search").click(function() {
            var from = $('#datepickerFrom').val();
            var to = $('#datepickerTo').val();
            var base_url = window.location.origin;
            var url = base_url + '/admin/summary/search/' + from + '/' + to;
            location.href = url;
        });
    });
</script>

@yield("footer_script")

</body>
</html>
