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
                    <th scope="col"> تاريخ السفر </th>
                    <th scope="col"> التفاصيل </th>
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
                        <a class="btn text-white btn-sm" style="background: #43c554;" target="_blank" href="https://wa.me/{{ltrim($order->user->phone , '0')}}"> <i class="fa fa-whatsapp"></i> مراسلة </a>
                    </td>
                </tr>
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