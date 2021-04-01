@extends('Admin.Header')
@section('content')

<div class="bg-white p-2 rounded shadow-sm">

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">الحسابات</a></li>
        <li class="breadcrumb-item active" aria-current="page">إضافة حساب جديد</li>
    </ol>

</div>

<br>

<div class="bg-white p-4 rounded shadow-sm">


        @if($errors->any())
            <ul class="alert alert-danger" style="list-style-type: none">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif




    <form method="POST" action="{{ route('user.store')}}">
        @csrf
        <h4 class="mb-4" ><span class="badge badge-secondary font-weight-normal">معلومات الدخول</span></h4>

        <div class="form-row">
            <div class="form-group col-md-4">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="اسم المستخدم">
              @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group col-md-4">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="البريد الإلكتروني">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="كلمة المرور">
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

        <h4 class="mb-4"><span class="badge badge-secondary font-weight-normal">البيانات الشخصية</span></h4>

        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="first_name" placeholder="الاسم الاول">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="last_name" placeholder="الاسم الاخير">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="phone" placeholder="الهاتف">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-7">
              <label for="inputPassword4">الجنس : </label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" value="0" checked>
                <label class="form-check-label" for="inlineRadio1">ذكر</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" value="1">
                <label class="form-check-label" for="inlineRadio2">انثى</label>
            </div>
            </div>
        </div>

        <h4 class="mb-4"><span class="badge badge-secondary font-weight-normal">العنوان</span></h4>


        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="country" placeholder="الدولة">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="city" placeholder="المدينة">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="taital" placeholder="العنوان">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="zip_code" placeholder="الرمز البريدي">
            </div>
            <div class="form-group col-md-4">

            </div>
            <div class="form-group col-md-4">

            </div>
        </div>

        <h4 class="mb-4"><span class="badge badge-secondary font-weight-normal">الصلاحيات</span></h4>


        <div class="form-row">
            <div class="form-group col-md-4">
                <select class="form-control" name="role_id">
                    @foreach ($role as $item)
                        <option value="{{$item->id}}">{{$item->display_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">

            </div>
            <div class="form-group col-md-4">

            </div>
        </div>


        <div class="text-center mt-3">
            <button class="btn btn-success" type="submit">تعديل</button>
            <a class="btn btn-danger text-white" role="button" onclick="window.history.back()">الغاء</a>
        </div>

      </form>

</div>

@endsection
