@extends('admin.layout.admin_master')
@section('title') الوجهات و المدن @endsection
@section('content')
@section('page-title') الوجهات و المدن @endsection

<div class="countries">
    <div class="card">
        <!-- Tab panes -->
        <div class="card-body">
            <form class="form-horizontal form-material mx-2" method="POST" action="{{route('admin.cities.store')}}">
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
                    {{-- <label class="col-md-12">Full Name</label> --}}
                    @error('city_name') <span class="validation_message">{{ $message }}</span> @enderror
                    <div>
                        <input name="city_name" type="text" placeholder="أكتب اسم المدينة باللغة الإنجليزية" class="form-control form-control-line">
                    </div>
                </div>
    
                <div class="form-group col-md-3 d-inline-block mx-2">
                    {{-- <label class="col-md-12">Full Name</label> --}}
                    @error('city_name_ar') <span class="validation_message">{{ $message }}</span> @enderror
                    <div>
                        <input name="city_name_ar" type="text" placeholder="أكتب اسم المدينة باللغة العربية" class="form-control form-control-line">
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
    
    @if(count($cities) > 0)
    <div class="table-responsive">
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">الأسم بالعربية</th>
                    <th scope="col">الأسم بالإنجليزية</th>
                    <th scope="col">السفارة</th>
                    <th scope="col"> تاريخ الإنشاء </th>
                    <th scope="col" style="width: 10%;" class="text-center"><i class="fa fa-trash fa-lg"></th>
                </tr>      
            </thead>
            <tbody class="align-middle">
                <?php $i = 1 ?>
                @foreach($cities as $city)
                <tr>
                    <th scope="row" class="font-bold fs-5">{{$i++}}</th>
                    <td>{{$city->city_name_ar}}</td>
                    <td class="text-uppercase">{{$city->city_name}}</td>
                    <td>{{$city->country->country_name_ar}}</td>
                    <td class="fs-6">{{$city->created_at->toDateString()}}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa fa-close"></i> حذف</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

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
                <form action="{{route('admin.cities.delete' , $city->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">تأكيد</button>
                </form>
            </div>

        </div>
        </div>
    </div>
    @endif

</div>



@endsection