@extends('client.layout.app_master')


@section('title') الملف الشخصي  @endsection


@section('content')
<div class="row profile">

    <h4 class="text-center my-5"> كل الطلبات </h5>

    <div class="table-responsive table-responsive-md table-responsive-sm d-flex justify-content-center">
        @if(count($requests) > 0)
        <table class="table table-striped">
            <thead class="align-middle">
                <th>رقم الطلب</th>
                <th>حالة الطلب</th>
                <th>عرض</th>
            </thead>
            <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td><span class="number">{{$request->request_number}}</span></td>
                        <td><span class="status" style="background:{{$request->request_status == 'pending' ? 'rgb(238, 115, 0)' : 'rgb(47, 128, 0)' }}">{{$request->request_status == 'pending' ? 'بإنتظار المراجعة' : 'تم التأكيد'}}</span></td>
                        <td>
                            <a href="{{route('client.request.show', $request->id)}}" class="btn btn-sm bg-white"><i class="fa fa-eye fa-lg"></i> </a>
                        </td>
                    </tr>
                @endforeach
                {{-- <tr>
                    <td><span class="number">98267290</span></td>
                    <td><span class="status" style="background:rgb(47, 128, 0)">تم التأكيد</span></td>
                    <td>
                        <a href="{{route('client.request.show')}}" class="btn btn-sm bg-white"><i class="fa fa-eye fa-lg"></i> </a>
                    </td>
                </tr> --}}
            </tbody>
        </table>
        @else
            <div class="alert alert-light col-8 text-center">لا توجد لديك طلبات تأشيره</div>
        @endif
    </div>

</div>
@endsection