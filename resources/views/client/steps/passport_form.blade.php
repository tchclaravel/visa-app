@extends('client.layout.app_master')


@section('title') إرسال جوازات المسافرين @endsection


@section('content')

<style>
    label{
        font-size: 20px;
        color: #a9a9a9;
    }
    h3{
        font-size: 20px;
        color: #f57402;
    }
</style>

<div class="row">
    
    <div class="mx-auto" style="width: 700px">
    
        <div class="row g-4 mb-5 mt-5 mx-auto" style="border: none">

            <form class="row g-4" method="POST" action="{{route('client.send_passport')}}" enctype="multipart/form-data">
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

                {{-- @php $i = 1; @endphp --}}

                <h3>قم بإرفاق صور الجوازات</h3>

                @if($passports == 1)
                    <div class="col-lg-6">
                        <label for="passport" class="form-label d-block">جواز المسافر</label>
                 <input type="file" name="passport1" class="form-control" id="passport" accept="image/*">
                    </div>
                @else
                    @for ($i = 1; $i <= $passports ; $i++)
                    <div class="col-lg-6">
                        <label for="passport" class="form-label d-block">جواز المسافر ({{$i}})</label>
                        <input type="file" name="passport{{$i}}" class="form-control" id="passport" accept="image/*">
                    </div>
                    @endfor
                @endif
            
                <div class="col-12 mb-2">
                    <button type="submit" class="btn btn-primary">التالي</button>
                </div>
                
            </form>

        </div>
    </div>

</div>

@endsection