@extends('admin.layout.admin_master')
@section('title') التأشيرات  @endsection
@section('content')
@section('page-title') التأشيرات @endsection

<div class="visas">
    <div class="card">
        <!-- Tab panes -->
        <div class="card-body">
            <form class="form-horizontal form-material mx-2" method="POST" action="{{route('admin.visas.store')}}">
                @csrf

                <div class="form-group col-md-3 d-inline-block mx-2">
                    @error('country_id') <span class="validation_message">{{ $message }}</span> @enderror
                    <div>
                        <select name="country_id" class="form-control form-control-line">
                            <option value="" selected>أختر السفارة</option>
                            @if(count($countries) > 0)
                                @foreach($countries as $country) 
                                <option value="{{$country->id}}">{{$country->country_name_ar}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3 d-inline-block mx-2">
                    @error('visa_type') <span class="validation_message">{{ $message }}</span> @enderror
                    <div>
                        <select name="visa_type" class="form-control form-control-line">
                            <option value="" selected>أختر نوع التأشيرة</option>
                            <option value="tourism">سياحية</option>
                            <option value="study">دراسية</option>
                            <option value="therapy">علاجية</option>
                        </select>
                    </div>
                </div>
    
                <div class="form-group col-md-3 d-inline-block mx-2">
                    @error('visa_price') <span class="validation_message">{{ $message }}</span> @enderror
                    <div>
                        <input name="visa_price" type="number" min="1" placeholder="سعر التأشيرة" class="form-control form-control-line">
                    </div>
                </div>
    
                <div class="form-group col-md-2 d-inline-block mx-2">
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> إضافة</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    @if(count($visas) > 0)
    <div class="table-responsive">
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">السفارة</th>
                    <th scope="col">نوع التأشيرة</th>
                    <th scope="col">السعر بالريال </th>
                    <th scope="col"> تاريخ الإنشاء </th>
                    <th scope="col" style="width: 10%;" class="text-center"><i class="fa fa-trash fa-lg"></th>
                </tr>      
            </thead>
            <tbody class="align-middle">
                @foreach($visas as $visa)
                <tr>
                    <th scope="row" class="font-bold fs-5">{{$visas->firstItem()+$loop->index}}</th>
                    <td>{{$visa->country->country_name_ar}}</td>
                    <td>
                        @if($visa->visa_type == 'tourism')
                            {{'سياحية'}}
                        @elseif($visa->visa_type = 'study')
                            {{'دراسية'}}
                        @else
                            {{'علاجية'}}
                        @endif
                    </td>
                    <td class="fs-4 font-bold">{{$visa->visa_price}}</td>
                    <td class="fs-6">{{$visa->created_at->toDateString()}}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa fa-close"></i> حذف</button>
                    </td>
                </tr>

                <!-- Bootstrap Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            سوف يتم حذف العنصر بصورة نهائية!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <form action="{{route('admin.visas.delete' , $visa->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">تأكيد</button>
                            </form>
                        </div>

                    </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5 mb-5">
            {!! $visas->links() !!}
        </div>  
    </div>
    @endif

</div>



@endsection