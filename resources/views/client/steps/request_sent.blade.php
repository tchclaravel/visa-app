@extends('client.layout.app_master')


@section('title') تأكيد الطلب @endsection


@section('content')
<div class="row confirm-request">

    <div class="justify-content-center">
        <div class="row mt-5 mb-5 success">
                <img class="img-fluid d-block mx-auto" src="{{asset('app/template/design/check.png')}}" alt="">
                <span class="nice">مبروك!</span> <br>
                <span class="mb-1">تم تأكيد الطلب</span>
                <hr>
                <span class="mt-1">رقم الطلب</span>
                <h1 class="mb-4">{{session('request_number')}}</h1>
                
                <span class="mt-1">رقم الحساب</span>
                <h1 style="background: none; color:#ee3000;">{{session('account_id')}}</h1>
                <span class="mb-4" style="color: rgb(82, 82, 82); font-size:12px;">يرجى حفظ رقم الحساب لتتمكن من الدخول به لحسابك</span>


                <span>
                    يمكنك متابعة هذا الطلب <br>
                    من حسابك الشخصي <a  style="color: #ee3000" href="{{route('user.profile')}}">من هنا</a>
                </span>              

        </div>
    </div>


</div>
@endsection