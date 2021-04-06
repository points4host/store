<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{asset('favicon.jpg')}}" />
    <link rel="apple-touch-icon-precomposed" href="{{asset('favicon.jpg')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" href="{{asset('favicon.jpg')}}">

    <link href='https://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'/>
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/popModal.min.css')}}">
    <script src="{{asset('js/popModal.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">

    {{--<title>{{ config('app.name', 'Laravel') }}</title>--}}
    <title>متجر صافي للعناية الشخصية</title>
    <link
    href="https://goSellJSLib.b-cdn.net/v1.4.1/css/gosell.css"
    rel="stylesheet"
  />
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-J9LXDG3EXE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-J9LXDG3EXE');
</script>
<style>
* { margin: 0; padding: 0; outline:0; }
body {
    font-size: 15px;
    font-family: 'Droid Arabic Kufi', serif;
    font-weight: normal;
    direction: rtl;
    background: #f6f6f6;
    background-image: 
}
.h7 {
  font-size: 0.97rem;
}
.modal.fade{
  opacity:1;
}
.modal.fade .modal-dialog {
   -webkit-transform: translate(0);
   -moz-transform: translate(0);
   transform: translate(0);
}
.type__number::-webkit-inner-spin-button, 
.type__number::-webkit-outer-spin-button { 
  -webkit-appearance: none;
}
</style>

<style>
.form-width-resis {
  width: 100%;
  max-width: 100%;
  padding: 15px;
  margin: auto;
  border: 0px ;
}
.form-signin {
  width: 100%;
  max-width: 100%;
  padding: 15px;
  margin: auto;
  border: 0px ;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-right-radius: 0;
  border-top-left-radius: 0;
}
.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
}

@media (min-width: 768px) {
  .form-width-resis {
    width: 30%;
    max-width: 100%;
    padding: 15px;
    margin: auto;
    border: 1px solid  #ccc;
}
    .form-signin {
    width: 30%;
    max-width: 100%;
    padding: 15px;
    margin: auto;
    border: 1px solid  #ccc;
    }
    .bd-placeholder-img-lg {
    font-size: 3.5rem;
    }
}
    </style>

{{-- الملف الشخصي --}}

<style>
.account-profile-list a {
color: #494d55
}

.account-profile-list a:hover {
color: #40babd
}
</style>


{{-- price 1 --}}
<style>
.view-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: row;
    flex-direction: row;
    padding-left: 0;
    margin-bottom: 0;
}
.thumbnail
{
    margin-bottom: 30px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
}

.item.list-group-item
{
    float: none;
    width: 100%;
    background-color: #fff;
    margin-bottom: 30px;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
    padding: 0 1rem;
    border: 0;
}
.item.list-group-item .img-event {
    float: left;
    width: 30%;
}

.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
    display: inline-block;
}
.item.list-group-item .caption
{
    float: left;
    width: 70%;
    margin: 0;
}

.item.list-group-item:before, .item.list-group-item:after
{
    display: table;
    content: " ";
}

.item.list-group-item:after
{
  clear: both;
}
</style>
{{-- end price 1 --}}

{{-- start swiper --}}
<link rel="stylesheet" href="{{asset('css/swiper-bundle.min.css')}}">


{{-- end swiper --}}
    <!-- Custom styles for this template -->
    </head>
<body>

  @include('Web.Top_Header')
  {{--  @include('Web.Navbar_Header') --}}

  {{-- <div class="jumbotron text-center border-0 rounded-0" style="margin-bottom:0;background: #fff url('{{asset('background/bg.jpg')}}') no-repeat top;">
    <h1>My First Bootstrap 4 Page</h1>
    <p>Resize this responsive page to see the effect!</p> --}}
    {{-- <p>{{ auth()->user() }}</p>
    <p>{{Route::has('login')}}</p>
    <p>{{Route::has('register')}}</p> --}}
  {{-- </div> --}}




<div id="vue-app" class="m-auto">
    @yield('auth')
</div>

@yield('content')



{{-- <div class="jumbotron text-center mt-2" style="margin-bottom:0;background: #f6f6f6;">
  <p>إتصل بنا</p>
</div> --}}

<br>

<div class="jumbotron m-0 rounded-0" style="background: #f1f1f1;">
  <div class="container">
    <div class="row">
      <div class="col pb-2">
        <div class="media">
          <a class="mr-3 border rounded-circle p-3 bg-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <rect x="7" y="9" width="14" height="10" rx="2" />
              <circle cx="14" cy="14" r="2" />
              <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" />
            </svg>
          </a>
          <div class="media-body">
            <h6 class="mt-0 font-weight-bolder text-success">الدفع نقدا</h6>
            <small>إمكانية الدفع عن الإستلام</small>
          </div>
        </div>

      </div>
      <div class="col pb-2">
        <div class="media">
          <a class="mr-3 border rounded-circle p-3 bg-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tax" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <line x1="9" y1="14" x2="15" y2="8" />
              <circle cx="9.5" cy="8.5" r=".5" fill="currentColor" />
              <circle cx="14.5" cy="13.5" r=".5" fill="currentColor" />
              <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" />
            </svg>
          </a>
          <div class="media-body">
            <h6 class="mt-0 font-weight-bolder text-success">الضريبة</h6>
            <small>جميع الأسعار شاملة الضربية</small>
          </div>
        </div>
      </div>
      <div class="col pb-2">
        <div class="media">
          <a class="mr-3 border rounded-circle p-3 bg-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <circle cx="9" cy="19" r="2" />
              <circle cx="17" cy="19" r="2" />
              <path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" />
            </svg>
          </a>
          <div class="media-body">
            <h6 class="mt-0 font-weight-bolder text-success">شحن مجاني</h6>
            <small>عند وصول مشترياتك الى 500 ريال</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="jumbotron m-0 rounded-0" style="background: #f6f6f6;">
  <div class="container">
    <div class="row">
      <div class="col">
        <h6 class="text-success font-weight-bolder">من نحن</h6>
        مؤسسة تجارية مرخصة من قبل وزارة التجارة
      </div>
      <div class="col">
        <h6 class="text-success font-weight-bolder">روابط مهمة</h6>
        <ul class="list-group" style="list-style: none">
          <li><a href="./" class="text-dark">- خيارات الدفع والتوصيل</a></li>
          <li><a href="./" class="text-dark">- سياسة الاسترجاع والاستبدال والإلغاء</a></li>
          <li><a href="./" class="text-dark">- اتصل بنا</a></li>
          <li><a href="./" class="text-dark">- الأسئلة الشائعة</a></li>
        </ul>
      </div>
      <div class="col">
        <h6 class="text-success font-weight-bolder">طرق الدفع</h6>
        <img src="{{asset('upload/cc.png')}}" style="max-width: 50px;margin: 0 3px;" alt="">
        <img src="{{asset('upload/mada.png')}}" style="max-width: 50px;margin: 0 3px;" alt="">
        <img src="{{asset('upload/stcpay.png')}}" style="max-width: 50px;margin: 0 3px;" alt="">
      </div>
    </div>
  </div>
</div>


<footer class="footer mt-auto py-2 bg-dark text-right">
  <div class="container">
    <p class="text-muted"><small>جميع الحقوق محفوظة لنقطة استضافة Copyright© 2020</small></p>
  </div>
</footer>



<script>
  var app3 = new Vue({
      
      el: '#vue-app',
      data: {
      seen: true,
      }
  })

</script>

{{-- اكود الجافا سكربت--}}


{{--
<style>
  .modal-backdrop {
    opacity:0.0 !important;
  }
</style>
--}}

  <!-- Modal -->
  <div class="modal" style="top: 45%;" id="Modal_add_product_to_cart" tabindex="-1">
    <div class="modal-dialog text-center">
        <div class="d-inline bg-dark text-white rounded shadow-sm" style="padding: 7px 3px 3px 3px;">
            <div class="spinner-border text-light" role="status">
                <span class="sr-only">Loading...</span>
              </div>
        </div>
    </div>
  </div>




<script>
function add_product_to_cart (vali_url){
  $('#Modal_add_product_to_cart').modal('show')

  var formdata = new FormData();
  formdata.append("_token", '<?php echo csrf_token() ?>');
  formdata.append("_method", 'POST');
  var ajax = new XMLHttpRequest();
  ajax.open("POST", vali_url);
  ajax.onreadystatechange = function() {
    
    if(ajax.readyState == 4 && ajax.status == 200) {
      var json = JSON.parse(ajax.responseText);
      $('#Modal_add_product_to_cart').modal('hide')
      if(json['verify'] == 'success'){
        var valu_inpt = document.getElementById("set_Number_of_products_in_the_Cart").value;
        document.getElementById("Number_of_products_in_the_Cart").innerHTML = parseFloat(valu_inpt) + 1;
        document.getElementById("set_Number_of_products_in_the_Cart").value = parseFloat(valu_inpt) + 1;
      }else{
        //alert('المنتج غير متوفر');

      }
    }
  }
  ajax.send(formdata);
  }
  function destroy_product_frome_cart (vali_url){
  $('#Modal_add_product_to_cart').modal('show')

  var formdata = new FormData();
  formdata.append("_token", '<?php echo csrf_token() ?>');
  formdata.append("_method", 'DELETE');
  var ajax = new XMLHttpRequest();
  ajax.open("POST", vali_url);
  ajax.onreadystatechange = function() {
    
    if(ajax.readyState == 4 && ajax.status == 200) {
      var json = JSON.parse(ajax.responseText);
      
      if(json['verify'] == 'success'){
        location.reload();
      }else{
        $('#Modal_add_product_to_cart').modal('hide')
        //alert('المنتج غير متوفر');
      }
    }
  }
  ajax.send(formdata);
  }
  function increase_product_frome_cart (vali_url){

  $('#Modal_add_product_to_cart').modal('show')

  var formdata = new FormData();
  formdata.append("_token", '<?php echo csrf_token() ?>');
  formdata.append("_method", 'POST');
  var ajax = new XMLHttpRequest();
  ajax.open("POST", vali_url);
  ajax.onreadystatechange = function() {
    
    if(ajax.readyState == 4 && ajax.status == 200) {
      var json = JSON.parse(ajax.responseText);
      $('#Modal_add_product_to_cart').modal('hide')
      if(json['verify'] == 'success'){
        document.getElementById("cart_items_quantity_"+json['id']).value = json['count'];

        var cart_total_price = document.getElementById("cart_total_price").value;
        var cart_unit_price = document.getElementById("cart_unit_price_"+json['id']).value;
        cart_total_price = parseFloat(cart_total_price.replace(",", ""));
        cart_unit_price = parseFloat(cart_unit_price.replace(",", ""));
        
        var price = cart_total_price + cart_unit_price;
        document.getElementById("cart_total_price").value = price.toFixed(2);
        document.getElementById("text_total_price").innerHTML = price.toFixed(2);
      }else{
        alert('المنتج غير متوفر');
      }
    }
  }
  ajax.send(formdata);
  }
function decrease_product_frome_cart (vali_url){

$('#Modal_add_product_to_cart').modal('show')

var formdata = new FormData();
formdata.append("_token", '<?php echo csrf_token() ?>');
formdata.append("_method", 'POST');
var ajax = new XMLHttpRequest();
ajax.open("POST", vali_url);
ajax.onreadystatechange = function() {
  
  if(ajax.readyState == 4 && ajax.status == 200) {
    var json = JSON.parse(ajax.responseText);
    $('#Modal_add_product_to_cart').modal('hide')
    if(json['verify'] == 'success'){
      //location.reload();
      document.getElementById("cart_items_quantity_"+json['id']).value = json['count'];

      var cart_total_price = document.getElementById("cart_total_price").value;
      var cart_unit_price = document.getElementById("cart_unit_price_"+json['id']).value;
      cart_total_price = parseFloat(cart_total_price.replace(",", ""));
      cart_unit_price = parseFloat(cart_unit_price.replace(",", ""));

      var price = cart_total_price - cart_unit_price;
      document.getElementById("cart_total_price").value = price.toFixed(2);
      document.getElementById("text_total_price").innerHTML = price.toFixed(2);
    }else{ 
      //alert('المنتج غير متوفر');
    }
  }
}
ajax.send(formdata);
}
$(document).ready(function(){

  var formdata = new FormData();
  formdata.append("_token", '<?php echo csrf_token() ?>');
  formdata.append("_method", 'GET');
  var ajax = new XMLHttpRequest();
  ajax.open("GET", '<?php echo route("cart.cart_count") ?>');
  ajax.onreadystatechange = function() {
    
    if(ajax.readyState == 4 && ajax.status == 200) {
      var json = JSON.parse(ajax.responseText);
      if(json['verify'] == 'success'){
        document.getElementById("Number_of_products_in_the_Cart").innerHTML = json['count'];
        document.getElementById("set_Number_of_products_in_the_Cart").value = json['count'];
      }else{
        //
      }
    }
  }
  ajax.send(formdata);

});
</script>


</body>
</html>
