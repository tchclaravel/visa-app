@extends('admin.layout.admin_master')
@section('title') الطلبات غير المكتملة @endsection
@section('content')
@section('page-title') الطلبات غير المكتملة @endsection


<div class="orders">
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
                    <th scope="col"> تاريخ الإنشاء </th>
                    {{-- <th scope="col"> الجوازات </th> --}}
                    <th scope="col" class="text-center"> إكمال </th>
                    {{-- <th scope="col"> التفاصيل </th>
                    <th scope="col" class="text-center"> PDF </th>
                    <th scope="col" class="text-center"> واتساب </th> --}}

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
                    <td>{{$order->created_at->toDateString()}}</td>
                    {{-- <td>
                        @php 
                            $passports = \App\Models\Passport::where('request_id' , $order->id)->get();
                            $i = 1;
                        @endphp
                        @foreach ($passports as $passport)
                            <button type="button" class="btn btn-primary btn-sm my-1" data-bs-toggle="modal" data-bs-target="{{'#showPassport' . $passport->id}}"> <i class="fa fa-file-pdf"></i> جواز ({{$i++}}) </button>
                            <!-- Bootstrap Modal -->
                            <div class="modal fade" id="{{'showPassport' . $passport->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body mx-auto">
                                        <img height="450px" width="650px" src="{{asset($passport->photo)}}">
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                    </td> --}}
                    <td class="text-center">
                        {{-- <form action="{{route('admin.requests.fill-form' , $order->id)}}" method="POST" class="d-inline"> --}}
                            <a class="btn btn-secondary btn-sm" target="_blank" href="{{route('admin.requests.uncomplete-request' , $order->id)}}"> <i class="fa fa-check"></i> إكمال الطلب </a>
                        {{-- </form> --}}
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
        لا توجد طلبات غير مكتملة
    </div>

    @endif

</div>


@endsection