<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Arabic Droid Font -->
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/droid-arabic-kufi" type="text/css"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

    {{-- <title>مرحبا بالعالم!</title> --}}
    <style>
        @import url(https://fontlibrary.org//face/droid-arabic-kufi);
        body{
            font-family: 'DroidArabicKufiRegular';
            color:#6d6d6d;
        }

        .content{
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            /* background: rgb(253, 255, 245); */
        }

        
        .content .info{
            width: 60%;        
        }

        .content .info span{
            display: block;
            font-size: 13px;
            padding: 5px;
            border: 1px solid rgb(238, 238, 238);
            margin: 2px;
            border-radius: 4px;
        }

        .content hr{
            color: rgb(238, 238, 238);
            margin: 10px auto;
        }

        .content p{
            margin:10px;
            font-size: 14px;
        }


    </style>
  </head>
  <body>
    
    <div class="container">
        <div class="content mx-auto col-md-6 my-5">
            <div class="row">
                <div class="row">
                    <div class="col-md-7 info">
                        <span class="d-block">الأسم : {{$name}}</span>
                        <span class="d-block">الإيميل : {{$email}}</span>
                        <span class="d-block">رقم الجوال : {{$phone}}</span>        
                    </div>
                    {{-- Logo --}}
                    {{-- <div class="col-md-5">
                        <h2>تأشيرتك علينا</h2>
                    </div> --}}
                </div>                
                <hr>
                <h4>إستفسار رقم ({{$number}})</h4>
                <p>
                    {{$content}}
                </p>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>