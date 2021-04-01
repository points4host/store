@extends('Web.Header')

{{-- @section('auth')


<div class="card">
    <div class="card-header">إعادة تعيين كلمة المرور</div>

    <div class="card-body">

<form class="form-signin my-5" method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <br>

    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('كلمة المرور') }}">

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <br>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('إعادة كتابة كلمة المرور') }}">
                            

        <br>
    <button class="btn btn-primary btn-block bg-info" type="submit">تسجيل الدخول</button>



    {{-- <br>
    <p class="text-center my-2">
        <a class="btn btn-link text-dark" href="./">
            رجوع
        </a>
    </p> --}}

{{-- </form>

</div>
</div>
@endsection --}}





{{-- @extends('layouts.app') --}}

@section('auth')
<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">إعادة تعيين كلمة المرور</div>

                <div class="card-body">

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif


                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">


                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="{{ __('البريد الإلكتروني') }}" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                        <br>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('كلمة المرور') }}">
                    
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                        <br>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('إعادة كتابة كلمة المرور') }}">
                                                
                    
                            <br>
                        <button class="btn btn-primary btn-block bg-info" type="submit">تسجيل الدخول</button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
