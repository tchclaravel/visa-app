<form class="row g-4 request-form" method="POST" wire:submit="submitForm" action="{{route('client.step_two.store')}}">
    @csrf
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><span>بيانات الرحلة</span></li>
            <li class="breadcrumb-item"><span class="badge bg-secondary">بيانات المسافرين</span></></li>
            <li class="breadcrumb-item"><span>تحديد الموعد</span></li>
          </ol>
        </nav>

    @if(Session::has('visa_request.travelers_number'))
        <div>مسافر ({{session('current_traveler')}})</div>
    @endif

    {{-- Display errors validations --}}
      <div>
          <ul class="validation_message">
          </ul>
      </div>

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

    {{-- <div>
      <ul class="validation_message">
          @error('fname') <li>{{ $message }}</li> @enderror
          @error('lname') <li>{{ $message }}</li> @enderror
          @error('passport_number') <li>{{ $message }}</li> @enderror
          @error('passport_issuance') <li>{{ $message }}</li> @enderror
          @error('passport_expiry') <li>{{ $message }}</li> @enderror
          @error('gender') <li>{{ $message }}</li> @enderror
          @error('social_status') <li>{{ $message }}</li> @enderror
          @error('address') <li>{{ $message }}</li> @enderror
      </ul>
    </div> --}}

    <div class="col-12 col-lg-6">
      <label for="fname" class="form-label">الأسم الأول</label>
      <input wire:model.debounce.500ms="fname" name="fname" type="text" class="form-control" id="fname" placeholder="الأسم الأول بالإنجليزية من الجواز">
    </div>

    <div class="col-12 col-lg-6">
      <label for="lname" class="form-label">أسم العائلة</label>
      <input wire:model.debounce.500ms="lname" name="lname" type="text" class="form-control" id="lname" placeholder="أسم العائلة بالإنجليزية من الجواز">
    </div>

    <div class="col-12">
      <label for="passport_number" class="form-label">رقم الجواز</label>
      <input wire:model="passport_number" name="passport_number" type="text" class="form-control" id="passport_number" placeholder="أكتب رقم الجواز">
    </div>

    <div class="col-12 col-lg-6">
      <label for="passport_issuance" class="form-label">تاريخ إستخراج الجواز</label>
      <input wire:model="passport_issuance" name="passport_issuance" type="date" class="form-control" id="	passport_issuance" placeholder="تاريخ إستخراج الجواز">
    </div>

    <div class="col-12 col-lg-6">
      <label for="passport_expiry" class="form-label">تاريخ إنتهاء الجواز</label>
      <input wire:model.defer="passport_expiry" name="passport_expiry" type="date" class="form-control" id="passport_expiry" placeholder="تاريخ إنتهاء الجواز">
    </div>

    <div class="col-lg-6">
        <label for="gender" class="form-label d-block">الجنس</label>
        <select wire:model="gender" name="gender" id="gender" aria-label="Default select example">
          <option value="1">ذكر</option>
          <option value="2">أنثى</option>
        </select>
    </div>

    <div class="col-lg-6">
      <label for="social_status" class="form-label d-block">الحالة الإجتماعية</label>
      <select wire:model="social_status" name="social_status" id="social_status" aria-label="Default select example">
        <option value="1">أعزب</option>
        <option value="2">متزوج</option>
      </select>
    </div>   

    <div class="col-lg-6">
      <label for="address" class="form-label d-block">المدينة التي تقيم بها</label>
      <select wire:model="address" name="address" id="address" aria-label="Default select example" class="scroll">
        <option value="{{null}}" selected>أختر المدينة</option>
        <option value="2">جدة </option>
        <option value="3">الرياض</option>
        <option value="4">مكة</option>
        <option value="5">المدينة</option>
        <option value="6">الدمام</option>
        <option value="7">أبها</option>
        <option value="8">تبوك</option>
      </select>
    </div>

    <div class="col-12 mb-2">
        {{-- <button type="submit" class="btn btn-secondary">رجوع</button> --}}
        <button type="submit" class="btn btn-primary">التالي</button>
    </div>
    
</form>