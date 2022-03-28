<div class="card col-md-10 appointments">
    <div class="card-title">
        المواعيد
    </div>
    <hr>

    <form class="form-horizontal form-material mx-3 mt-2 " method="POST" action="{{route('admin.appointments.store')}}">
        @csrf

        <div class="form-group col-md-8 d-inline-block mx-2">
            @error('title') <span class="validation_message">{{ $message }}</span> @enderror
            <div>
                <input name="title" type="text" placeholder="أكتب صيغة الموعد هنا ..." class="form-control form-control-line">
            </div>
        </div>


        <div class="form-group col-md-3 d-inline-block">
            <div>
                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> إضافة</button>
            </div>
        </div>
    </form>

    <div class="card-body">
        @if(count($appointments) > 0)
            <ul>
                @foreach($appointments as $appointment) 
                    <li>
                        <span class="d-inline-block">{{$appointment->title}}</span>
                        <button type="button" class="btn btn-danger btn-sm d-inline-block float-start" style="position: relative; bottom:3px;" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa fa-close"></i></button>
                    </li>
                @endforeach
            </ul>


        <!-- Bootstrap Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{route('admin.appointments.delete' , $appointment->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">تأكيد</button>
                    </form>
                </div>

            </div>
            </div>
        </div>

        @endif
    </div>
</div>