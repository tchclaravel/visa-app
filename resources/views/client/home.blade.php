@extends('client.layout.home_master')


@section('title') الرئيسية @endsection


@section('content')

<!-- Masthead-->
<header class="masthead" id="start">
    <div class="container">
        <div class="masthead-heading"> 
            كل شئ أصبح سهلاً!
        </div>
        <div class="masthead-heading sub-head" style="color:#fff;">
            معنا يمكنك حجز تأشيرة دخول لأي دولة في دقائق .. أليس هذا رائعاً؟!
        </div>

        <a class="btn text-white btn-lg text-uppercase" href="{{route('client.step_one')}}" style="background: #f5a302">أبدأ الآن</a>
    </div>
</header>

<!-- Features-->
<section class="page-section" id="features">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase" style="color:#f5a302;">المميزات</h2>
            <h3 class="section-subheading text-muted" style="font-style: normal"> لماذا يجب إستخدام تأشيرتك علينا؟</h3>
        </div>
        <div class="row text-center features-icons">
            <div class="col-md-4">
                <img src="{{asset('app/template/design/icon-1.png')}}" alt="">
                <h4 class="my-3">سهولة الإستخدام</h4>
                <p class="text-muted">
                    نقدم فورمات بسيطة و سهلة كل ما عليك هو تعبئة الحقول المحددة بالبيانات المطلوبة
                </p>
            </div>
            <div class="col-md-4">
                <img src="{{asset('app/template/design/icon-2.png')}}" alt="">
                <h4 class="my-3">تجهيز المتطلبات</h4>
                <p class="text-muted">
                    نقدم لك أبلكيشن على شكل ملف PDF يحتوي على كل بيانات التقديم باللغة الإنجليزية دون الحاجة للترجمة
                </p>
            </div>
            <div class="col-md-4">
                <img src="{{asset('app/template/design/icon-3.png')}}" alt="">
                <h4 class="my-3">أسعار رمزية</h4>
                <p class="text-muted">
                    نوفر لك خدمات دراسة و علاج برسوم رمزية و بأكثر من طريقة للدفع
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Steps-->
<section class="page-section" id="steps">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading" style="color:#f5a302;">خطوات بسيطة و سهلة</h2>
            <h3 class="section-subheading text-muted" style="font-style: normal">نص تجريبي نص تجريبي نص تجريبي</h3>
        </div>
        <ul class="timeline">
            <li>
                <div class="timeline-image">
                    <div class="step-number">
                        1
                    </div>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="subheading">إختيار الوجهة</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                        </p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image">
                    <div class="step-number">
                        2
                    </div>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="subheading">تعبئة بيانات المسافرين</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-image">
                    <div class="step-number">
                        3
                    </div>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="subheading">تحديد الموعد</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                        </p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image">
                    <div class="step-number">
                        4
                    </div>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="subheading">إختيار طريقة الدفع</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-image">
                    <div class="step-number bg-success">
                        <i class="fa fa-check mt-3"></i>
                    </div>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="subheading text-success"> مبروك!</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                        </p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>


<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">إتـصل بــنا</h2>
            <h3 class="section-subheading text-muted" style="font-style: normal; ">
                إترك رسالة و سوف نقوم بالرد عليك في أقرب وقت ممكن
            </h3>
        </div>
        <!-- * * * * * * * * * * * * * * *-->
        <!-- * * SB Forms Contact Form * *-->
        <!-- * * * * * * * * * * * * * * *-->
        <!-- This form is pre-integrated with SB Forms.-->
        <!-- To make this form functional, sign up at-->
        <!-- https://startbootstrap.com/solution/contact-forms-->
        <!-- to get an API token!-->
        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <input class="form-control" id="name" type="text" placeholder="الأسـم" data-sb-validations="required" />
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input class="form-control" style="text-align: right" id="email" type="email" placeholder="الإيـميـل" data-sb-validations="required,email" />
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input class="form-control" style="text-align: right" id="phone" type="tel" placeholder="رقـم الجـوال" data-sb-validations="required" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea class="form-control" id="message" placeholder="أكـتب رسالـتك هنا .." data-sb-validations="required"></textarea>
                    </div>
                </div>
            </div>
            <!-- Submit success message-->
            <!---->
            <!-- This is what your users will see when the form-->
            <!-- has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center text-white mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    To activate this form, sign up at
                    <br />
                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                </div>
            </div>
            <!-- Submit error message-->
            <!---->
            <!-- This is what your users will see when there is-->
            <!-- an error submitting the form-->
            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-primary btn-lg text-uppercase disabled" id="submitButton" type="submit">إرسال الرسالة</button></div>
        </form>
    </div>
</section>


@endsection