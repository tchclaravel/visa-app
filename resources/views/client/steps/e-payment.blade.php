@extends('client.layout.app_master')


@section('title') بوابة الدفع @endsection


@section('content')
<div class="row bank-transfer">
    
    <div class="justify-content-center">
        
        <form class="row g-4 mb-5 mt-5 request-form" method="GET" action="#">
            <h4 class="text-center"> هنا توجد بوابة الدفع </h5>
            <div class="col-lg-12 cover mb-2">
                <img src="{{asset('app/template/design/payment-methods.png')}}" class="img-fluid" alt="banks">
            </div>
        </form>
    </div>


</div>
@endsection