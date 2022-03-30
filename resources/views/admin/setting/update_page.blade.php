@extends('admin.layout.admin_master')

@section('title') تعديل {{$page->page_title == 'privacy_policy' ? 'سياسة الخصوصية' : 'شروط الإستخدام'}}@endsection
@section('content')
@section('page-title') تعديل {{$page->page_title == 'privacy_policy' ? 'سياسة الخصوصية' : 'شروط الإستخدام'}} @endsection

<form class="form-horizontal form-material mx-3 mt-2 col-md-10" method="POST" action="{{route('admin.pages.update', $page->page_title)}}">
    @csrf
    <textarea name="page_content" id="page_content" cols="30" rows="10">{{$page->page_content}}</textarea>
    <button type="submit" class="btn custom-btn mt-2"><i class="fa fa-save"></i> تحديث </button>
</form>

@endsection

@section('script')
<script>
    ClassicEditor
        .create( document.querySelector( '#page_content' ),{
            language:'ar',
        })
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection