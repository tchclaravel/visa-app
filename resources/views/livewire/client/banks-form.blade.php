<form class="row g-4 mb-5 mt-5 request-form col-md-6" wire:submit.prevent="storeBank">
    @csrf
    <h4 class="text-center">حوالة بنكية</h5>
    {{-- <div class="col-lg-12 cover mb-2">
        <img src="{{asset('app/template/design/banks.jpg')}}" class="img-fluid" alt="banks">
    </div> --}}

    <div class="row total-price">
        <div class="col-7 mt-1 mr-2">
            <h5 class="mt-2">إجمالي المبلغ</h5>
        </div>
        <div class="col-5 mr-2 mb-2">
            <h4><span class="price">{{session('visa_request.total_price')}}</span><span class="sar">ريال سعودي</span></h3>
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

    <div class="col-12">
        <label for="bank" class="form-label d-block" style="color: #383838">يمكنك الدفع عن طريق الحوالة البنكية إلى أحد البنوك التالية</label>
        <select wire:model="bank" id="bank" class="form-control" aria-label="Default select example">
            <option value="" selected>أختر البنك </option>
            @foreach($banks as $bank)
                <option value="{{$bank->id}}" >{{$bank->bank_name}}</option>
            @endforeach
        </select>
    </div>

    {{-- {{$info}} --}}
    {{-- Livewire status --}}
    @if(!is_null($info))
        <div class="col-12 bank-detail">
            <hr style="color: #ccc">
            <h5>{{$info['bank_name']}}</h5>
            <span>أسم الحساب: {{$info->account_name}}</span>
            <span>رقم الحساب : {{$info->account_number}}</span>
            <span>ايبان : {{$info->iban}}</span>
        </div>
    @endif

    <div class="col-12 mb-2">
      {{-- <button type="submit" class="btn btn-secondary">رجوع</button> --}}
      <button type="submit" class="btn text-white" style="background: rgb(96, 168, 1)">تأكيد</button>
    </div>
</form>