@extends('client.layout.app_master')


@section('title') تعبئة البيانات @endsection


@section('content')

<div class="row">
    
    <div class="mx-auto" style="width: 500px">
    
        <div class="row g-4 mb-5 mt-5 mx-auto" style="border: none">
            <h4 class="text-center mb-1">تعبئة بيانات المسافرين</h4>
                <a href="{{route('client.step_two')}}" class="btn btn-secondary col-md-5 mx-1" style="height: 150px"> 
                    <i style="font-size:80px" class="fa fa-user d-block mx-auto my-2"></i>
                    <span>تعبئة البيانات بنفسي </span>
                </a>
                <a href="{{route('client.passport_form')}}" class="btn btn-primary col-md-5 mx-1" style="height: 150px">
                    <i style="font-size:80px" class="fa fa-image d-block mx-auto my-2"></i>
                    <span>إرسال صورة الجواز</span> 
                </a>
        </div>
    </div>


</div>
@endsection