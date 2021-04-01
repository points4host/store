@extends('Admin.Header')
@section('content')

<div class="bg-white p-2 rounded shadow-sm">

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permission.index') }}">الصلاحيات</a></li>
        <li class="breadcrumb-item active" aria-current="page">تعديل</li>
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




    <form method="POST" action="{{ route('permission.update')}}">
        @csrf

        <input type="text" hidden class="form-control" name="id" value="{{$id}}">



        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">أسم المجموعة</label>
            <div class="col-sm-10">
            <input type="text" class="form-control @error('display_name') is-invalid @enderror" name="display_name" value="{{$role->display_name}}" required placeholder="اسم المجموعة">
            @error('display_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">الوصف :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="description" value="{{$role->description}}" placeholder="الوصف">
            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">الحالة :</label>
            <div class="col-sm-10">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_active" value="1" {{ ($role->is_active =="1")? "checked" : "" }}>
                    <label class="form-check-label" for="inlineRadio1">تفعيل</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_active" value="0" {{ ($role->is_active =="0")? "checked" : "" }}>
                    <label class="form-check-label" for="inlineRadio2">تعطيل</label>
                </div>
            </div>
        </div>

        <h5 class="mb-4"><p class="my-3 p-2 bg-light border rounded">الصلاحية الاساسية :</p></h5>

        <br>

        <div class="form-group form-check">
            <div class="form-check form-check-inline  mr-5">
                <input class="form-check-input" type="radio" name="basic_validity" value="administrator" {{ (in_array("administrator", $permission))? "checked" : "" }}>
                <label class="form-check-label">ادارة لوحة التحكم بالكامل</label>
            </div>
            <div class="form-check form-check-inline mr-5">
                <input class="form-check-input" type="radio" name="basic_validity" value="admin" {{ (in_array("admin", $permission))? "checked" : "" }}>
                <label class="form-check-label">مشرف عام</label>
            </div>
            <div class="form-check form-check-inline mr-5">
                <input class="form-check-input" type="radio" name="basic_validity" value="member" {{ (in_array("member", $permission))? "checked" : "" }}>
                <label class="form-check-label">عضو بدون صلاحيات</label>
            </div>
        </div>

        

        @include('Admin.Pages.Permission.Permission_Form_Add_Edite')


        <div class="text-center mt-3">
            <button class="btn btn-success" type="submit">تعديل</button>
        
            <a class="btn btn-danger text-white" role="button" onclick="window.history.back()">الغاء</a>
        </div>
    </form>
      

</div>

@endsection
