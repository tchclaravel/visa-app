@extends('app.layout.app_master')


@section('title') بيانات الرحلة @endsection


@section('content')
<div class="row flight-data">
    {{-- <h4 class="form-title">بيانات الرحلة</h4> --}}

    <div class="d-flex justify-content-center v-cenetr">
        <form class="row g-4 col-md-6 mb-5 mt-5 request-form" method="GET" action="{{route('step-2')}}">

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><span class="badge bg-secondary">بيانات الرحلة</span></li>
              <li class="breadcrumb-item"><span>بيانات المسافرين</span></></li>
              <li class="breadcrumb-item"><span>تحديد الموعد</span></li>
            </ol>
          </nav>

          <div class="col-12">
            <label for="email" class="form-label">البريد الإلكتروني</label>
            <input type="email" class="form-control" id="email" placeholder="البريد الإلكتروني هنا">
          </div>

          <div class="col-12">
            <label for="phone" class="form-label">رقم الجوال</label>
            <input type="text" class="form-control" id="phone" placeholder="رقم الجوال هنا">
          </div>

          <div class="col-lg-6">
              <label for="embassy" class="form-label d-block">أختر السفارة</label>
              <select  id="embassy" class="scroll" aria-label="Default select example">
                <option selected>أختر السفارة</option>
                <option value="1">السودان</option>
                <option value="2">السعودية </option>
                <option value="3">مريكا</option>
                <option value="3">كندا</option>
              </select>
          </div>

          {{-- Livewire status --}}
          <div class="col-lg-6">
            <label for="destination" class="form-label d-block">أختر الوجهة</label>
            <select  id="destination" class="scroll" aria-label="Default select example">
              <option selected>أختر الوجهة</option>
              <option style="text-align:right" value="1">السودان</option>
              <option value="2">سانباولو </option>
              <option value="3">مدريد</option>
              <option value="3">برشلونا</option>
            </select>
          </div>   
          
          {{-- Livewire status --}}
          <div class="col-lg-6">
            <label for="visa_type" class="form-label d-block">نوع التأشيرة</label>
            <select  id="visa_type" aria-label="Default select example">
              <option value="1" selected>سياحية</option>
              <option value="2">علاجية </option>
              <option value="3">دراسية</option>
            </select>
          </div>
         
          <div class="col-lg-12">
            <label for="expected_date" class="form-label"> تاريخ السفر المتوقع </label>
            <input type="date" class="form-control" id="expected_date " placeholder="تاريخ إستخراج الجواز">
          </div>

          <div class="col-lg-6">
            <label for="travelers" class="form-label d-block">عدد المسافرين</label>
            <select  id="travelers" class="scroll" aria-label="Default select example">
              <option value="1" selected>1</option>
              <option value="2">2 </option>
              <option value="3">3</option>
              <option value="3">4</option>
            </select>
          </div>

          <div class="col-lg-6">
            <label for="interview_place" class="form-label d-block">أين تريد مكان المقابلة؟</label>
            <select  id="interview_place" class="scroll" aria-label="Default select example">
              <option value="1" selected>الرياض</option>
              <option value="2">الظهران </option>
              <option value="3">جدة</option>
            </select>
          </div>

            <div class="col-12 mb-2">
              <button type="submit" class="btn btn-primary">التالي</button>
            </div>
        </form>
    </div>


</div>
@endsection