@extends('client.layout.app_master')


@section('title')  سياسة الخصوصية  @endsection


@section('content')

<div class="seo-page col-md-10">
    <h2 class="main-title my-4"> سياسة الخصوصية</h2>

    {!! $page->page_content !!}
</div>
@endsection