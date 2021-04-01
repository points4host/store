@extends('Admin.Header')
@section('content')

<div class="bg-white p-2 rounded shadow-sm">

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permission.index') }}">الصلاحيات</a></li>
        <li class="breadcrumb-item active" aria-current="page">إضافة صلاحية جديدة</li>
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




    <form method="POST" action="{{ route('permission.create')}}">
        @csrf

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">أسم المجموعة</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="display_name" required placeholder="اسم المجموعة">
            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">الوصف :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="description" placeholder="الوصف">
            </div>
        </div>


        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">الحالة :</label>
            <div class="col-sm-10">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_active" value="1" checked>
                    <label class="form-check-label" for="inlineRadio1">تفعيل</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_active" value="0">
                    <label class="form-check-label" for="inlineRadio2">تعطيل</label>
                </div>
            </div>
        </div>


        <h5 class="mb-4"><p class="my-3 p-2 bg-light border rounded">الصلاحية الاساسية :</p></h5>

        <div class="form-group form-check">
            <div class="form-check form-check-inline  mr-5">
                <input class="form-check-input" type="radio" name="basic_validity" value="administrator" checked>
                <label class="form-check-label">ادارة لوحة التحكم بالكامل</label>
            </div>
            <div class="form-check form-check-inline mr-5">
                <input class="form-check-input" type="radio" name="basic_validity" value="admin">
                <label class="form-check-label">مشرف عام</label>
            </div>
            <div class="form-check form-check-inline mr-5">
                <input class="form-check-input" type="radio" name="basic_validity" value="member">
                <label class="form-check-label">عضو بدون صلاحيات</label>
            </div>
        </div>


        @include('Admin.Pages.Permission.Permission_Form_Add_Edite')

        
        <div class="text-center mt-3">
            <button class="btn btn-success" type="submit">إضافة</button>
        </div>

      </form>

</div>

@endsection
