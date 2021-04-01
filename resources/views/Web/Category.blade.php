@extends('Web.Header')

@section('content')

<style>
  .row {
    display: flex;
    flex-wrap: wrap;
  }
  .row > div[class*='col-'] {
    display: flex;
  }
  .card_Producer:hover {
    box-shadow: 0 0 11px rgba(33,33,33,.2);
  }
  .footerz {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.75);
    color: white;
    text-align: center;
    z-index: 544;
  }
</style>

{{-- السلة  --}}
{{--
<div class="footerz py-2">
  
  <div class="clearfix mx-2">
    <a class="btn btn-link border btn-sm float-right bg-info" style="border-radius: 25px;" onclick="dcfsd(3)">
      <small>
        أتمام الطلب
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <polyline points="15 6 9 12 15 18"></polyline>
       </svg>
      </small>
    </a>

    <span class="align-baseline text-muted float-left font-weight-bolder mx-2" style="position: relative;">
      <p class="py-0 px-2 bg-danger text-white" style="position: absolute;border-radius: 25px;margin-right: 10px;">
        <small>42</small>
      </p>
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <polyline points="7 10 12 4 17 10"></polyline>
        <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
        <circle cx="12" cy="15" r="2"></circle>
     </svg>
     
    </span>
  </div>



</div>
--}}
{{-- نهاية كود السلة  --}}

{{-- 
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active bg-dark">
        <img class="d-block w-100" src="{{asset('upload/z2.jpg')}}" alt="First slide">
      </div>
      <div class="carousel-item bg-dark">
        <img class="d-block w-100" src="{{asset('upload/z3.jpg')}}" alt="Second slide">
      </div>
      <div class="carousel-item bg-dark">
        <img class="d-block w-100" src="{{asset('upload/z4.jpg')}}" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  --}}

{{--
<div class="container border-bottom">
  <div class="d-flex bd-highlight">
    <div class="p-2 flex-fill bd-highlight">Flex item</div>
    <div class="p-2 flex-fill bd-highlight border-left border-right">Flex item</div>
    <div class="p-2 flex-fill bd-highlight">Flex item</div>
  </div>
</div>

--}}


{{--
<div class="container my-3">
  <div class="d-flex flex-row-reverse bd-highlight" style="border-right-style: solid; border-right-width: 5px;border-color: #28a745;">
    
    <div class="p-1 bd-highlight">
      <button type="button" class="btn btn-light btn-sm border x-button-next rounded-circle" style="padding: 2px">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="22" height="22" viewBox="0 0 24 24" stroke-width="1" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <polyline points="9 6 15 12 9 18" />
        </svg>
      </button>
      <button type="button" class="btn btn-light btn-sm border x-button-prev rounded-circle" style="padding: 2px">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="22" height="22" viewBox="0 0 24 24" stroke-width="1" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <polyline points="15 6 9 12 15 18" />
        </svg>
      </button>
      <button type="button" style="border-radius: 25px;"
      class="btn btn-light border x-button-prev py-1 btn-sm">عرض الكل</button>
    </div>
    <div class="p-2 flex-grow-1 bd-highlight font-weight-bolder text-success">الاكثر مبيعاً</div>
  </div>
</div>

<div class="container">


<style>
.swiper-container {
  width: 100%;
  height: 100%;
  background-color: #FFF;
  padding: 5px;
}
.swiper-slide {
  text-align: center;
  font-size: 18px;
  background: #fff;
  margin: 2px 0px;
  transition: box-shadow 0.3s;
  border-radius:10px;
}
.swiper-slide:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.2);
}
.swiper-icon:hover{

}
.swiper-icon{
  cursor: pointer;
}

</style>



  <div class="swiper-container">

    <div class="swiper-wrapper">
      
      @for ($i = 1; $i < 10; $i++)
        <div class="swiper-slide" style="position: relative;">
          <p class="py-0 px-2 bg-success text-white" style="position: absolute;border-radius: 10px 0px 0px 10px;">
            <small>50 جرام</small>
          </p>
          {{-- <div class="mb-2" style="height:250px;"> --}}

          {{--
          <div class="mb-2">
            <img src="{{asset('upload/'.$i.'.jpg')}}" class="img-fluid w-100" alt="Responsive image" style="border-radius: 10px 10px 0px 0px;">
          </div>
          
          <p class="text-left px-0 py-2 mx-2 h6 mb-0"><small>بهارات مشكلة هندي واسيوي لمنتاج الكبسة والطبخ مطحونة</small></p> 
          <p class="text-left p-0 mx-2 h6 mb-2 h7"><small class="text-muted">مذاق شرق</small></p> 
          <div class="clearfix mx-2">
            <a class="text-secondary float-right" style="cursor: pointer;" onclick="dcfsd()">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="25" height="25" viewBox="0 0 24 24" stroke-width="1" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="9" cy="19" r="2" />
                <circle cx="17" cy="19" r="2" />
                <path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" />
              </svg>
            </a>
            <span class="align-baseline text-success float-left font-weight-bolder"><small> 352{{$i}} ريال </small></span>
          </div>
        </div>

      @endfor
    </div>
  </div>
    
</div>
--}}

<div class="container my-2">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
      <li class="breadcrumb-item"><small><a class="text-body" href="{{asset('')}}">الرئيسية</a></small></li>
      @if (!empty($get_cat))
        <li class="breadcrumb-item"><small><a class="text-body" href="{{ route('Web.category',$get_cat->id)}}">{{$get_cat->name}}</a></small></li>
      @endif
      <li class="breadcrumb-item active" aria-current="page"><small>{{$category->name}}</small></li>
    </ol>
  </nav>
</div>


<div class="container pt-2">
  <div class="row">
      @foreach($product as $val)
      @php
          $count_products = $val->quantity - $val->quantity_sold;
      @endphp
      @if (!$count_products <= 0)

      <div id="grid_mobile" class="mb-3 col-6 col-lg-3 col-sm-4">
        <div class="card card_Producer border-0" style="position: relative;border-radius: 10px;">
            <p class="py-0 px-2 bg-success text-white" style="position: absolute;border-radius: 10px 0px 0px 10px;">
              <small>{{ $val->weight }} {{ $val->measurements_name }}</small>
            </p>
            
            @if ($val->is_discount_active == 1)
                @if (date('Y-m-d') <= date($val->end_date))
                  <p class="py-0 px-2 bg-danger text-white" style="position: absolute;border-radius: 0px 10px 10px 0px;left:0px;">
                    <small>خصم {{ $val->discount.'%' }}</small>
                  </p>
                @endif
            @endif
            <div class="mb-2">
              <a class="nav-link" href="{{ route('Web.product',$val->id)}}">
                <img src="{{asset('uploads/'.$val->images_name)}}" class="img-fluid card-img-top w-100" alt="Responsive image" style="border-radius: 10px 10px 0px 0px;" id="image_product_height">
              </a>
              </div>
            <div class="card-block">
              <a class="stretched-link text-dark" style="text-decoration: none;" href="{{ route('Web.product',$val->id)}}">
                <p class="text-left px-0 py-2 mx-2 h6 mb-0"><small>{{ $val->name }}</small></p> 
              </a>
                {{-- <p class="text-left p-0 mx-2 h6 mb-2 h7"><small class="text-muted">مذاق شرق</small></p> --}}
                @if ($val->is_discount_active == 1)
                    @if (date('Y-m-d') <= date($val->end_date))
                      <p class="text-left p-0 mx-2 h6 mb-2 h7"><del><small>{{ $val->unit_price }} ريال</small></del> <small class="text-muted">خصم {{ $val->discount.'%' }}</small></p> 
                    @endif
                @endif
              <div class="clearfix mx-2 my-3">
                @if ($val->is_discount_active == 1)
                    @if (date('Y-m-d') <= date($val->end_date))
                        <span class="align-baseline text-danger float-left font-weight-bolder"> {{ $val->price_after_discount }} <small><b>ريال</b></small> </span>
                    @else
                        <span class="align-baseline text-danger float-left font-weight-bolder"> {{ $val->unit_price }} <small><b>ريال</b></small> </span>
                    @endif
                @else
                    <span class="align-baseline text-danger float-left font-weight-bolder"> {{ $val->unit_price }} <small><b>ريال</b></small> </span>
                @endif
                <a class="btn btn-link border btn-sm float-right" style="border-radius: 25px;" onclick="add_product_to_cart({{ $val->id }})">
                  <small>اضافة لسلة</small>
                </a>
              </div>
            </div>
        </div>
      </div>
      @endif
      @endforeach
  </div>
</div>

<script src="{{asset('js/swiper-bundle.min.js')}}"></script>
<script>
  function dcfsd (e){
    alert(e)
  }
  var ws_width = window.screen.width;
  var ws_per = 4;
  var grid_mobile = 6;
    if(ws_width  < 400 ){
      ws_per = 2;
      //document.getElementById("image_product_height").height = "200px";
    }else{
      //document.getElementById("image_product_height").height = "200px";
    }

    var swiper = new Swiper('.swiper-container',{
        slidesPerView: ws_per,
        spaceBetween: 10,
        autoplay: {
        delay: 2500,
        disableOnInteraction: false,
        },
        slidesPerGroup: ws_per,
        navigation: {
        nextEl: '.x-button-next',
        prevEl: '.x-button-prev',
      },
    });

    var swiperx = new Swiper('.swiper-ahmad', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    $('.carousel').carousel({
      touch: false
    })
</script>

@endsection
