<div class="card col-md-10 banks">
    <div class="card-title">
        البنوك
    </div>

    <hr>

    <form class="form-horizontal form-material mx-3 mt-2 " method="POST" action="{{route('admin.banks.store')}}">
        @csrf

        <div class="form-group col-md-5 d-inline-block mx-2">
            @error('bank_name') <span class="validation_message">{{ $message }}</span> @enderror
            <div>
                <input name="bank_name" type="text" placeholder="أكتب اسم البنك هنا ..." class="form-control form-control-line">
            </div>
        </div>

        <div class="form-group col-md-5 d-inline-block mx-2">
            @error('account_name') <span class="validation_message">{{ $message }}</span> @enderror
            <div>
                <input name="account_name" type="text" placeholder="أكتب اسم الحساب هنا ..." class="form-control form-control-line">
            </div>
        </div>

        <div class="form-group col-md-5 d-inline-block mx-2">
            @error('account_number') <span class="validation_message">{{ $message }}</span> @enderror
            <div>
                <input name="account_number" type="text" placeholder="أكتب رقم الحساب هنا ..." class="form-control form-control-line">
            </div>
        </div>

        <div class="form-group col-md-5 d-inline-block mx-2">
            @error('iban') <span class="validation_message">{{ $message }}</span> @enderror
            <div>
                <input name="iban" type="text" placeholder="أكتب آيبان الحساب هنا ..." class="form-control form-control-line">
            </div>
        </div>


        <div class="form-group">
            <div>
                <button type="submit" class="btn btn-success btn-sm mr-2"><i class="fa fa-plus"></i> إضافة</button>
            </div>
        </div>
    </form>

    @if(count($banks) > 0)
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"> اسم البنك</th>
                        <th scope="col"> اسم الحساب</th>
                        <th scope="col"> رقم الحساب </th>
                        <th scope="col">  آيبان </th>
                        <th scope="col" style="width: 10%;" class="text-center"><i class="fa fa-trash fa-lg"></th>
                    </tr>      
                </thead>
                <tbody class="align-middle">
                    <?php $i = 1 ?>
                    @foreach($banks as $bank)
                    <tr>
                        <th scope="row" class="font-bold fs-5">{{$i++}}</th>
                        {{-- <td><i class="fa fa-flag fa-2x"></i></td> --}}
                        <td>{{$bank->bank_name}}</td>
                        <td>{{$bank->account_name}}</td>
                        <td>{{$bank->account_number}}</td>
                        <td class="fs-6">{{$bank->iban}}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#bank-modal"> <i class="fa fa-close"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Bootstrap Modal -->
        <div class="modal fade" id="bank-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    سوف يتم حذف العنصر بصورة نهائية!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <form action="{{route('admin.banks.delete' , $bank->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#bank-modal">تأكيد</button>
                    </form>
                </div>

            </div>
            </div>
        </div>
    
    </div>
    @endif

</div>