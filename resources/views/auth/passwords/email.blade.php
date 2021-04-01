@extends('Web.Header')

{{-- @section('auth')
<div class="form-width-resisx">


<div class="card">
    <div class="card-header">إعادة تعيين كلمة المرور</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form class="form-signin my-5" method="POST" action="{{ route('password.email') }}" style="border: none">

    @csrf

    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="{{ __('البريد الإلكتروني') }}" autofocus>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror                

        <br>
    <button class="btn btn-primary btn-block bg-info" type="submit">إرسال كلمة المرور</button>



    {{-- <br>
    <p class="text-center my-2">
        <a class="btn btn-link text-dark" href="./">
            رجوع
        </a>
    </p> --}}
{{-- </form>
</div>
</div>

</div>

@endsection  --}}





{{-- @extends('layouts.app')
 --}}
@section('auth')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card rounded shadow">
                <div class="card-header border-0" style="background: #fff00">إعادة تعيين كلمة المرور</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="{{ __('البريد الإلكتروني') }}" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                                <br>
                        <button class="btn btn-primary btn-block bg-info" type="submit">إرسال كلمة المرور</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
