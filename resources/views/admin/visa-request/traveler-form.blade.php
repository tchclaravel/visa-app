@extends('admin.layout.admin_master')
@section('title') تعبئة البيانات @endsection
@section('content')
@section('page-title') تعبئة بيانات المسافرين @endsection

<div>
    {{-- Include livewire TravelerForm for Admin --}}
    @livewire('admin.traveler-form')
</div>


@endsection