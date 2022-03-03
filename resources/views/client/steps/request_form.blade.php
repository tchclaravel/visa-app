@extends('client.layout.app_master')


@section('title') بيانات الرحلة @endsection


@section('content')
<div class="row flight-data">
    {{-- <h4 class="form-title">بيانات الرحلة</h4> --}}

    <div class="d-flex justify-content-center v-cenetr">
        <form class="row g-4 col-md-6 mb-5 mt-5 request-form" method="POST" action="{{route('client.step_one.store')}}">
          @csrf
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><span class="badge bg-secondary">بيانات الرحلة</span></li>
              <li class="breadcrumb-item"><span>بيانات المسافرين</span></></li>
              <li class="breadcrumb-item"><span>تحديد الموعد</span></li>
            </ol>
          </nav>

          {{-- Display errors validations --}}
          @if ($errors->any())
            <div>
                <ul class="validation_message">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <div class="col-lg-6">
              <label for="country_id" class="form-label d-block">أختر السفارة</label>
              <select name="country_id"  id="country_id" class="scroll" aria-label="Default select example">
                <option value="{{null}}" selected>أختر السفارة</option>
                <option value="1">السودان</option>
                <option value="2">السعودية </option>
                <option value="3">مريكا</option>
                <option value="4">كندا</option>
              </select>
          </div>

          {{-- Livewire status --}}
          <div class="col-lg-6">
            <label for="city_id" class="form-label d-block">أختر الوجهة</label>
            <select name="city_id"  id="city_id" class="scroll" aria-label="Default select example">
              <option value="{{null}}" selected>أختر الوجهة</option>
              <option value="1">الخرطوم</option>
              <option value="2">سانباولو </option>
              <option value="3">مدريد</option>
              <option value="4">برشلونا</option>
            </select>
          </div>   
          
          {{-- Livewire status --}}
          <div class="col-lg-6">
            <label for="visa_type" class="form-label d-block">نوع التأشيرة</label>
            <select name="visa_type"  id="visa_type" aria-label="Default select example">
              <option value="1" selected>سياحية</option>
              <option value="2">علاجية </option>
              <option value="3">دراسية</option>
            </select>
          </div>


          <div class="col-lg-6">
            <label for="travelers_number" class="form-label d-block">عدد المسافرين</label>
            <select name="travelers_number"  id="travelers_number" class="scroll" aria-label="Default select example">
              <option value="1" selected>1</option>
              <option value="2">2 </option>
              <option value="3">3</option>
              <option value="3">4</option>
            </select>
          </div>

          <div class="col-6">
            <label for="expected_date" class="form-label"> تاريخ السفر المتوقع </label>
            <input name="expected_date" type="date" class="form-control" id="expected_date " placeholder="تاريخ إستخراج الجواز">
          </div>

          <div class="col-lg-6">
            <label for="interview_place" class="form-label d-block">أختر مكان المقابلة؟</label>
            <select name="interview_place" id="interview_place" aria-label="Default select example">
              <option value="{{null}}" selected>.....</option>
              <option value="1">الرياض</option>
              <option value="2">الظهران </option>
              <option value="3">جدة</option>
            </select>
          </div>

          <div class="col-11">
            <label for="phone" class="form-label">رقم الجوال</label>
            <input name="phone" type="text" class="form-control" id="phone" placeholder="رقم الجوال هنا">
          </div>

            <div class="col-12 mb-2">
              <button type="submit" class="btn btn-primary">التالي</button>
            </div>
        </form>
    </div>


</div>
@endsection