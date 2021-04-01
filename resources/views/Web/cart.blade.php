@extends('Web.Header')

@section('content')
<link rel="stylesheet" href="{{asset('telephone/css/intlTelInput.css')}}">


@php
    $token_temporary_invoices = md5('temporary_invoices'.time());
@endphp



<style>

    .button_in_pay{
        background-color: #F2CF66;
        border-bottom: 2px solid #D1B358;
    }
    .mesg_in_pay{
        display: block;
    }
    .nhnyn {
        background: rgb(224, 224, 224);
        background: linear-gradient(0deg, rgb(240, 240, 240) 0%, rgb(238, 238, 238) 100%);
        border-color: #9c9c9c;
        color: rgb(80, 80, 80);
    }
    @media (min-width: 576px) { 
        .cart_div {
            width: 50%;
        }
        .cart_input {
            width: 50%;
        }
    }
    @media (min-width: 576px) { 
        .cart_div {
            width: 50%;
        }
        .cart_input {
            width: 50%;
        }
    }
    @media (max-width: 575.98px) { 
        .cart_input {
            width: 80%;
        }
    }
</style>


{{--  فورم اظهار المنتجات لسلة  --}}

<div id="Cart_Template_1" class="container-fluid py-2 border-top border-bottom bg-white cart_div">
    <div class="container p-0">
        <br/>
        <p>المجموع الفرعي (سلعة واحدة) <span class="text-danger" id="text_total_price">{{$cart_total_price}}</span> <span class="text-danger">ريال</span></p>
        <input type="text" id="cart_total_price" hidden="hidden" value="{{$cart_total_price}}">
        <button type="button" class="btn button_in_pay btn-block btn-lg" data-toggle="modal" data-target="#Modal_setp">
            <small>تابع لاتمام عملية الشراء</small>
        </button>

        @foreach($product as $val)
            <hr class="featurette-divider">
            <div class="media mb-2">
                <img src="{{asset('uploads/'.$val->images_name)}}" width="100" class="align-self-center mr-3" alt="...">
                <div class="media-body">
                    <p class="m-0 p-0">{{ $val->name }}</p>
                    @if ($val->is_discount_active == 1)
                        @if (date('Y-m-d') <= date($val->end_date))
                            <p class="m-0 p-0 text-danger">{{ $val->price_after_discount }} ريال</p>
                            <input type="number" id="cart_unit_price_{{$val->id}}" hidden="hidden" value="{{$val->price_after_discount}}">
                        @else
                        <p class="m-0 p-0 text-danger">{{ $val->unit_price }} ريال</p>
                        <input type="number" id="cart_unit_price_{{$val->id}}" hidden="hidden" value="{{$val->unit_price}}">
                        @endif
                    @else
                        <p class="m-0 p-0 text-danger">{{ $val->unit_price }} ريال</p>
                        <input type="number" id="cart_unit_price_{{$val->id}}" hidden="hidden" value="{{$val->unit_price}}">
                    @endif
                    <p class="m-0 p-0 text-success"><small>متوفر</small></p>
                </div>
            </div>
            <div class="input-group mb-3 cart_input">
                <button type="button" class="btn nhnyn" onclick="decrease_product_frome_cart('{{ route('cart.decrease',$val->id)}}')" style="width: 20%;">-</button>
                <input type="number" id="cart_items_quantity_{{$val->id}}" min="1" class="form-control text-center text-primary" placeholder="1" value="{{$val->cart_items_quantity}}" />
                <button type="button" class="btn nhnyn" onclick="increase_product_frome_cart('{{ route('cart.increase',$val->id)}}')" style="width: 20%;">+</button>

                <button type="button" class="btn nhnyn mx-4" onclick="destroy_product_frome_cart('{{ route('cart.destroy',$val->id)}}')" style="width: 20%;"><small><b>حذف</b></small></button>
            </div>
        @endforeach
        <hr class="featurette-divider">

        <button type="button" class="btn button_in_pay btn-block btn-lg" data-toggle="modal" data-target="#Modal_setp">
            <small>تابع لاتمام عملية الشراء</small>
        </button>
    </div>
</div>


{{--  تفاصيل الفاتورة  --}}


<div id="Cart_Template_2" class="container py-2" style="display: none">


<p><small>قم بمعاينة وتأكيد طلبك الآن.</small></p>

<div class="card mt-3">
    <div class="card-header bg-white">
        <p class="my-1">الشحن إلى: <span id="cart_customer_name" class="font-weight-bolder"></span></p>
        <p class="my-0">رقم الجوال: <b id="cart_customer_phone"></b></p>
        <p class="my-1">المدينة: <span id="cart_customer_address" class="font-weight-bolder"></span></p>
    </div>
    <div class="card-body">
        <style>
            
        </style>
        <table class="cart_table table table-borderless border-0 mb-0">
            <tbody>
              <tr>
                <td class="p-0 pb-1">السلع</th>
                <td class="p-0 text-right"><span id="last_total_Items"></span> ريال</td>
              </tr>
              <tr>
                <td class="p-0 pb-1">الشحن</th>
                <td class="p-0 text-right">12.00 ريال</td>
              </tr>
              <tr>
                <td class="p-0 pb-1">الإجمالي</th>
                <td class="p-0 text-right"><span id="last_total_price"></span> ريال</td>
              </tr>
              <tr>
                <td class="p-0 pb-1">الخصم</th>
                <td class="p-0 text-right">0.00 ريال</td>
              </tr>
              <tr>
                <td class="p-0 pt-2"><b>إجالي الطلب</b></th>
                <td class="p-0 pt-2 text-right text-danger"><b><span id="last_total_all_price"></span> ريال</b></td>
              </tr>
            </tbody>
          </table>
    </div>
  </div>

  <button type="button" id="openLightBox" class="btn button_in_pay btn-block btn-lg" onclick="cart_go_pay('{{ route('cart.go_pay')}}')">
    <small>إضغط هنا لتأكيد الطلب</small>
  </button>

{{--
<button type="button" class="btn button_in_pay btn-block btn-lg" onclick="goSell.openPaymentPage()">
    <small>إضغط هنا لتأكيد الطلب</small>
</button>
--}}
</div>






  <!-- Modal 1 -->
  <div class="modal animate__animated animate__zoomIn animate__faster" style="top: 15%;" id="Modal_setp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="setp1" class="modal-body text-center">
          
            <button onclick="setp1()" type="button" class="btn button_in_pay btn-block" data-toggle="modal" data-target="#exampleModal">
                <small>المتابعة دون تسجيل الدخول</small></button>
                <small>أو</small>
            <a class="btn btn-light btn-block" href="{{ route('login') }}">
                <small>التسجيل</small></a>
        </div>

        <div id="setp2" class="modal-body text-center" style="display: none">
            <div class="alert alert-danger animate__animated animate__flipInX" id="alert_in_pay" role="alert" style="display: none">
                
              </div>
            <div class="form-group">
                <label for="payInput_name">الاسم الشخصي</label>
                <input type="text" class="form-control" id="payInput_name" placeholder="الاسم الشخصي">
            </div>
            <div class="form-group">
                <label for="payInput_address">مدينة التوصيل</label>
                <input type="text" class="form-control" id="payInput_address" placeholder="مدينة التوصيل">
            </div>
            <div class="form-group">
                <label for="payInput_phone">رقم الجوال</label>
                <input type="tel" class="form-control" id="payInput_phone" style="width: 100%" dir="ltr" placeholder="0540040040">
            </div>

            <button type="button" onclick="next_setp()" class="btn btn-warning">متابعة >></button>
        </div>
        {{--
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        --}}
      </div>
    </div>
  </div>


  <!-- Modal 2 -->
  <div class="modal" style="top: 45%;" id="Modal_2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-center">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
          </div>
    </div>
  </div>




  <script type="text/javascript" src="https://goSellJSLib.b-cdn.net/v1.6.0/js/gosell.js"></script>

  <div id="root"></div>




  <script src="{{asset('telephone/js/intlTelInput.js')}}"></script>

<script>

var input = document.querySelector("#payInput_phone");
  window.intlTelInput(input, {
    // any initialisation options go here
    onlyCountries: ['sa']
  });

$('#Modal_setp').on('shown.bs.modal', function () {
    document.getElementById("setp1").style.display = 'block';
    document.getElementById("setp2").style.display = 'none';
    document.getElementById("alert_in_pay").style.display = 'none';
    document.getElementById("payInput_name").value ='';
    document.getElementById("payInput_address").value ='';
    document.getElementById("payInput_phone").value ='';
    document.getElementById("payInput_name").style.borderColor = "";
    document.getElementById("payInput_address").style.borderColor = "";
    document.getElementById("payInput_phone").style.borderColor = "";

    //$('.modal-dialog').attr('class', 'modal-dialog animate__animated animate__zoomIn');
})



function setp1() {
    document.getElementById("setp1").style.display = 'none';
    document.getElementById("setp2").style.display = 'block';
}
function next_setp() {
    
    var payInput_name = document.getElementById("payInput_name").value;
    var payInput_address = document.getElementById("payInput_address").value;
    var payInput_phone = document.getElementById("payInput_phone").value;

    if(payInput_name == '' || payInput_address == '' || payInput_phone == ''){
        document.getElementById("alert_in_pay").style.display = 'block';
        document.getElementById("alert_in_pay").innerHTML = 'يرجى تعبئة الحقول';
        if(payInput_name == ''){
            document.getElementById("payInput_name").style.borderColor = "red";
        }else{
            document.getElementById("payInput_name").style.borderColor = "";
        }
        if(payInput_address == ''){
            document.getElementById("payInput_address").style.borderColor = "red";
        }else{
            document.getElementById("payInput_address").style.borderColor = "";
        }
        if(payInput_phone == ''){
            document.getElementById("payInput_phone").style.borderColor = "red";
        }else{
            document.getElementById("payInput_phone").style.borderColor = "";
        }

        return false;
    }

    var phoneno = /^\d{10}$/;
    if(payInput_phone.match(phoneno)){
        //في حالت تسجيل المعلومات
            $('#Modal_setp').modal('hide')
            var cart_total_price = parseFloat(document.getElementById("cart_total_price").value);
            var asd = cart_total_price + 12;
            document.getElementById("last_total_Items").innerHTML = cart_total_price.toFixed(2);

            document.getElementById("last_total_price").innerHTML = asd.toFixed(2);
            document.getElementById("last_total_all_price").innerHTML = asd.toFixed(2);

            // بيانات العميل   
            var payInput_name = document.getElementById("payInput_name").value;
            var payInput_address = document.getElementById("payInput_address").value;
            var payInput_phone = document.getElementById("payInput_phone").value;

            document.getElementById("cart_customer_name").innerHTML = payInput_name;
            document.getElementById("cart_customer_phone").innerHTML = payInput_phone;
            document.getElementById("cart_customer_address").innerHTML = payInput_address;




            document.getElementById("Cart_Template_1").style.display = 'none';
            document.getElementById("Cart_Template_2").style.display = 'block';
        

            set_go_pay();


    }else{
        document.getElementById("alert_in_pay").style.display = 'block';
        document.getElementById("alert_in_pay").innerHTML = 'رقم الجوال غير صحيح';
        return false;
    }
    
}

function cart_go_pay (vali_url){

$('#Modal_add_product_to_cart').modal('show')

var formdata = new FormData();
formdata.append("_token", '<?php echo csrf_token() ?>');
formdata.append("_method", 'POST');
formdata.append('payInput_name', document.getElementById("payInput_name").value);
formdata.append('payInput_address', document.getElementById("payInput_address").value);
formdata.append('payInput_phone', document.getElementById("payInput_phone").value);
formdata.append('cart_total_price', parseFloat(document.getElementById("cart_total_price").value));
formdata.append('token_temporary_invoices', '<?PHP echo $token_temporary_invoices; ?>');
var ajax = new XMLHttpRequest();
ajax.open("POST", vali_url);
ajax.onreadystatechange = function() {
  
  if(ajax.readyState == 4 && ajax.status == 200) {
    var json = JSON.parse(ajax.responseText);
    $('#Modal_add_product_to_cart').modal('hide')
    if(json['verify'] == 'success'){
        goSell.openLightBox()
        //goSell.openPaymentPage()
    }else{ 
      //alert('المنتج غير متوفر');
    }
  }
}
ajax.send(formdata);
}

function set_go_pay() {
    goSell.config({
      containerID:"root",
      gateway:{
        publicKey:"pk_test_zk9NY4ZLdaKE5J3DsefIOcRg",
        merchantId: null,
        language:"ar",
        contactInfo:true,
        supportedCurrencies: ["SAR"],
        supportedPaymentMethods: ["MADA"],
        saveCardOption:false,
        customerCards: false,
        notifications:'standard',
        callback:(response) => {
            console.log('response', response['callback']['errors'][0]['code']);
            
        },
        onClose: (response) => {
            console.log("onClose Event");
        },
        onLoad:(response) => {
              console.log("onLoad");
        },
        backgroundImg: {
          url: 'imgURL',
          opacity: '0.5'
        },
        labels:{
            cardNumber:"رقم البطاقة",
            expirationDate:"MM/YY",
            cvv:"CVV",
            cardHolder:"أسم صاحب البطاقة",
            actionButton:"الدفع"
        },
        style: {
            base: {
              color: '#535353',
              lineHeight: '18px',
              fontFamily: 'sans-serif',
              fontSmoothing: 'antialiased',
              fontSize: '16px',
              '::placeholder': {
                color: 'rgba(0, 0, 0, 0.26)',
                fontSize:'15px'
              }
            },
            invalid: {
              color: 'red',
              iconColor: '#fa755a '
            }
        }
      },
      customer:{
        id:null,
        first_name: "demo",
        middle_name: "demo",
        last_name: "demo",
        email: "demo@demo.com",
        phone: {
            country_code: "966",
            number: document.getElementById("payInput_phone").value
        }
      },
      order:{
        amount: parseFloat(document.getElementById("cart_total_price").value) + 12 ,
        currency:"SAR",
        shipping:null,
        taxes: null
      },
     transaction:{
       mode: 'charge',
       charge:{
          saveCard: false,
          threeDSecure: false,
          description: "Test Description",
          statement_descriptor: "Sample",
          reference:{
            transaction: "txn_0001",
            order: '<?PHP echo $token_temporary_invoices; ?>'
          },
          metadata: {
            token: '<?PHP echo $token_temporary_invoices; ?>'
          },
          receipt:{
            email: false,
            sms: false
          },
          redirect: "<?php echo route('cart.go_redirect',$token_temporary_invoices); ?>",
          post: null,
        }
     }
});
}


</script>
@endsection
