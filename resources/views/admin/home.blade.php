@extends('admin.layout.admin_master')
@section('title') لوحة التحكم @endsection
@section('content')

<div class="row page-titles">
    <h3 class="text-themecolor text-center">لوحة التحكم</h3>
</div>

<div class="row dashboard-width">
    <div class="col-lg-4 col-sm-6 col-xs-12">
      <!-- small box -->
      <div class="small-box" style="background:#3498db">
        <div class="inner">
          <h3>150</h3>

          <p> الطلبات </p>
        </div>
        <div class="icon">
          <i style="font-size: 60px" class="fa-solid fa-list-check"></i>
        </div>
        <a href="{{route('admin.requests')}}" class="small-box-footer">رؤية المزيد <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-sm-6 col-xs-12">
      <!-- small box -->
      <div class="small-box" style="background:#2ecc71">
        <div class="inner">
          <h3>240</h3>

          <p>المستخدمين</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a href="{{route('admin.users')}}" class="small-box-footer"> رؤية المزيد <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-sm-6 col-xs-12">
      <!-- small box -->
      <div class="small-box" style="background:#f39c12">
        <div class="inner">
          <h3>44</h3>

          <p>التأشيرات</p>
        </div>
        <div class="icon">
          <i class="fa fa-check-double"></i>
        </div>
        <a href="{{route('admin.visas')}}" class="small-box-footer"> رؤية المزيد <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-sm-6 col-xs-12">
      <!-- small box -->
      <div class="small-box" style="background:#9b59b6">
        <div class="inner">
          <h3>145</h3>

          <p> الوجهات</p>
        </div>
        <div class="icon">
          <i class="fa fa-globe"></i>
        </div>
        <a href="{{route('admin.cities')}}" class="small-box-footer"> رؤية المزيد <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-sm-6 col-xs-12">
        <!-- small box -->
        <div class="small-box" style="background:#cea558">
            <div class="inner">
            <h3>80</h3>
    
            <p>السفارات</p>
            </div>
            <div class="icon">
            <i class="fa fa-flag"></i>
            </div>
            <a href="{{route('admin.countries')}}" class="small-box-footer"> رؤية المزيد <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-sm-6 col-xs-12">
        <!-- small box -->
        <div class="small-box" style="background:#7f8c8d">
            <div class="inner" style="padding-top:30px; padding-bottom:30px">  
            <p>الإعدادات</p>
            </div>
            <div class="icon">
            <i class="fa fa-gears"></i>
            </div>
            <a href="{{route('admin.settings')}}" class="small-box-footer"> رؤية المزيد <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>


</div>
  
@endsection