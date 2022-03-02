@extends('client.layout.app_master')


@section('title') تفاصيل الطلب @endsection


@section('content')
<div class="row request-detail">

    <div class="d-flex justify-content-center">
        <div class="row mt-5 mb-5">
            <div class="card mx-auto shadow" style="background: rgb(255, 255, 246)">
                <div class="card-body row">
                    <span class="col-md-5">رقم الطلب : 3474565</span>
                    <span class="col-md-5">اسم المستخدم : محمد عمر</span>
                    <span class="col-md-5">تاريخ الإنشاء : 2/22/2022</span>
                    <span class="col-md-5">الحالة : مؤكد</span>
                    <span class="col-md-5">السفارة : الصينية</span>
                    <span class="col-md-5">الوجهة : هونج كونج</span>
                    <span class="col-md-5">نوع التأشيرة : سياحية</span>
                    <span class="col-md-5">تاريخ السفر : 24/2/2022</span>
                    <span class="col-md-5">مكان المقابلة : الرياض</span>
                    <span class="col-md-5">وسيلة الدفع : حوالة بنكية</span>


                    <h6 class="mt-5 mb-3"> المسافر <span class="badge bg-dark p-1">1</span></h6>
                    <hr>
                    <div class="row col-12 travelers mx-auto">
                        <span class="col-md-5">الأسم الأول : الصديق</span>
                        <span class="col-md-5">الجنس  : ذكر</span>
                        <span class="col-md-5"> الحالة الإجتماعية : اعزب</span>
                        <span class="col-md-5">رقم الجواز  : 324234789745</span>
                        <span class="col-md-5">تاريخ إصدار الجواز : 4/4/2013</span>
                        <span class="col-md-5"> المدينة : أبها </span>
                    </div>


                    <h6 class="mt-5 mb-3"> المسافر <span class="badge bg-dark p-1">2</span></h6>
                    <hr>
                    <div class="row col-12 travelers mx-auto">
                        <span class="col-md-5">الأسم الأول : الصديق</span>
                        <span class="col-md-5">الجنس  : ذكر</span>
                        <span class="col-md-5"> الحالة الإجتماعية : اعزب</span>
                        <span class="col-md-5">رقم الجواز  : 324234789745</span>
                        <span class="col-md-5">تاريخ إصدار الجواز : 4/4/2013</span>
                        <span class="col-md-5"> المدينة : أبها </span>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
@endsection