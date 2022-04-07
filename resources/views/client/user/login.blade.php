@extends('client.layout.app_master')


@section('title') تسجيل الدخول  @endsection


@section('content')
<div class="row login">

    @if(Session::has('success'))
    <div class="alert text-center alert-success alert-dismissible fade show col-md-6 mt-2 mx-auto" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @elseif(Session::has('error'))
    <div class="alert text-center alert-warning alert-dismissible fade show col-md-6 mt-2 mx-auto" role="alert">
        {{session('error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- @if(Session::has('error'))
    <div class="toast show text-white border-1 mt-1 custom_toast error_toast"  role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
            {{session('error')}}  
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>

    @elseif(Session::has('success'))
    <div class="toast show text-white border-1 mt-1 custom_toast"  role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{session('success')}}  
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @endif --}}

    <div class="d-flex justify-content-center v-cenetr">
        <form class="row g-4 mb-5 mt-5 request-form" method="POST" action="{{route('user.login.post')}}">
            @csrf
            <h4 class="text-center"> تسجيل الدخول</h5>

            <div class="col-12">
                <label for="account_id" class="form-label"> رقم الحساب</label>
                <input type="password" name="account_id" class="form-control" id="account_id" placeholder=" أكتب رقم الحساب هنا">
                @error('account_id')
                <span class="validation_message">{{$message}}</span>
                @enderror
            </div>

            <div class="col-12 mb-2">
              <button type="submit" class="btn btn-primary">تسجيل دخول</button>
            </div>

        </form>
    </div>


</div>
@endsection