@extends('Web.Header')

@section('content')

<script>
    var ws_width = window.screen.width;
    var ws_per = 4;
    var grid_mobile = 6;
    if(ws_width  < 400 ){
        ws_per = 2;
    }else{

    }
</script>


<div class="container p-0">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-white py-2 m-0">
        <li class="breadcrumb-item"><small><a class="text-body" href="{{asset('')}}">الرئيسية</a></small></li>
        <li class="breadcrumb-item active" aria-current="page"><small>{{$product->name}}</small></li>
      </ol>
    </nav>
  </div>



<div class="container py-3" style="background: #fafafa;">
    <a href="{{asset('')}}" class="btn btn-link text-muted">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
        </svg>
    </a>
    <h6 class="ml-3 text-muted"><b>{{ $product->name }}</b></h6>
</div>

<div class="container py-0">
    <div class="row featurette">
        
        <div class="col-md-8 bg-white py-2 mb-3">
            <style>
                .swiper-container {
                    
                }
                .swiper-slide {
                    text-align: center;
                    font-size: 18px;
                    background: #fff;
                    /* Center slide text vertically */
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: -webkit-flex;
                    display: flex;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    -webkit-justify-content: center;
                    justify-content: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    -webkit-align-items: center;
                    align-items: center;
                }
            </style>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($image as $item)
                        <div class="swiper-slide">
                            <img src="{{asset('uploads/'.$item->name)}}" class="w-100" alt="Responsive image">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <br>

            <style>
            .wrapper_p {
                text-align: justify;
                text-justify: inter-character;
              }
              
              .wrapper_img {
                float: left;
                height: 60px;
                margin-right: 10px;
                margin-bottom: 7px;
                
              }
              </style>
            
            <div class="wrapper_a">
            
                <img src="{{asset('uploads/'.$brand->image)}}" width="150" class="wrapper_img"/>
                <p class="wrapper_p">{!! $product->description !!}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="border p-3 rounded bg-white">
                
                    @if ($product->is_discount_active == 1)
                    <div class="clearfix mx-2">
                            <p class="py-0 px-2 bg-danger text-white float-right" style="border-radius: 10px 10px 10px 10px;">
                                <small>خصم {{ $product->discount.'%' }}</small>
                              </p>
                        
                        <del><small><p class="align-baseline text-dark float-left" style="text-decoration: line-through;">{{ $product->unit_price }} ريال</p></small></del>
                    </div>
                    <div class="clearfix mx-2">
                        <dt class="float-right text-dark">السعر</dt>
                        <h6 class="align-baseline text-danger float-left font-weight-bolder">{{ $product->price_after_discount }} ريال</h6>
                    </div>
                    @else
                    <div class="clearfix mx-2">
                        <dt class="float-right text-dark">السعر</dt>
                        {{-- <h6 class="float-left text-secondary font-weight-bold">352 ريال</h6> <br> --}}
                        <h5 class="align-baseline text-success float-left font-weight-bolder">{{ $product->unit_price }} ريال</h5>
                    </div>
                    @endif
                
                    @if (($product->quantity - $product->quantity_sold) <= 0)
                    <p class="text-danger"><b>غير متوفر<b></p>
                    @endif
                <hr class="featurette-divider">
                
                
                {{--
                @if ($product->is_tax == 1)
                    <p style="display: inline-block" class="py-1 px-2 bg-light border rounded"><small>شامل الضريبة</small></p>
                @endif
                --}}

{{--
                <div class="d-flex bd-highlight border">
                    <div class="p-2 flex-fill bd-highlight">
                        <button type="button" class="btn btn-light btn-block border rounded font-weight-bold" onclick="product_decrease()" id="decrease">-</button>
                    </div>
                    <div class="p-2 flex-shrink-1 bd-highlight">
                        <input id="product_number" style="margin: 0px 0px;width:40px;" type="number" min="1" onchange="product_onchange()" class="form-control text-center form-control-sm type__number" placeholder="1" value="1">
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <button type="button" class="btn btn-light btn-block m-0 border rounded font-weight-bold" onclick="product_increase()" id="increase">+</button>
                    </div>
                  </div>
--}}
                  <div class="input-group mb-3">
                    <button type="button" class="btn btn-light border" onclick="product_increase()" id="increase" style="width: 30%;">+</button>
                    <input type="number" id="product_number" min="1" onchange="product_onchange()" class="form-control text-center type__number" placeholder="1" value="1" />
                    <button type="button" class="btn btn-light border" onclick="product_decrease()" id="decrease" style="width: 30%;">-</button>
                  </div>

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

            <div class="border p-3 bg-light rounded mt-3 text-center bg-white">
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

<script src="{{asset('js/swiper-bundle.min.js')}}"></script>
<script>

var swiper = new Swiper('.swiper-container',{
        slidesPerView: 1,
        loop: true,
        pagination: {
        el: '.swiper-pagination',
        },
        
    });



    function product_decrease (){
        var increase = document.getElementById("product_number").value;
        if(increase < 2 ){
            document.getElementById("product_number").value = 1;
            return 0 ;
        }
        document.getElementById("product_number").value = --increase;
    
    }
    function product_increase (id){
        var increase = document.getElementById("product_number").value;
        document.getElementById("product_number").value = ++increase;
    }
    function product_onchange (id){
        var increase = document.getElementById("product_number_").value;
        document.getElementById("product_number").value = increase;
    }
</script>


@endsection
