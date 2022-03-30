<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon --><b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <span class="main-logo d-block">تأشيرتك علينا</span>
                    {{-- <img src="{{asset('/admin/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" /> --}}
                    <!-- Light Logo icon -->
                    {{-- <img src="{{asset('/admin/assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" /> --}}
                </b>
                <!--End Logo icon -->
                {{-- <!-- Logo text --><span>
                    <!-- dark Logo text -->
                    <img src="{{asset('/admin/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                    <!-- Light Logo text -->
                    <img src="{{asset('/admin/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /></span> --}}
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto">
                <?php $route = Route::current() ?>

                <li class="nav-item"> <a style="font-size: 40px; color:#0673b3;" class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                        href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item hidden-xs-down search-box"> <a
                        class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i
                            class="fa fa-search"></i></a>
                    @if($route->getName() == 'admin.countries')
                        <form class="app-search" method="GET" action="{{route('admin.countries.search')}}">
                            <input name="input" type="text" class="form-control" placeholder="Search & enter"> <a
                                class="srh-btn"><i class="fa fa-times"></i></a>
                        </form>
                    @elseif($route->getName() == 'admin.countries.search')
                        <form class="app-search" method="GET" action="{{route('admin.countries.search')}}">
                            <input name="input" type="text" class="form-control" placeholder="Search & enter"> <a
                                class="srh-btn"><i class="fa fa-times"></i></a>
                        </form>
                    @elseif($route->getName() == 'admin.cities')
                    <form class="app-search" method="GET" action="{{route('admin.cities.search')}}">
                        <input name="input" type="text" class="form-control" placeholder="Search & enter"> <a
                            class="srh-btn"><i class="fa fa-times"></i></a>
                    </form>
                    @elseif($route->getName() == 'admin.cities.search')
                    <form class="app-search" method="GET" action="{{route('admin.cities.search')}}">
                        <input name="input" type="text" class="form-control" placeholder="Search & enter"> <a
                            class="srh-btn"><i class="fa fa-times"></i></a>
                    </form>
                    @elseif($route->getName() == 'admin.users')
                    <form class="app-search" method="GET" action="{{route('admin.users.search')}}">
                        <input name="input" type="text" class="form-control" placeholder="Search & enter"> <a
                            class="srh-btn"><i class="fa fa-times"></i></a>
                    </form>
                    @elseif($route->getName() == 'admin.users.search')
                    <form class="app-search" method="GET" action="{{route('admin.users.search')}}">
                        <input name="input" type="text" class="form-control" placeholder="Search & enter"> <a
                            class="srh-btn"><i class="fa fa-times"></i></a>
                    </form>
                    @endif
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#"
                        id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{-- <img src="{{asset('/admin/assets/images/users/1.jpg')}}" alt="user" class="" /> --}}
                        <span class="hidden-md-down">عبدالرحمن</span>
                    </a>

                    <a class="nav-link  waves-effect waves-dark profile-pic" href="{{route('admin.logout')}}">
                    <i class="fa fa-power-off fa-lg mt-4"></i>
                </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                </li>
            </ul>
        </div>
    </nav>
</header>