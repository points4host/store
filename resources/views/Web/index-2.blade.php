@extends('Web.Header')

@section('content')

<!-- Three columns of text below the carousel -->
<div class="row text-center">
  <div class="col-lg-4">
    <img src="{{asset('icons/net.png')}}" class="bd-placeholder-img rounded-circle mb-2" width="100" height="100" alt="...">
    <h4><b>الخدمات</b></h4>
    <p>من اولياتنا هي سرعه التحميل ورفع الملفات بسرعه فائقة دون تقطيع</p>
    <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
  </div>
  <div class="col-lg-4">
    <svg class="bd-placeholder-img rounded-circle mb-2" width="100" height="100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect fill="#777" width="100%" height="100%"/><text fill="#777" dy=".3em" x="50%" y="50%">140x140</text></svg>
    <h4><b>الملفات</b></h4>
    <p>يمكنك رفع ملفات غير محدودة بسعات تخزين كبيرة</p>
    <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
  </div>
  <div class="col-lg-4">
    <svg class="bd-placeholder-img rounded-circle mb-2" width="100" height="100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect fill="#777" width="100%" height="100%"/><text fill="#777" dy=".3em" x="50%" y="50%">140x140</text></svg>
    <h4><b>الدقة</b></h4>
    <p>نحن نتأكد دائماً اننا نلبي جميع طلباتكم و احتياجاتكم على أعلى مستوى من الدقة</p>
    <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
  </div>
</div>
<!-- /.row -->



<!-- START THE FEATURETTES -->

<hr class="featurette-divider">

<div class="row featurette">
    <div class="col-md-7 text-center">
      
        <h2 class="featurette-heading">لوحة التحكم</h2>
        
        <p class="lead">
            تتميز لوحة التحكم بامكانيات عالية متطورة
            وسهلة الاستخدام قم بدخول للوحة التحكم لتتعرف
            على مميزاتها.
        </p>
        
    </div>
  <div class="col-md-5">
    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="300" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500">
        <title>Placeholder</title><rect fill="#eee" width="100%" height="100%"/>
        <text fill="#aaa" dy=".3em" x="50%" y="50%">500x500</text>
    </svg>
  </div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
    <div class="col-md-7 order-md-2 text-center">
        <h2 class="featurette-heading">لوحة التحكم</h2>
        <p class="lead">
            تتميز لوحة التحكم بامكانيات عالية متطورة
            وسهلة الاستخدام قم بدخول للوحة التحكم لتتعرف
            على مميزاتها.
        </p>
    </div>
    <div class="col-md-5 order-md-1">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="300" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect fill="#eee" width="100%" height="100%"/><text fill="#aaa" dy=".3em" x="50%" y="50%">500x500</text></svg>
    </div>
</div>

<hr class="featurette-divider">

<!-- /END THE FEATURETTES -->








</div>
<!-- /.container -->


@endsection
