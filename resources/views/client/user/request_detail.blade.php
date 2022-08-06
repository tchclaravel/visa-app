@extends('client.layout.app_master')


@section('title') تفاصيل الطلب @endsection


@section('content')
<div class="row request-detail">

    <div class="d-flex justify-content-center">
        <div class="row mt-5 mb-5">
            <div class="card col-md-8 mx-auto shadow-sm" style="background: #fff">
                <div class="card-body row">
                    <span class="col-md-5">رقم الطلب : {{$request->request_number}}</span>
                    <span class="col-md-5">رقم الحساب  : {{$request->user->account_id}}</span>
                    <span class="col-md-5">تاريخ الإنشاء : {{$request->created_at->toDateString()}}</span>
                    <span class="col-md-5">الحالة : {{$request->request_status == 'pending' ? 'بإنتظار المراجعة' : 'تم التأكيد'}}</span>
                    <span class="col-md-5">السفارة : {{$request->country->country_name_ar}}</span>
                    <span class="col-md-5">الوجهة : {{$request->city->city_name_ar}}</span>
                    <span class="col-md-5">نوع التأشيرة : @if($request->visa->visa_type == 'tourism') {{'سياحية'}}  @elseif($request->visa->visa_type == 'study') {{'دراسية'}} @else {{'علاجية'}} @endif</span>
                    <span class="col-md-5">تاريخ السفر : {{$request->expected_date}}</span>
                    <span class="col-md-5">مكان المقابلة : 
                        @if($request->interview_place == 'Riyadh')
                            {{'الرياض'}}
                        @elseif($request->interview_place == 'Dhahran')
                            {{'الظهران'}}
                        @else
                            {{'جدة'}}
                        @endif
                    </span>
                    <span class="col-md-5">وسيلة الدفع : 
                        @if($request->payment_method == 'transfer')
                            {{'حوالة بنكية'}}
                        @elseif($request->payment_method == 'e-payment')
                            {{'دفع الكتروني'}}
                        @else
                            {{'نقدي'}}
                        @endif
                    </span>


                    @if(count($travelers) > 0)
                        <?php $i = 1 ?>
                        @foreach($travelers as $traveler)
                            <h6 class="mt-5 mb-3"> المسافر <span class="badge p-1" style="background: #ee3000;">{{$i++}}</span></h6>
                            <hr>
                            @if($traveler->passport->status == 0)
                                <div class="row travelers col-12">
                                    <span><i class="mx-auto d-block fa fa-clock" style="font-size: 70px;"></i></span>
                                    <span class="text-center">في إنتظار تعبئة بيانات الجواز</span>
                                </div>
                            @else
                                <div class="row col-12 travelers mx-auto">
                                    <span class="col-md-5">الأسم الأول : {{$traveler->fname}}</span>
                                    <span class="col-md-5"> أسم العائلة : {{$traveler->lname}}</span>
                                    <span class="col-md-5">الجنس  : {{$traveler->gender == 'male' ? 'ذكر' : 'أنثى'}}</span>
                                    <span class="col-md-5">الحالة الإجتماعية : {{$traveler->gender == 'single' ? 'أعزب' : 'متزوج'}}</span>
                                    <span class="col-md-5">رقم الجواز  : {{$traveler->passport_number}}</span>
                                    <span class="col-md-5">تاريخ إصدار الجواز : {{$traveler->passport_issuance}}</span>
                                    <span class="col-md-5">تاريخ إنتهاء الجواز : {{$traveler->passport_expiry}}</span>
                                    <span class="col-md-5">مدينة إصدار الجواز : {{$traveler->address}} </span>
                                    <span class="col-md-5"> </span>
                                </div>
                            @endif
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>


</div>
@endsection