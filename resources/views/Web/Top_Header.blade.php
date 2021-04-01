
{{-- @if (Route::has('login'))
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
     --}}
<!--Main Navigation-->

<script>
    /*
    $('#xx_felem').popModal({
    html : $('#content_felem').html(),
    placement : 'bottomLeft',
    showCloseBut : false,
    onDocumentClickClose : false,
    onDocumentClickClosePrevent : '',
    overflowContent : false,
    inline : true,
    asMenu : false,
    size : '',
    onOkBut : function(event, el) {},
    onCancelBut : function(event, el) {},
    onLoad : function(el) {},
    onClose : function(el) {}
    });
    */
</script>
    

<style>
    /* width */
    ::-webkit-scrollbar {
    width: 1px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
    background: #f1f1f1; 
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
    background: #888; 
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
    background: #555; 
    }
    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1000;
      top: 0;
      right: 0;
      overflow-x: hidden;
      transition: 0.2s;
      padding-top: 60px;
    }
    
    .sidenav a {
      padding: 8px 25px 8px 15px;
      text-decoration: none;
      color: #818181;
      display: block;
      transition: 0.2s;
      font-size: 13px;
    }
    
    .sidenav a:hover {
      color: #f1f1f1;
    }
    
    .sidenav .closebtn {
      position: absolute;
      top: 0;
      left: 5px;
      font-size: 26px;
      margin-right: 50px;
    }
    
    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
    }
    </style>

<div id="mySidenav" class="sidenav bg-white border-right">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <a class="nav-link text-body" href="{{asset('')}}">الرئيسية</a>

    @foreach($master_category[0] as $cat)
    <a class="nav-link text-body border-top" data-toggle="collapse" href="#collapse_category{{$cat->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">{{$cat->name}}</a>
    <div class="collapse" id="collapse_category{{$cat->id}}" style="padding: 0px 10px 0px 0px">
        <a class="nav-link text-body" href="{{ route('Web.category',$cat->id)}}">- الكل</a>
        @foreach($master_category[1] as $sub)
            @if ($cat->id == $sub->sub)
                <a class="nav-link text-body" style="font-size: 13px;" href="{{ route('Web.category',$sub->id)}}">- {{$sub->name}}</a>
            @endif
        @endforeach
    </div>
    @endforeach


    <a class="nav-link text-body border-top" href="#">العروض</a>
    <hr class="featurette-divider mt-0">
    <a class="nav-link" href="#">عن المتجر</a>
    <a class="nav-link" href="#">اتصل بنا</a>
    @auth
    <a class="nav-link" href="{{ route('clientarea.index') }}">حسابي</a>
    <a class="nav-link" href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">تسجيل الخروج</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    @else
    <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
    @endauth
</div>





<script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "200px";
    }
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }

</script>

<div style="height: 65px;">

</div>


<div class="container-fluid text-dark bg-white border-bottom" style="height: 65px;position: fixed;top: 0;width: 100%;z-index: 999;">
    <div class="d-flex justify-content-between py-2">
        <div class="p-0">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        </div>
        <div class="pt-2">
            <a href="{{asset('./')}}" class="mr-2 text-decoration-none text-dark">
                <img src="{{asset('icons/a4.png')}}" class="img-fluid" height="32" width="32" alt="Responsive image">
            </a>
            <a href="{{asset('./')}}" class="mr-2 text-decoration-none text-dark">متجر صافي</a>
        </div>
        
        <div class="pt-2">

            @auth
                <a href="{{ route('clientarea.index') }}" style="text-decoration: none;" class="mr-2 text-decoration-none text-dark">حسابي</a>
            @else
            <a href="{{ route('login') }}" class="text-secondary mx-1" style="color:#000;cursor: pointer;text-decoration: none;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="25" height="25" viewBox="0 0 24 24" stroke-width="1" stroke="#000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="12" cy="7" r="4" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
            </a>
            @endauth
              <small>|</small>

{{--
                <a href="{{ route('Web.cart') }}" class="text-secondary float-right mx-2" id="xx_felem" data-popmodal-bind="#content_felem" style="color:#000;cursor: pointer;">
--}}
            <a href="{{ route('cart.index') }}" class="text-secondary float-right mx-2" style="color:#000;cursor: pointer;text-decoration: none;">
                <span class="badge badge-pill badge-danger" style="zoom: 1.2" id="Number_of_products_in_the_Cart">0</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="25" height="25" viewBox="0 0 24 24" stroke-width="1" stroke="#000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="9" cy="19" r="2" />
                    <circle cx="17" cy="19" r="2" />
                    <path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" />
                </svg>
            </a>
            <div style="display:none">

                <div id="content_felem">
                        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    <div class="popModal_footer">
                        <button type="button" class="btn btn-primary" data-popmodal-but="ok">ok</button>
                        <button type="button" class="btn btn-default" data-popmodal-but="cancel">cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>