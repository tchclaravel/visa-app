@extends('admin.layout.admin_master')
@section('title') السفارات @endsection
@section('content')
@section('page-title') السفارات @endsection

<div class="card">
    <!-- Tab panes -->
    <div class="card-body">
        <form class="form-horizontal form-material mx-2" method="POST" action="{{route('admin.countries.store')}}">
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

            <div class="form-group col-md-4 d-inline-block mx-2">
                {{-- <label class="col-md-12">Full Name</label> --}}
                <div>
                    <input name="country_name" type="text" lang="en" placeholder="أكتب اسم السفارة باللغة الإنجليزية" class="form-control form-control-line">
                    @error('country_name') <li>{{ $message }}</li> @enderror

                </div>
            </div>

            <div class="form-group col-md-4 d-inline-block mx-2">
                {{-- <label class="col-md-12">Full Name</label> --}}
                <div>
                    <input name="country_name_ar" type="text" placeholder="أكتب اسم السفارة باللغة العربية" class="form-control form-control-line">
                    @error('country_name_ar') <li>{{ $message }}</li> @enderror

                </div>
            </div>

            <div class="form-group col-md-3 d-inline-block mx-2">
                <div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> إضافة</button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection