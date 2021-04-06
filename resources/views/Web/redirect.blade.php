@extends('Web.Header')

@section('content')


<div class="container-fluid p-3 my-4 bg-white">
  
    @if ($status_invoices == 1)
      <div>
        <h5><b>شكراً لك تم تأكيد طلبك.</b></h5>
        <p>سيتم شحن طلبك باسرع وقت ممكن. وفي حال وجود استفسارات أو ملاحظات الرجاء التواصل مع خدمة العملاء 
          واتساب: <span class="text-info">0535812300</span></p>
      </div>
    @else
      <div>
        <h5><b>طلبك معلق</b></h5>
        <p class="text-danger font-weight-bold">هناك مشكلة بطلبك</p>
        <p>يرجى إكمال الدفع وإلا سيتم إلغاؤه</p>
      </div>
    @endif

</div>

@endsection
