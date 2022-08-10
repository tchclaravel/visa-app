<form class="row g-4 col-md-8 my-4" method="POST" wire:submit.prevent="submitForm">
    @csrf

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
      <input wire:model="passport_issuance" name="passport_issuance" type="date" class="form-control" id="	passport_issuance" placeholder="تاريخ إستخراج الجواز">
    </div>

    <div class="col-12 col-lg-6">
      <label for="passport_expiry" class="form-label">تاريخ إنتهاء الجواز</label>
      <input wire:model="passport_expiry" name="passport_expiry" type="date" class="form-control" id="passport_expiry" placeholder="تاريخ إنتهاء الجواز">
    </div>

    <div class="col-lg-6">
        <label for="gender" class="form-label d-block">الجنس</label>
        <select wire:model="gender" class="form-control" name="gender" id="gender" aria-label="Default select example">
          <option value="">---</option>
          <option value="male">ذكر</option>
          <option value="female">أنثى</option>
        </select>
    </div>

    <div class="col-lg-6">
    <label for="social_status" class="form-label d-block">الحالة الإجتماعية</label>
    <select wire:model="social_status"class="form-control" name="social_status" id="social_status" aria-label="Default select example">
        <option value="">---</option>
        <option value="single">أعزب</option>
        <option value="married">متزوج</option>
    </select>
    </div>   

    <div class="col-lg-6">
      <label for="address_id" class="form-label d-block">مدينة إصدار الجواز</label>
      <select wire:model="address_id" name="address_id" class="form-control" id="address_id" aria-label="Default select example" class="scroll">
        <option value="">---</option>
        @foreach($passport_cities as $city)
          <option value="{{$city->id}}">{{$city->city_name_ar}}</option>
        @endforeach
      </select>
    </div>

    <div class="col-12 mb-2">
        <button type="submit" class="btn btn-primary">التالي</button>
    </div>
    
</form>