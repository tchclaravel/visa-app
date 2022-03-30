@extends('admin.layout.admin_master')
@section('title') الإعدادات @endsection
@section('content')
@section('page-title') الإعدادات @endsection

<div class="settings">

    <!-- Appointments Section -->
    @include('admin.setting.appointments')

    <!-- Banks Section -->
    @include('admin.setting.banks')


    <div class="card col-md-10 appointments">
        <div class="card-title">
            الصفحات
        </div>
        <hr>
    
        <div class="card-body">
            <ul>
                <li>
                    <span class="d-inline-block">سياسة الخصوصية</span>
                    <a href="{{route('admin.pages.edit' , 'privacy_policy')}}" class="btn custom-btn btn-sm d-inline-block float-start" style="position: relative; bottom:3px;"> <i class="fa fa-edit"></i> تعديل</a>
                </li>
                <li>
                    <span class="d-inline-block"> شروط الإستخدام</span>
                    <a href="{{route('admin.pages.edit' , 'terms_of_use')}}" class="btn custom-btn btn-sm d-inline-block float-start" style="position: relative; bottom:3px;"> <i class="fa fa-edit"></i> تعديل</a>
                </li>
            </ul>
        </div>
    </div>

</div>

@endsection