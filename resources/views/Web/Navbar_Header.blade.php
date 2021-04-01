
<nav class="navbar navbar-expand-lg navbar-light bg-light border-top">
    <div class="container">
        {{-- <a class="text-muted" href="/">جميع التصنيفات</a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-pills font-weight-bolder">
                <li class="nav-item">
                    <a class="nav-link" href="#">المنتجات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">الجداول</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">تواصل</a>
                </li>
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      حسابي
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('clientarea.index') }}">
                            منطقة العميل
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            تسجيل الخروج
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                      {{-- <a class="dropdown-item" href="#">تسجيل الدخول</a>
                      <a class="dropdown-item" href="#">أنشاء حساب جديد</a> --}}
                    </div>
                </li>
                @else
                {{--
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
                    </li>
                --}}
                @endauth
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
    </div>
</nav>