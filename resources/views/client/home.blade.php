@extends('client.layout.home_master')


@section('title') الرئيسية @endsection


@section('content')

    <!-- Masthead-->
    @include('client.home.masthead')

    <!-- Features-->
    @include('client.home.features')

    <!-- Steps-->
    @include('client.home.steps')

    <!-- Contact-->
    @include('client.home.contact')

@endsection