@extends('client.layout.app_master')


@section('title')الموعد و الدفع @endsection


@section('content')
<div class="row appointment-data">

    <div class="justify-content-center">
        @livewire('client.payment-form')
    </div>


</div>
@endsection