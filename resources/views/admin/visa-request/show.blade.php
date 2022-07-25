@extends('admin.layout.admin_master')
@section('title') طلبات التأشيرة @endsection
@section('content')
@section('page-title') طلب رقم #{{$request->request_number}} @endsection


<div class="row request-detail">

    <div class="d-flex justify-content-center">
        <div class="row mt-5 mb-5">
            <div class="card col-md-8 mx-auto shadow-sm" style="background: #fff">
                <div class="card-body row">
                    <span class="col-md-5">Order Number  : {{$request->request_number}}</span>
                    <span class="col-md-5">Account Number  : {{$request->user->account_id}}</span>
                    <span class="col-md-5">Created_at : {{$request->created_at->toDateString()}}</span>
                    <span class="col-md-5">Status : {{$request->request_status}}</span>
                    <span class="col-md-5">Embassy : {{$request->country->country_name}}</span>
                    <span class="col-md-5">Destination : {{$request->city->city_name}}</span>
                    <span class="col-md-5">Visa Type : {{$request->visa->visa_type}}</span>
                    <span class="col-md-5">Expected Date  : {{$request->expected_date}}</span>
                    <span class="col-md-5">Interview Place: {{$request->interview_place}}</span>
                    <span class="col-md-5">Payment Method: {{$request->payment_method}}</span>

                    @if(count($travelers) > 0)
                        <?php $i = 1 ?>
                        @foreach($travelers as $traveler)
                            <h6 class="mt-5 mb-3 text-center"> Traveler <span class="badge bg-dark p-1">{{$i++}}</span></h6>
                            <hr>
                            <div class="row col-12 travelers mx-auto">
                                <span class="col-md-5">First Name : {{$traveler->fname}}</span>
                                <span class="col-md-5">Last Name : {{$traveler->lname}}</span>
                                <span class="col-md-5">Gender  : {{$traveler->gender}}</span>
                                <span class="col-md-5">Social Status : {{$traveler->gender}}</span>
                                <span class="col-md-5">Passport Number  : {{$traveler->passport_number}}</span>
                                <span class="col-md-5">Passport Issuance: {{$traveler->passport_issuance}}</span>
                                <span class="col-md-5">Passport Expiry: {{$traveler->passport_expiry}}</span>
                                <span class="col-md-5">Address: {{$traveler->address}} </span>
                                <span class="col-md-5"> </span>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>


</div>


@endsection