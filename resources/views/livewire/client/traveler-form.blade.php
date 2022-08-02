<form class="row g-4 request-form col-md-6" method="POST" wire:submit.prevent="submitForm" enctype="multipart/form-data">
    @csrf
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><span>بيانات الرحلة</span></li>
            <li class="breadcrumb-item"><span class="badge">بيانات المسافرين</span></></li>
            <li class="breadcrumb-item"><span>تحديد الموعد</span></li>
          </ol>
        </nav>

    @if(session()->get('visa_request.travelers_number') > 1 && session()->get('current_traveler') == 1)
        <div style="color:#f57402; font-size: 22px;">مسافر <span style="font-size: 22px; font-weight:bold;">(1)</span></div>
    @endif

    @if(Session::has('visa_request.travelers_number'))
      @if(session()->get('current_traveler') > 1)
        <div style="color:#f57402; font-size: 22px;">مسافر <span style="font-size: 22px; font-weight:bold;">({{session('current_traveler')}})</span></div>
      @endif
    @endif

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

    <div class="col-12 col-lg-6">
      <label for="fname" class="form-label">الأسم الأول</label>
      <input wire:model.debounce.500ms="fname" name="fname" type="text" class="form-control" id="fname" placeholder="الأسم الأول بالإنجليزية من الجواز">
    </div>

    <div class="col-12 col-lg-6">
      <label for="lname" class="form-label">أسم العائلة</label>
      <input wire:model="lname" name="lname" type="text" class="form-control" id="lname" placeholder="أسم العائلة بالإنجليزية من الجواز">
    </div>

    <div class="col-12">
      <label for="passport_number" class="form-label">رقم الجواز</label>
      <input wire:model.debounce.500ms="passport_number" name="passport_number" type="text" class="form-control" id="passport_number" placeholder="أكتب رقم الجواز">
    </div>

    <div class="col-12 col-lg-6">
      <label for="passport_issuance" class="form-label">تاريخ إستخراج الجواز</label>
      <input wire:model="passport_issuance" name="passport_issuance" type="date" class="form-control" id="passport_issuance">
    </div>

    <div class="col-12 col-lg-6">
      <label for="passport_expiry" class="form-label">تاريخ إنتهاء الجواز</label>
      <input wire:model="passport_expiry" name="passport_expiry" type="date" class="form-control" id="passport_expiry">
    </div>

    <div class="col-lg-6">
        <label for="gender" class="form-label d-block">الجنس</label>
        <select wire:model="gender" class="form-control" name="gender" id="gender" aria-label="Default select example">
          <option value="">---</option>
          <option value="male">ذكر</option>
          <option value="female">أنثى</option>
        </select>
    </div>

    @if(session('current_traveler') == 1)

      <div class="col-lg-6">
        <label for="social_status" class="form-label d-block">الحالة الإجتماعية</label>
        <select wire:model="social_status"class="form-control" name="social_status" id="social_status" aria-label="Default select example">
          <option value="">---</option>
          <option value="single">أعزب</option>
          <option value="married">متزوج</option>
        </select>
      </div>   

    @endif

    <div class="col-lg-6">
      <label for="address" class="form-label d-block">مدينة إصدار الجواز</label>
      <select wire:model="address" name="address" class="form-control" id="address" aria-label="Default select example" class="scroll">
        <option value="">---</option>
        <option value="2">جدة </option>
        <option value="3">الرياض</option>
        <option value="4">مكة</option>
        <option value="5">المدينة</option>
        <option value="6">الدمام</option>
        <option value="7">أبها</option>
        <option value="8">تبوك</option>
      </select>
    </div>


    
    {{-- <div class="col-lg-6">
      <label for="social_status" class="form-label d-block">صورة الجواز</label>
      <input type="file" wire:model="passport" class="form-control">
    </div>    --}}

    <div class="col-12 mb-2">
        <button type="submit" class="btn btn-primary">التالي</button>
    </div>
    
</form>