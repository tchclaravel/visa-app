@extends('client.layout.app_master')


@section('title') حوالة بنكية @endsection


@section('content')
<div class="row bank-transfer">
    
    <div class="d-flex justify-content-center v-cenetr">
        @livewire('banks-form')
    </div>


</div>
@endsection