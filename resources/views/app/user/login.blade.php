@extends('app.layout.app_master')


@section('title') تسجيل الدخول  @endsection


@section('content')
<div class="row login">

    <div class="d-flex justify-content-center v-cenetr">
        
        <form class="row g-4 mb-5 mt-5 request-form">
            <h4 class="text-center"> تسجيل الدخول</h5>

            <div class="col-12">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" class="form-control" id="email" placeholder="البريد الإلكتروني هنا">
            </div>
    
            <div class="col-12">
                <label for="password" class="form-label"> كلمة السر</label>
                <input type="text" class="form-control" id="password" placeholder=" أكتب كلمة السر هنا">
            </div>

            <div class="col-12">
                <label for="phone" class="form-label">رقم الجوال</label>
                <input type="text" class="form-control" id="phone" placeholder="أكتب رقم الجوال إذا لم يكن لديك كلمة سر">
              </div>

            <div class="col-12 mb-2">
              <button type="submit" class="btn btn-primary">تسجيل دخول</button>
            </div>

        </form>
    </div>


</div>
@endsection