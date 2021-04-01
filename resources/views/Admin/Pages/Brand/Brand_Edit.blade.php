@extends('Admin.Header')
@section('content')

<div class="bg-white p-2 rounded shadow-sm">

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('brand.index') }}">الماركة</a></li>
        <li class="breadcrumb-item active" aria-current="page">تعديل ماركة</li>
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




    <form method="POST" action="{{ route('brand.update',$db->id)}}" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-1 col-form-label">أسم الماركة</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" name="name" required placeholder="اسم الماركة" value="{{$db->name}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-1 col-form-label">الصورة</label>
            <div class="col-sm-11">
                <input type="file" class="form-control-file" name="imageFile" placeholder="تحميل الصورة">
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-1 col-form-label">الحالة :</label>
            <div class="col-sm-11">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_active" value="1" {{ ($db->is_active =="1")? "checked" : "" }}>
                    <label class="form-check-label" for="inlineRadio1">تفعيل</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_active" value="0" {{ ($db->is_active =="0")? "checked" : "" }}>
                    <label class="form-check-label" for="inlineRadio2">تعطيل</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-1 col-form-label">عرض الصورة</label>
            <div class="col-sm-11">
            <img src="{{asset('uploads/'.$db->image)}}" width="100" height="100" class="shadow-sm">            </div>
        </div>
        <div class="text-center mt-3">
            <button class="btn btn-success" type="submit">تعديل</button>
            <a class="btn btn-danger text-white" role="button" onclick="window.history.back()">الغاء</a>
        </div>

      </form>

</div>


@endsection
