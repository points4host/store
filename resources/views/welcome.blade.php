<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
        <title>لارافيل</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.png')}}" />
        <link href='http://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'/>
<style>
* { margin: 0; padding: 0; outline:0; }
body {
    font-size: 15px;
    font-family: 'Droid Arabic Kufi', serif;
    font-weight: normal;
    direction: rtl;
    background: #fff;
    background-image: 
}
</style>


    </head>
    <body>

    <div class="jumbotron text-center border-0 rounded-0" style="margin-bottom:0;background: #fff url('{{asset('background/bg.jpg')}}') no-repeat top;">
        <h1>My First Bootstrap 4 Page</h1>
        <p>Resize this responsive page to see the effect!</p>
        <p>{{ auth()->user() }}</p>
        <p>{{Route::has('login')}}</p>
        <p>{{Route::has('register')}}</p>
    </div>



    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
        
<!--Main Navigation-->
<header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><strong>تعلم لارفيل</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">الرئيسية <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">الاعضاء</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">الجداول</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">تواصل</a>
                </li>
            </ul>
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fab fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </nav>

</header>
<!--Main Navigation-->

    <!--Main Layout-->
    {{-- <main>
        <br>
        <br>

        <div class="container">

            <script>
                function add_data(){
                    var formdata = new FormData();
                    formdata.append("_token", "{{ csrf_token() }}")
                    formdata.append("file_width", 'zzz')
                    formdata.append("file_height", 'vvv')
                    var ajax = new XMLHttpRequest();
                    ajax.open("POST", "{{ route('insertss') }}");
                    ajax.setRequestHeader( 'X-CSRF-TOKEN', "{{ csrf_token() }}");
                    ajax.onreadystatechange = function() {
                        console.log(ajax.status)
                        if(ajax.readyState == 4 && ajax.status == 200) {
                            //var return_data = JSON.parse(ajax.responseText);
                            // if(return_data['verify'] == 1){

                            // }else{
                            // }
                            alart('ok')
                        }
                    }
                    ajax.send(formdata);
                }
            </script>

                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                @csrf
                <button onclick="add_data()" type="submit" class="btn btn-primary">Submit</button>



        </div>
    </main> --}}
    <!--Main Layout-->






  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing my-5">

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




      <div class="jumbotron text-center" style="margin-bottom:0">
        <p>إتصل بنا</p>
      </div>


      <footer class="footer mt-auto py-2 bg-dark text-center">
        <div class="container">
          <span class="text-muted">جميع الحقوق محفوظة لنقطة صيانة Copyright© 2020</span>
        </div>
      </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>
    </body>
</html>
