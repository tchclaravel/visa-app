@extends('client.layout.app_master')


@section('title') بيانات الرحلة @endsection


@section('content')
<div class="row flight-data">
    {{-- <h4 class="form-title">بيانات الرحلة</h4> --}}

    <div class="d-flex justify-content-center v-cenetr">
      @livewire('visa-request-form')
    </div>


</div>
@endsection