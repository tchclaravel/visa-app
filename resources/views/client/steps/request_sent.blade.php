@extends('client.layout.app_master')


@section('title') تأكيد الطلب @endsection


@section('content')
<div class="row confirm-request">

    <div class="d-flex justify-content-center v-cenetr">
        <div class="row mt-5 mb-5 success">
                <img class="img-fluid d-block mx-auto" src="{{asset('app/template/design/check.png')}}" alt="">
                <span class="nice">مبروك!</span> <br>
                <span class="mb-1">تم تأكيد الطلب</span>
                <hr>
                <span class="mt-1">رقم الطلب</span>
                <h1 class="mb-4">{{session('request_number')}}</h1>
                
                <span>
                    يمكنك متابعة هذا الطلب <br>
                    من حسابك الشخصي <a href="{{route('user.profile')}}">من هنا</a>
                </span>              

        </div>
    </div>


</div>
@endsection