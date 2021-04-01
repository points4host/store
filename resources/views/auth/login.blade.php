@extends('Web.Header')

@section('auth')


<form class="form-signin my-5 rounded shadow" method="POST" action="{{ route('login') }}">
    @csrf
    {{-- <div class="text-center">
        <img class="mb-4" src="{{asset('logo.png')}}" alt="" width="100" height="100">
    </div> --}}

    @error('email')
        <div class="alert alert-danger" role="alert">
            بيانات الدخول غير صحيحة ، فضلاً حاول مرة أٌخرى
          </div>
    @enderror




    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="{{ __('البريد الإلكتروني') }}" autofocus>

    <br>

    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('كلمة المرور') }}">

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        تذكرني
        </label>
    </div>
    <button class="btn btn-primary btn-block bg-info" type="submit">تسجيل الدخول</button>

    <p class="text-center my-2">
        <a class="btn btn-link text-dark" href="{{ route('password.request') }}">
            هل نسيت كلمة المرور ؟
        </a>
    </p>

    <a class="btn btn-secondary btn-block border" href="{{ route('register') }}">
        إنشاء حساب جديد
    </a>

    {{-- <br>
    <p class="text-center my-2">
        <a class="btn btn-link text-dark" href="./">
            رجوع
        </a>
    </p> --}}

</form>


@endsection
