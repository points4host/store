@extends('Web.Header')

@section('content')


<div class="container-fluid p-3 my-4 bg-white">

  

<div id="response_success" style="display: none">
  <h5><b>شكراً لك تم تأكيد طلبك.</b></h5>

  <p>سيتم شحن طلبك باسرع وقت ممكن. وفي حال وجود استفسارات أو ملاحظات الرجاء التواصل مع خدمة العملاء 
    واتساب: <span class="text-info">0535812300</span></p>
</div>

<div id="response_error" style="display: none">
  <h5><b>طلبك معلق</b></h5>
  <p class="text-danger font-weight-bold">هناك مشكلة بطلبك</p>
  <p>يرجى إكمال الدفع وإلا سيتم إلغاؤه</p>
</div>

  <script type="text/javascript" src="https://goSellJSLib.b-cdn.net/v1.6.0/js/gosell.js"></script>

</div>

<script>
  goSell.showResult({

    callback: response => {
      //console.log('response', response);
      //console.log('response', response['callback']['response']['code']);

      
      
      var formdata = new FormData();
      formdata.append("_token", '<?php echo csrf_token() ?>');
      formdata.append("_method", 'POST');
      formdata.append('callback_token', response['callback']['metadata']['token']);
      formdata.append('callback_code', response['callback']['response']['code']);
      formdata.append('callback_message', response['callback']['response']['message']);
      formdata.append('callback_tap_id', response['callback']['receipt']['id']);
      formdata.append('callback_tap_token', response['callback']['id']);
      formdata.append('callback_amount', response['callback']['amount']);
      var ajax = new XMLHttpRequest();
      ajax.open("POST", "<?php echo route('cart.go_response'); ?>");
      ajax.onreadystatechange = function() {
        
        if(ajax.readyState == 4 && ajax.status == 200) {
          var json = JSON.parse(ajax.responseText);
          if(json['verify'] == 'success'){
            
            

            if(response['callback']['response']['code'] == '000'){
              document.getElementById("response_success").style.display = 'block';
            }else{
              document.getElementById("response_error").style.display = 'block';
            }




          }else{
            document.getElementById("response_error").style.display = 'block';
          }
        }
      }
      ajax.send(formdata);


    }
  });
</script>
@endsection
