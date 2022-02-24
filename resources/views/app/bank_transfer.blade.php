@extends('app.layout.app_master')


@section('title') حوالة بنكية @endsection


@section('content')
<div class="row bank-transfer">
    
    <div class="d-flex justify-content-center v-cenetr">
        
        <form class="row g-4 mb-5 mt-5 request-form" method="GET" action="{{route('confirm_request')}}">
            <h4 class="text-center">حوالة بنكية</h5>
            <div class="col-lg-12 cover mb-2">
                <img src="{{asset('app/template/design/banks.jpg')}}" class="img-fluid" alt="banks">
            </div>

            <div class="row total-price">
                <div class="col-sm-8">
                    <h4>إجمالي المبلغ</h4>
                </div>
                <div class="col-sm-4">
                    <h3>٣٤٥٠<span style="font-size: 20px;">ريال</span></h3>
                </div>
            </div>

            <div class="col-12">
                <label for="embassy" class="form-label d-block" style="color: #f54702">يمكنك الدفع عن طريق الحوالة البنكية إلى أحد البنوك التالية</label>
                <select  id="embassy"class="scroll" aria-label="Default select example">
                    <option value="1" selected>أختر البنك </option>
                    <option value="1">بنك الرياض</option>
                    <option value="1"> مصرف الراجحي</option>
                    <option value="1">بنك الجزيرة </option>
                    <option value="1"> البنك السعودي الفرنسي</option>
                    <option value="1"> مصرف الإنماء</option>
                </select>
            </div>

            {{-- Livewire status --}}
            <div class="col-12 bank-detail">
                <hr style="color: #ccc">
                <h5>أسم البنك</h5>
                <span>أسم الحساب: </span>
                <span>رقم الحساب : </span>
                <span>ايبان : </span>
            </div>

            <div class="col-12 mb-2">
              {{-- <button type="submit" class="btn btn-secondary">رجوع</button> --}}
              <button type="submit" class="btn text-white" style="background: rgb(96, 168, 1)">تأكيد</button>
            </div>
        </form>
    </div>


</div>
@endsection