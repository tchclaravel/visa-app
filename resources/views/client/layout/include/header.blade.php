<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNavApp">
    <div class="container">
        <span class="nav_logo"> <a href="{{route('client.home')}}"> بدايات الأعمال </a></span>
        {{-- <a class="navbar-brand" href="#page-top"><img src="{{asset('app/template/assets/img/navbar-logo.svg')}}" alt="..." /></a> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            {{-- Menu --}}
            <i style="font-size: 30px; margin: 0 auto;" class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                @guest
                <li class="nav-item" style="border: 1px solid #fff;"><a class="nav-link" href="{{route('user.login')}}">متابعة طلب سابق</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('client.step_one')}}"> ابدأ الآن</a></li>
                @endguest
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{route('user.profile')}}" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; font-weight:600;">ID : {{Auth::user()->account_id}}</a></li> 
                    <li class="nav-item"><a class="nav-link" href="{{route('client.step_one')}}"><i class="fa fa-plus"></i> طلب جديد</a></li> 
                    <li class="nav-item"><a class="nav-link" href="{{route('user.logout')}}">تسجيل الخروج</a></li> 
                @endauth
            </ul>
        </div>
    </div>
</nav>