@extends('app.layout.app_master')


@section('title') بيانات المسافرين @endsection


@section('content')
<div class="row traveler-data">
    {{-- <h4 class="form-title">بيانات الرحلة</h4> --}}

    <div class="d-flex justify-content-center v-cenetr">
        
        <form class="row g-4 mb-5 mt-5 request-form" method="GET" action="{{route('step-3')}}">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><span>بيانات الرحلة</span></li>
                  <li class="breadcrumb-item"><span class="badge bg-secondary">بيانات المسافرين</span></></li>
                  <li class="breadcrumb-item"><span>تحديد الموعد</span></li>
                </ol>
              </nav>

            <div class="row notify-user">
                <div class="col-sm-9">
                    <span>قم بالضغط على الصورة لتوضيح الخانات المطلوبة على الجواز</span>
                </div>

                <div class="col">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                            <img class="img-fluid" src="{{asset('app/template/design/passport.jpeg')}}" alt="..." />
                        </a>
                    </div>
                </div>
            </div>

          <div class="col-12 col-lg-6">
            <label for="fname" class="form-label">الأسم الأول</label>
            <input type="text" class="form-control" id="fname" placeholder="أكتب الأسم الأول من الجواز">
          </div>

          <div class="col-12 col-lg-6">
            <label for="lname" class="form-label">أسم العائلة</label>
            <input type="text" class="form-control" id="lname" placeholder="أكتب الأسم العائلة من الجواز">
          </div>

          <div class="col-12">
            <label for="passport_num" class="form-label">رقم الجواز</label>
            <input type="text" class="form-control" id="passport_num" placeholder="أكتب رقم الجواز">
          </div>

          <div class="col-12 col-lg-6">
            <label for="passport_issue" class="form-label">تاريخ إستخراج الجواز</label>
            <input type="date" class="form-control" id="passport_issue" placeholder="تاريخ إستخراج الجواز">
          </div>

          <div class="col-12 col-lg-6">
            <label for="passport_expiry" class="form-label">تاريخ إنتهاء الجواز</label>
            <input type="date" class="form-control" id="passport_expiry" placeholder="تاريخ إنتهاء الجواز">
          </div>

          <div class="col-lg-6">
              <label for="embassy" class="form-label d-block">الجنس</label>
              <select  id="embassy" aria-label="Default select example">
                <option value="1">ذكر</option>
                <option value="2">أنثى</option>
              </select>
          </div>

          <div class="col-lg-6">
            <label for="destination" class="form-label d-block">الحالة الإجتماعية</label>
            <select  id="destination" aria-label="Default select example">
              <option value="3">أعزب</option>
              <option value="3">متزوج</option>
            </select>
          </div>   

          <div class="col-lg-6">
            <label for="city" class="form-label d-block">المدينة التي تقيم بها</label>
            <select  id="city" aria-label="Default select example" class="scroll">
              <option value="1" selected>أختر المدينة</option>
              <option value="2">جدة </option>
              <option value="3">الرياض</option>
              <option value="3">مكة</option>
              <option value="3">المدينة</option>
              <option value="3">الدمام</option>
              <option value="3">أبها</option>
              <option value="3">تبوك</option>
            </select>
          </div>

            <div class="col-12 mb-2">
              {{-- <button type="submit" class="btn btn-secondary">رجوع</button> --}}
              <button type="submit" class="btn btn-primary">التالي</button>
            </div>
        </form>
        {{-- <div class="image col-md-6 my-2">
          <img src="{{asset('app/template/design/start-setp.png')}}" alt="">
        </div> --}}
    </div>



    {{-- Show big photo --}}
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="{{asset('app/template/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <img class="img-fluid d-block mx-auto" src="{{asset('app/template/design/passport.jpeg')}}" alt="..." />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection