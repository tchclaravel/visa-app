<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <span class="nav_logo"> <a href="{{route('client.home')}}"><img class="mt-1" style="height: 40px; width:40px;" src="{{asset('app/template/assets/img/logo.png')}}" alt=""> بدايات الأعمال</a></span>
        {{-- <a class="navbar-brand" href="#page-top"><img src="{{asset('app/template/assets/img/navbar-logo.svg')}}" alt="..." /></a> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            {{-- Menu --}}
            <i style="font-size: 30px; margin: 0 auto;" class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="#start">أبدأ الآن</a></li>
                <li class="nav-item"><a class="nav-link" href="#features">المميزات</a></li>
                <li class="nav-item"><a class="nav-link" href="#steps">الخطوات</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">إتصل بنا</a></li>
                <li class="nav-item" style="border: 1px solid #fff;"><a class="nav-link" href="{{route('user.login')}}">متابعة طلب سابق</a></li>
            </ul>
        </div>
    </div>
</nav>