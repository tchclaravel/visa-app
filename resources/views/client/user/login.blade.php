@extends('client.layout.app_master')


@section('title') تسجيل الدخول  @endsection


@section('content')
<div class="row login">

    @if(Session::has('error'))
    <div class="alert text-center alert-warning alert-dismissible fade show col-md-6 mt-2 mx-auto" role="alert">
        {{session('error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="justify-content-center">
        <form class="row g-4 mb-5 mt-5 col-md-6 request-form" method="POST" action="{{route('user.login.post')}}">
            @csrf
            <h4 class="text-center">متابعة الطلبات السابقة</h5>

            <div class="col-12">
                <label for="account_id" class="form-label"> رقم الحساب</label>
                <input type="password" name="account_id" class="form-control" id="account_id" placeholder="لمتابعة الطلبات السابقة أكتب رقم الحساب هنا ..">
                @error('account_id')
                <span class="validation_message">{{$message}}</span>
                @enderror
            </div>

            <div class="col-12 mb-2">
              <button type="submit" class="btn btn-primary">متابعة</button>
            </div>

        </form>
    </div>


</div>
@endsection