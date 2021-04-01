@extends('Admin.Header')
@section('content')

<div class="bg-white p-2 rounded shadow-sm">

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">التصنيفات</a></li>
        <li class="breadcrumb-item active" aria-current="page">إضافة تصنيف جديد</li>
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




    <form method="POST" action="{{ route('category.store')}}">
        @csrf


        <div class="form-group row">
            <label for="staticEmail" class="col-sm-1 col-form-label">أسم التصنيف</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" name="name" required placeholder="اسم التصنيف">
            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-1 col-form-label">الحالة :</label>
            <div class="col-sm-11">
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

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">التصنيف :</label>
            <div class="col-sm-3">
                <select class="form-control" name="sub" style="font-size: small">
                    <option value="0">رئيسي</option>
                    @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        
        <div class="text-center mt-3">
            <button class="btn btn-success" type="submit">إضافة</button>
            <a class="btn btn-danger text-white" role="button" onclick="window.history.back()">الغاء</a>
        </div>

      </form>

</div>



<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function () {
      $('.ckeditor').ckeditor();
  });
</script>


@endsection
