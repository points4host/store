@extends('Web.Header')

@section('content')

<div class="container-fluid py-2  border-top border-bottom" style="background: #fafafa;">
    <div class="container">
        <br>
        <h4 class="ml-3 text-dark"><b>عربة التسوق</b></h4>
    </div>
</div>
<br />
<br />



<form accept-charset="UTF-8" action="https://api.moyasar.com/v1/payments.html" method="POST">

    <input type="hidden" name="callback_url" value="http://127.0.0.1:8000/charge" />
    <input type="hidden" name="publishable_api_key" value="pk_test_H89WMCaFdEj4BkWFrAUWpdfK9Z4qPQ764svM4XaC" />
    <input type="hidden" name="amount" value="10000" />
    <input type="hidden" name="source[type]" value="creditcard" />
    <input type="hidden" name="description" value="Order id 1234 by guest" />


    <input type="text" name="source[name]" /> <br />
    <input type="text" name="source[number]" value="4111111111111111" /> <br />
    <input type="text" name="source[month]" value="01" /> <br />
    <input type="text" name="source[year]" value="22" /> <br />
    <input type="text" name="source[cvc]" value="907" /> <br />



    <button type="submit">Purchase</button>
    </form>


<br />
<br />
<div class="container py-4">
    <div class="row featurette">
        
        <div class="col-md-9">
            <table class="table text-center border">
                <thead class="bg-dark text-light font-weight-normal">
                  <tr>
                    <th scope="col" width="10"></th>
                    <th scope="col" width="10">#</th>
                    <th scope="col" class="font-weight-normal">المنتج</th>
                    <th scope="col" width="150" class="font-weight-normal">الكمية</th>
                    <th scope="col" width="50" class="font-weight-normal">السعر</th>
                    <th scope="col" width="100" class="font-weight-normal">المجموع</th>
                  </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i < 4; $i++)
                        <tr>
                            <td>
                                <a class="text-secondary float-right swiper-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <circle cx="12" cy="12" r="9" />
                                        <path d="M10 10l4 4m0 -4l-4 4" />
                                    </svg>
                                </a>
                            </td>
                            <th scope="row">{{$i}}</th>
                            <td>Mark</td>
                            <td><div class="btn-group btn-group-sm" role="group" aria-label="...">
                                <button type="button" class="btn btn-light border rounded font-weight-bold" onclick="product_decrease('{{$i}}')" id="decrease_{{$i}}">-</button>
                                <input id="product_number_{{$i}}" style="margin: 0px 5px;width:40px;" type="number" min="1" onchange="product_onchange('{{$i}}')" class="form-control text-center form-control-sm type__number" placeholder="1" value="1">
                                <button type="button" class="btn btn-light border rounded font-weight-bold" onclick="product_increase('{{$i}}')" id="increase_{{$i}}">+</button>
                            </div></td>
                            <td>
                            <p id="unit_price_{{$i}}">{{$prais}}</p>
                            </td>
                            <td>
                                <p id="total_price_{{$i}}">{{$prais}}</p>
                            </td>
                        </tr>
                    @endfor
                </tbody>
              </table>
        </div>
        <div class="col-md-3">
            <div class="border p-3 rounded">
                <p>ملخص الطلب</p>
                <div class="clearfix mx-1">
                    <p class="float-right m-0" id="cart_total_price">{{$cart_total}}</p>
                    <p class="float-left m-0"><small>المجموع</small></p>
                </div>
                <div class="clearfix mx-1">
                    <p class="float-right m-0">{{$cart_tex}}</p>
                    <p class="float-left m-0"><small>الضريبة</small></p>
                </div>
                <div class="clearfix mx-1">
                    <p class="float-right m-0">0</p>
                    <p class="float-left m-0"><small>الشحن</small></p>
                </div>
                <div class="clearfix mx-1">
                    <p class="float-right m-0">0</p>
                    <p class="float-left m-0"><small>الخصم</small></p>
                </div>
                <hr class="featurette-divider">
                <div class="clearfix mx-1">
                    <h4 class="float-right"><span id="cart_all_total_price">{{$cart_total}}</span> ريال</h4>
                    <p class="float-left">الاجمالي</p>
                </div>
                <hr class="featurette-divider">

                <p style="display: inline-block" class="py-1 px-2 bg-light border rounded"><small>شامل الضريبة</small></p>

                <a href="{{ route('pay')}}" type="button" class="btn btn-success btn-lg btn-block shadow-sm">
                    الدفع {{-- الدفع الأمن --}}
                </a>
            </div>

            <div class="border p-3 rounded">
                <div id="paypal-button-container" class="text-center" style="width: 99%;"></div>
                <script src="https://www.paypal.com/sdk/js?client-id=AW5nKkGYF_hwQ7z6mFohecy4hBNynFdNfur03mZK61CzKeFAHRbbZY2f-Emm7Cb6fdUrRD75uHOPn3BA&disable-funding=credit,card"></script>
                <script>
                    paypal.Buttons({
                        style: {
                            layout:  'vertical',
                            //color:   'blue',
                            //shape:   'rect',
                            //label:   'buynow'
                        },
                        createOrder: function(data, actions) {
                            console.log(data)
                            console.log(actions)
                        // This function sets up the details of the transaction, including the amount and line item details.
                        return actions.order.create({
                            purchase_units: [{
                            amount: {
                                value: '1.00'
                            }
                            }],
                            application_context: {
                                shipping_preference: 'NO_SHIPPING'
                            }

                        });
                        },
                        onApprove: function(data, actions) {
                        // This function captures the funds from the transaction.
                        return actions.order.capture().then(function(details) {
                            // This function shows a transaction success message to your buyer.
                            console.log(details)
                            alert('Transaction completed by ' + details.payer.name.given_name);
                        });
                        }
                        
                    }).render('#paypal-button-container');
                </script> 
            </div>
            <form action="{{ url('charge') }}" method="post">
                <input type="text" name="amount" />
                {{ csrf_field() }}
                <input type="submit" name="submit" value="Pay Now">
            </form>
        </div>
    </div>

</div>



<script>
function product_decrease (id){
    var increase = document.getElementById("product_number_"+id).value;
    if(increase < 2 ){
        document.getElementById("product_number_"+id).value = 1;
        return 0 ;
    }
    document.getElementById("product_number_"+id).value = --increase;

    var unit_price = Number(document.getElementById("unit_price_"+id).innerHTML);
    var total_price = Number(document.getElementById("total_price_"+id).innerHTML);
    var add_price = total_price - unit_price;
    document.getElementById("total_price_"+id).innerHTML = add_price;

    // cart
    var cart_total_price = Number(document.getElementById("cart_total_price").innerHTML);
    var amount = cart_total_price - unit_price ;
    document.getElementById("cart_total_price").innerHTML =   amount;
    var tex = amount * (1 + {{$cart_tex}} / 100.0);
    document.getElementById("cart_all_total_price").innerHTML =   tex.toFixed(2);

}
function product_increase (id){
    var increase = document.getElementById("product_number_"+id).value;
    document.getElementById("product_number_"+id).value = ++increase;
    var unit_price = Number(document.getElementById("unit_price_"+id).innerHTML);
    var add_price = increase * unit_price;
    document.getElementById("total_price_"+id).innerHTML = add_price;

    // cart
    var cart_total_price = Number(document.getElementById("cart_total_price").innerHTML);
    var amount = cart_total_price + unit_price ;
    document.getElementById("cart_total_price").innerHTML =  amount ;
    var tex = amount * (1 + {{$cart_tex}} / 100.0);
    document.getElementById("cart_all_total_price").innerHTML = tex.toFixed(2);
}
function product_onchange (id){
    var increase = document.getElementById("product_number_"+id).value;
    document.getElementById("product_number_"+id).value = increase;
}
</script>


@endsection
