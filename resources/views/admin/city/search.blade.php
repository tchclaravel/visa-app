@extends('admin.layout.admin_master')
@section('title') الوجهات و المدن - بحث @endsection
@section('content')
@section('page-title')  الوجهات و المدن - بحث "{{$request->input}}"  @endsection

<div class="cities">
    
    @if(count($results) > 0)
    <div class="table-responsive">
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"><i class="fa fa-globe fa-lg"></i></th>
                    <th scope="col">الأسم بالعربية</th>
                    <th scope="col">الأسم بالإنجليزية</th>
                    <th scope="col">السفارة</th>
                    <th scope="col"> تاريخ الإنشاء </th>
                    <th scope="col" style="width: 10%;" class="text-center"><i class="fa fa-trash fa-lg"></th>
                </tr>      
            </thead>
            <tbody class="align-middle">
                <?php $i = 1 ?>
                @foreach($results as $city)
                <tr>
                    <th scope="row" class="font-bold fs-5">{{$i++}}</th>
                    <td><i class="fa fa-globe fa-2x"></i></td>
                    <td>{{$city->city_name_ar}}</td>
                    <td class="text-uppercase">{{$city->city_name}}</td>
                    <td>{{$city->country->country_name_ar}}</td>
                    <td class="fs-6">{{$city->created_at->toDateString()}}</td>
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
                            <form action="{{route('admin.cities.delete' , $city->id)}}" method="POST">
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
    </div>

    @else
        <div class="alert custom-alert text-center">
            لا توجد نتائج  بحث 
        </div>
    @endif

</div>



@endsection