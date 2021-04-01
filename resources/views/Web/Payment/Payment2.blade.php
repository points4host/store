@extends('Web.Header')

@section('content')


<div class="container-fluid py-2  border-top border-bottom" style="background: #fafafa;">
    <div class="container">
        <br>
        <h4 class="ml-3 text-dark"><b>عربة التسوق</b></h4>
    </div>
</div>

<div class="container py-4">

    <script type="text/javascript" src="https://goSellJSLib.b-cdn.net/v1.6.0/js/gosell.js"></script>

    <div id="root"></div>
    <button id="openLightBox" onclick="goSell.openLightBox()">اتمام عملية الشراء</button>
    <button id="openPage" onclick="goSell.openPaymentPage()">open goSell Page</button>

    <script>

    goSell.config({
      containerID:"root",
      gateway:{
        publicKey:"pk_test_zk9NY4ZLdaKE5J3DsefIOcRg",
        merchantId: null,
        language:"ar",
        contactInfo:true,
        supportedCurrencies: ["SAR"],
        supportedPaymentMethods: "all",
        saveCardOption:false,
        customerCards: false,
        notifications:'standard',
        callback:(response) => {
            console.log('response', response);
        },
        onClose: () => {
            console.log("onClose Event");
        },
        backgroundImg: {
          url: 'imgURL',
          opacity: '0.5'
        },
        labels:{
            cardNumber:"Card Number",
            expirationDate:"MM/YY",
            cvv:"CVV",
            cardHolder:"Name on Card",
            actionButton:"Pay"
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
        first_name: "First Name",
        middle_name: "Middle Name",
        last_name: "Last Name",
        email: "demo@email.com",
        phone: {
            country_code: "965",
            number: "540062364"
        }
      },
      order:{
        amount: 100,
        currency:"SAR",
        items:[{
          id:1,
          name:'item1',
          description: 'item1 desc',
          quantity: '1',
          amount_per_unit:'00.000',
          discount: {
            type: 'P',
            value: '10%'
          },
          total_amount: '100.000'
        }],
        shipping:null,
        taxes: null
      },
     transaction:{
       mode: 'charge',
       charge:{
          saveCard: false,
          threeDSecure: true,
          description: "Test Description",
          statement_descriptor: "Sample",
          reference:{
            transaction: "txn_0001",
            order: "ord_0001"
          },
          metadata:{},
          receipt:{
            email: false,
            sms: true
          },
          redirect: "http://localhost/redirect.html",
          post: null,
        }
     }
    });

    </script>



</div>





@endsection
