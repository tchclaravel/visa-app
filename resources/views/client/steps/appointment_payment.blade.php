@extends('client.layout.app_master')


@section('title')الموعد و الدفع @endsection


@section('content')
<div class="row appointment-data">

    <div class="d-flex justify-content-center v-cenetr">
        
        <form class="row g-4 mb-5 mt-5 request-form" method="POST" action="{{route('client.step_three.store')}}">
          @csrf
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><span>بيانات الرحلة</span></li>
                  <li class="breadcrumb-item"><span>بيانات المسافرين</span></></li>
                  <li class="breadcrumb-item"><span class="badge bg-secondary">تحديد الموعد</span></li>
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

            <div class="row total-price">
                <div class="col-sm-8">
                    <h4>إجمالي المبلغ</h4>
                </div>
                <div class="col-sm-4">
                    <h3>٣٤٥٠<span style="font-size: 20px;">ريال</span></h3>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-12">
                    <label for="appointment" class="form-label d-block">أختر الموعد</label>
                    <select name="appointment" id="appointment" class="form-control" aria-label="Default select example">
                      <option value="">---</option>
                      <option value="1">أختر الموعد الذي يناسبك</option>
                      <option value="2">دعنا نتصل بك لتحديد الموعد</option>
                      <option value="3">اقرب موعد متاح (في السفارة)</option>
                      <option value="4">أقرب موعد متاح (في غضون أسبوعين)</option>
                      <option value="5">أقرب موعد متاح (في غضون 3 أسابيع)</option>
                    </select>
                </div>
      
                <div class="col-12">
                  <label for="payment_method" class="form-label d-block">أختر وسيلة الدفع</label>
                  <select name="payment_method"  id="payment_method" class="form-control" aria-label="Default select example">
                    <option value="">---</option>
                    <option value="1"> دفع نقدي </option>
                    <option value="2"> حوالة بنكية</option>
                    <option value="3"> دفع عبر البطاقات الإتمانية</option>
                  </select>
                </div>   
            </div>

            <div class="col-12 mb-2">
              {{-- <button type="submit" class="btn btn-secondary">رجوع</button> --}}
              <button type="submit" class="btn btn-primary">التالي</button>
            </div>
        </form>
    </div>


</div>
@endsection