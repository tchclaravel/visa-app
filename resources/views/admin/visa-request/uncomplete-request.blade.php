@extends('admin.layout.admin_master')
@section('title') إكمال طلب @endsection
@section('content')
@section('page-title') إكمال طلب رقم {{$order->request_number}} @endsection


<div class="orders col-md-8">
    @php $i = 1;$count = count($passports);  @endphp

    @if( $count > 0)
            @php 
                $i = 1;
                session()->put('passports_number' , $count);
                session()->put('current_traveler'.$order->id , 1);
                $current = session()->get('current_traveler'.$order->id);
            @endphp

            @foreach ($passports as $passport)
                <div class="row mx-auto my-3">
                    <div style="color:#c97200; font-size: 22px;">مسافر <span style="font-size: 22px; font-weight:bold;">({{$i}})</span></div>
                    <hr style="color: #ccc">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="{{'#showPassport' . $passport->id}}"> <i class="fa fa-photo"></i> جواز ({{$i}}) </button>
                    </div>
                    @php $traveler = \App\Models\Traveler::where('fname', 'fname_traveler'.$current++)->first(); @endphp
                    <div class="col-md-6">
                        <a href="{{route('admin.requests.traveler-form' , $traveler->id)}}" class="btn btn-success"><i class="fa fa-pencil"></i> تعبئة البيانات</a>
                    </div>
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
                    <hr class="my-3" style="color: #ccc">
                    @php 
                        $i++;
                    @endphp
                </div>
            @endforeach
    @endif
</div>


@endsection