@extends('client.layout.app_master')


@section('title')الموعد و الدفع @endsection


@section('content')
<div class="row appointment-data">

    <div class="d-flex justify-content-center v-cenetr">
        @livewire('client.payment-form')
    </div>


</div>
@endsection