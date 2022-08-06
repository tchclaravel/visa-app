<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, AdminWrap lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, AdminWrap lite design, AdminWrap lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="AdminWrap Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title')</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/x-icon" href="{{asset('app/template/assets/img/favicon-admin.png')}}">
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/admin/assets/node_modules/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{asset('/admin/assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- Arabic Droid Font -->
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/droid-arabic-kufi" type="text/css"/>
    <!-- FontAwsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--c3 CSS -->
    <link href="{{asset('/admin/assets/node_modules/c3-master/c3.min.css')}}" rel="stylesheet">
    <!-- Media Query -->
    <link href="{{asset('/admin/css/media.css')}}" rel="stylesheet">

    <!-- Dashboard 1 Page CSS -->
    <link href="{{asset('/admin/css/pages/dashboard1.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('/admin/css/colors/default.css')}}" id="theme" rel="stylesheet">
    {{-- Tostar Style --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Style CSS -->
    <link href="{{asset('/admin/css/style.css')}}" rel="stylesheet">
    {{-- Dashboard CSS --}}
    <link href="{{asset('/admin/css/dashboard.css')}}" rel="stylesheet">    
    <!-- Custom CSS -->
    <link href="{{asset('/admin/css/custom.css')}}" rel="stylesheet">    


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    @livewireStyles
</head>

<body class="fix-header fix-sidebar card-no-border" style="font-family: 'DroidArabicKufiRegular'">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    {{-- <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Wrap</p>
        </div>
    </div> --}}
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('admin.layout.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('admin.layout.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">@yield('page-title')</h3>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->

                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            {{-- <footer class="footer"> © 2021 Adminwrap by <a href="https://www.wrappixel.com/">wrappixel.com</a> </footer> --}}
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    @livewireScripts
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('/admin/assets/node_modules/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{asset('/admin/assets/node_modules/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('/admin/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('/admin/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('/admin/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('/admin/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{asset('/admin/assets/node_modules/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('/admin/assets/node_modules/morrisjs/morris.min.js')}}"></script>
    <!--c3 JavaScript -->
    <script src="{{asset('/admin/assets/node_modules/d3/d3.min.js')}}"></script>
    <script src="{{asset('/admin/assets/node_modules/c3-master/c3.min.js')}}"></script>
    <!-- Chart JS -->
    <script src="{{asset('/admin/js/dashboard1.js')}}"></script>

    {{-- Editor JS --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    
    {{-- Tostar Js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if(Session::has('message'))
        <script>

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "700",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            var type = "{{Session::get('alert-type' , 'info')}}";

            switch(type){
                case 'info':
                toastr.info("{{Session::get('message')}}");
                break;

                case 'success':
                toastr.success("{{Session::get('message')}}");
                break;

                case 'warning':
                toastr.warning("{{Session::get('message')}}");
                break;

                case 'error':
                toastr.error("{{Session::get('message')}}");
                break;      
            }

        </script>
    @endif

    @yield('script')
</body>

</html>