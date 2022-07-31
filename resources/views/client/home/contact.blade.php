<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">إتـصل بــنا</h2>
            <h3 class="section-subheading" style="font-style: normal; color:#fff;">
                إترك رسالة و سوف نقوم بالرد عليك في أقرب وقت ممكن
            </h3>
        </div>

        {{-- Show success alert when message sent --}}
        @if(Session::has('success'))
        <div class="alert text-center alert-success alert-dismissible fade show" role="alert">
            <strong><i class="fa fa-check"></i></strong> {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form method="POST" action="{{route('client.contact')}}" id="contactForm">
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <input name="name" class="form-control" id="name" type="text" placeholder="الأسـم" />
                        @error('name') <span class="contact_validation">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input name="email" class="form-control" style="text-align: right" id="email" type="email" placeholder="الإيـميـل" />
                        @error('email') <span class="contact_validation">{{ $message }}</span> @enderror

                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input name="phone" class="form-control" style="text-align: right" id="phone" type="tel" placeholder="رقـم الجـوال" />
                        @error('phone') <span class="contact_validation">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea name="message" class="form-control" id="message" placeholder="أكـتب رسالـتك هنا .."></textarea>
                        @error('message') <span class="contact_validation">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-primary btn-lg text-uppercase" id="submitButton" type="submit">إرسال الرسالة</button></div>
        </form>
    </div>
</section>