<form class="row g-4 col-md-6 mb-5 mt-5 request-form" method="POST" wire:submit.prevent="storeRequest">
    @csrf
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><span class="badge bg-secondary">بيانات الرحلة</span></li>
        <li class="breadcrumb-item"><span>بيانات المسافرين</span></></li>
        <li class="breadcrumb-item"><span>تحديد الموعد</span></li>
      </ol>


      @if(!is_null($visa_type))
        <div class="row total-price">
          <div class="col-7 mt-1 mr-2">
              <h5>إجمالي المبلغ</h5>
          </div>
          <div class="col-5 mt-1 mr-2">
              <h4><span class="price">{{$visa->visa_price * $travelers_number}}</span><span class="sar">ريال سعودي</span></h3>
          </div>
        </div>
      @endif
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

    <div class="col-lg-6 select">
        <label for="country_id" class="form-label d-block">أختر السفارة</label>
        <select wire:model="country_id" class="form-control" aria-label="Default select example">
          <option value="">---</option>
          @foreach($countries as $country)
          <option value="{{$country->id}}">{{$country->country_name}}</option>
          {{-- <option value="1">السودان</option>
          <option value="2">السعودية </option>
          <option value="3">مريكا</option>
          <option value="4">كندا</option> --}}
          @endforeach
        </select>
    </div>

    {{-- Livewire status --}}
    <div class="col-lg-6 select">
        <label for="city_id" class="form-label d-block">أختر الوجهة </label>
        <select wire:model="city_id" name="city_id" class="form-control"  id="city_id" aria-label="Default select example">
          <option value="">---</option>
          @if (count($cities) > 0)
            @foreach($cities as $city)
              <option value="{{$city->id}}">{{$city->city_name}}</option>
            @endforeach
          @endif 
        </select>
    </div>  
    
    {{-- Livewire status --}}
    <div class="col-lg-6 select">
      <label for="visa_type" class="form-label d-block">نوع التأشيرة</label>
      <select wire:model="visa_type" name="visa_type" class="form-control" id="visa_type" aria-label="Default select example">
        <option value="">---</option>
        @if (count($visas) > 0)
          @foreach($visas as $visa)
            <option value="{{$visa->id}}" {{$visa->id == 2 ? 'selected' : ''}}>{{$visa->visa_type}}</option>
          @endforeach
        @endif 
        {{-- <option value="2">علاجية </option>
        <option value="3">دراسية</option> --}}
      </select>
    </div>


    <div class="col-lg-6 select">
      <label for="travelers_number" class="form-label d-block">عدد المسافرين</label>
      <select wire:model="travelers_number" class="form-control" name="travelers_number"  id="travelers_number" class="scroll" aria-label="Default select example">
        <option value="">---</option>
        <option value="1">1</option>
        <option value="2">2 </option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>

    <div class="col-6">
      <label for="expected_date" class="form-label"> تاريخ السفر المتوقع </label>
      <input wire:model="expected_date" name="expected_date" type="date" class="form-control" id="expected_date">
    </div>

    <div class="col-lg-6 select">
      <label for="interview_place" class="form-label d-block">أختر مكان المقابلة؟</label>
      <select wire:model="interview_place" class="form-control" name="interview_place" id="interview_place" aria-label="Default select example">
        <option value="">---</option>
        <option value="Riyadh">الرياض</option>
        <option value="Dhahran">الظهران </option>
        <option value="Jeddah">جدة</option>
      </select>
    </div>

    @guest
      <div class="col-12">
        <label for="phone" class="form-label">رقم الجوال</label>
        <input wire:model="phone" name="phone" type="text" class="form-control" id="phone" placeholder="رقم الجوال هنا">
      </div>
    @endguest

    <div class="col-12 mb-2">
        <button type="submit" class="btn btn-primary">التالي</button>
    </div>

  </form>
