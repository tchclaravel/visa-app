@extends('admin.layout.admin_master')
@section('title') طلبات التأشيرة @endsection
@section('content')
@section('page-title') طلبات التأشيرة @endsection


<div class="orders">
    <a href="{{route('admin.requests.uncomplete')}}" class="btn text-white my-2" style="background: orange"><i class="fa fa-clock"></i> الطلبات غير المكتملة</a>
    @if(count($orders) > 0)
    <div class="table-responsive">
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"> رقم الحساب </th>
                    <th scope="col"> رقم الطلب </th>
                    <th scope="col"> السفارة </th>
                    <th scope="col"> عدد المسافرين </th>
                    <th scope="col"> الوجهة </th>
                    <th scope="col"> نوع التأشيرة </th>
                    {{-- <th scope="col"> وسيلة الدفع </th> --}}
                    <th scope="col"> تاريخ السفر </th>
                    <th scope="col"> التفاصيل </th>
                    <th scope="col" class="text-center"> PDF </th>
                    <th scope="col" class="text-center"> واتساب </th>

                </tr>      
            </thead>
            <tbody class="align-middle">
                @foreach($orders as $order)
                <tr>
                    <th scope="row" class="font-bold fs-5">{{$orders->firstItem()+$loop->index}}</th>
                    <td>{{$order->user->account_id}}</td>
                    <td>{{$order->request_number}}</td>
                    <td>{{$order->country->country_name_ar}}</td>
                    <td class="text-center">{{$order->travelers_number}}</td>
                    <td>{{$order->city->city_name_ar}}</td>
                    <td>
                        @if($order->visa->visa_type == 'tourism')
                            سياحية
                        @elseif($order->visa->visa_type == 'therapy')
                            علاجية
                        @else
                            دراسية
                        @endif
                    </td>
                    <td>{{$order->expected_date}}</td>
                    <td class="text-center"><a href="{{route('admin.requests.show' , $order->id)}}" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-list"></i></a></td>
                    <td class="text-center">
                        <button type="button" class="btn pdf-btn btn-sm" data-bs-toggle="modal" data-bs-target="{{'#generatePdf' . $order->request_number}}"> <i class="fa fa-file-pdf"></i> إنشاء </button>
                    </td>
                    <td class="text-center">
                        <a class="btn text-white btn-sm" style="background: #43c554;" target="_blank" href="https://wa.me/{{ltrim($order->user->phone , '0')}}"> <i class="fa fa-whatsapp"></i> مراسلة </a>
                    </td>
                </tr>

                <!-- Bootstrap Modal -->
                <div class="modal fade" id="{{'generatePdf' . $order->request_number}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <a class="btn pdf-btn" target="_blank" href="{{route('admin.generate.insurance' , $order->request_number)}}"><i class="fa fa-file-pdf"></i> التأمين الصحي</a>
                            <a class="btn pdf-btn" target="_blank" href="{{route('admin.generate.ticket' , $order->request_number)}}"><i class="fa fa-file-pdf"></i> تذكرة الطيران </a>
                            <a class="btn pdf-btn" target="_blank" href="{{route('admin.generate.booking' , $order->request_number)}}"><i class="fa fa-file-pdf"></i> حجز الفندق </a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        </div>

                    </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5 mb-5">
            {!! $orders->links() !!}
        </div>
        
    </div>

    @else

    <div class="alert custom-alert text-center">
        لا توجد طلبات 
    </div>

    @endif

</div>


@endsection