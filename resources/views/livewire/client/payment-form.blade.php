<form class="row g-4 mb-5 mt-5 request-form" wire:submit="storePayment">
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
        <div class="col-7 mt-1 mr-2">
            <h5 class="mt-2">إجمالي المبلغ</h5>
        </div>
        <div class="col-5 mr-2 mb-2">
            <h4><span class="price">{{session('visa_request.total_price')}}</span><span class="sar">ريال سعودي</span></h3>
        </div>
    </div>

      <div class="row g-4 justify-content-center">
          <div class="col-12">
              <label for="appointment" class="form-label d-block">أختر الموعد</label>
              <select wire:model="appointment" name="appointment" id="appointment" class="form-control" aria-label="Default select example">
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
            <select wire:model="payment_method" name="payment_method"  id="payment_method" class="form-control" aria-label="Default select example">
              <option value="">---</option>
              <option value="cash"> دفع نقدي </option>
              <option value="transfer"> حوالة بنكية</option>
              <option value="e-payment"> دفع عبر البطاقات الإتمانية</option>
            </select>
          </div>   
      </div>

      <div class="col-12 mb-2">
        {{-- <button type="submit" class="btn btn-secondary">رجوع</button> --}}
        @if($payment_method == 'cash')
            <button type="submit" class="btn text-white" style="background: rgb(96, 168, 1)">تأكيد</button>
        @else
            <button type="submit" class="btn btn-primary">التالي</button>
        @endif
      </div>
  </form>