@extends('Web.Header')

@section('content')

<div class="container-fluid py-2  border-top border-bottom" style="background: #fafafa;">
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="background: #fafafa;">
            <li class="breadcrumb-item"><a class="text-dark" href="#">الرئيسية</a></li>
            <li class="breadcrumb-item"><a class="text-dark" href="#">القسم</a></li>
            <li class="breadcrumb-item"><a class="text-dark" href="#">القسم الفرعي</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>


        <h4 class="ml-3 text-dark"><b>عنوان المنتج</b></h4>
    </div>
</div>

<div class="container py-4">
    <div class="row featurette">
        
        <div class="col-md-8">
            <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="100%" height="300" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500">
                <title>Placeholder</title><rect fill="#eee" width="100%" height="100%"/>
                <text fill="#aaa" dy=".3em" x="50%" y="50%">500x500</text>
            </svg>
            <br>
            <br>
            <p>تتميز لوحة التحكم بامكانيات عالية متطورة
                وسهلة الاستخدام قم بدخول للوحة التحكم لتتعرف
                على مميزاتها.
                تتميز لوحة التحكم بامكانيات عالية متطورة
                وسهلة الاستخدام قم بدخول للوحة التحكم لتتعرف
                على مميزاتها.
            </p>

            <p>You can use the mark tag to <mark>highlight</mark> text.</p>
            <p><del>This line of text is meant to be treated as deleted text.</del></p>
            <p><s>This line of text is meant to be treated as no longer accurate.</s></p>
            <p><ins>This line of text is meant to be treated as an addition to the document.</ins></p>
            <p><u>This line of text will render as underlined</u></p>
            <p><small>This line of text is meant to be treated as fine print.</small></p>
            <p><strong>This line rendered as bold text.</strong></p>
            <p><em>This line rendered as italicized text.</em></p>
        </div>
        <div class="col-md-4">
            <div class="border p-3 rounded">
        
                <div class="clearfix mx-2">
                    <dt class="float-right text-dark">السعر</dt>
                    {{-- <h6 class="float-left text-secondary font-weight-bold">352 ريال</h6> <br> --}}
                    <h5 class="align-baseline text-success float-left font-weight-bolder">352 ريال </h5>
                </div>
                <hr class="featurette-divider">
            
                <p>
                    تتميز لوحة التحكم بامكانيات عالية متطورة
                    وسهلة الاستخدام قم بدخول للوحة التحكم لتتعرف
                    على مميزاتها.
                </p>

                <p style="display: inline-block" class="py-1 px-2 bg-light border rounded"><small>شامل الضريبة</small></p>

            <button type="button" class="btn btn-success btn-lg btn-block shadow-sm">
            <small>اضافة بالسلة</small>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="25" height="25" viewBox="0 0 24 24" stroke-width="2" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="9" cy="19" r="2" />
                <circle cx="17" cy="19" r="2" />
                <path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" />
              </svg>
            </button>
            <button type="button" class="btn btn-secondary btn-lg btn-block shadow-sm"><small>إشتري الان</small></button>
            <hr class="featurette-divider">
            <button type="button" class="btn btn-info btn-lg btn-block shadow-sm">
                <small>اضافة للمفضلة</small>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="25" height="25" viewBox="0 0 24 24" stroke-width="2" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                  </svg>
            </button>
            </div>

            <div class="border p-3 bg-light rounded mt-3 text-center">
                شارك المنتج
                <hr class="featurette-divider">
                <a href=""><img src="{{asset('icons/social/twitter.png')}}" style="max-width: 45px;margin: 3px 3px 3px 3px;" alt=""></a>
                <a href=""><img src="{{asset('icons/social/whatsapp.png')}}" style="max-width: 45px;margin: 3px 3px 3px 3px;" alt=""></a>
                <a href=""><img src="{{asset('icons/social/facebook.png')}}" style="max-width: 45px;margin: 3px 3px 3px 3px;" alt=""></a>
                <a href=""><img src="{{asset('icons/social/instagram.png')}}" style="max-width: 45px;margin: 3px 3px 3px 3px;" alt=""></a>
                <a href=""><img src="{{asset('icons/social/telegram.png')}}" style="max-width: 45px;margin: 3px 3px 3px 3px;" alt=""></a>
                <a href=""><img src="{{asset('icons/social/youtube.png')}}" style="max-width: 45px;margin: 3px 3px 3px 3px;" alt=""></a>
            </div>
        </div>
    </div>

</div>

@endsection
