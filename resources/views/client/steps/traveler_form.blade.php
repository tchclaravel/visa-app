@extends('client.layout.app_master')

@section('title') بيانات المسافرين @endsection

@section('content')

<div class="row traveler-data">
    {{-- <h4 class="form-title">بيانات الرحلة</h4> --}}

    <div class="justify-content-center">
        
      @livewire('client.traveler-form')

    </div>


    {{-- Show big photo --}}
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="{{asset('app/template/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <img class="img-fluid d-block mx-auto" src="{{asset('app/template/design/passport.jpeg')}}" alt="..." />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection