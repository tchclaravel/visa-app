@extends('admin.layout.admin_master')
@section('title') المستخدمين - بحث @endsection
@section('content')
@section('page-title')  المستخدمين - بحث "{{$request->input}}"  @endsection

<div class="users">
    
    @if(count($results) > 0)
    <div class="table-responsive">
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"> رقم الحساب </th>
                    <th scope="col"> رقم الجوال </th>
                    <th scope="col"> تاريخ التسجيل </th>
                    <th scope="col" style="width: 10%;" class="text-center"><i class="fa fa-trash fa-lg"></th>
                </tr>      
            </thead>
            <tbody class="align-middle">
                <?php $i = 1 ?>
                @foreach($results as $user)
                <tr>
                    <th scope="row" class="font-bold fs-5">{{$i++}}</th>
                    <td>{{$user->account_id}}</td>
                    <td class="text-uppercase">{{$user->phone}}</td>
                    <td class="fs-6">{{$user->created_at->toDateString()}}</td>
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
                            سوف يتم حذف الحساب بصورة نهائية!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <form action="{{route('admin.users.delete' , $user->id)}}" method="POST">
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