@extends('Web.Header')

@section('auth')



<form class="form-signin my-5" method="POST" action="{{ route('register') }}">
    @csrf
    {{-- <div class="text-center">
        <img class="mb-4" src="{{asset('logo.png')}}" alt="" width="100" height="100">
    </div> --}}


@if ($errors)
<span class="invalid-feedback" role="alert">
    <strong>{{ $errors->name }}</strong>
</span>
@endif



    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ __('اسم المستخدم') }}" autofocus>

    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <br>






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
        
    <button class="btn btn-primary btn-block bg-info" type="submit">تسجيل</button>

</form>


@endsection
