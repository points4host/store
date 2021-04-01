@extends('Web.Header')

@section('auth')

<div class="container my-5">
    <div class="row featurette">
      <div class="col-md-2 text-center">
        @include('ClientArea.Nav_Link')
      </div>


        <div class="col-md-10">
            @if (session('masg'))
                <div class = "alert alert-success">
                    {{session('masg')}}
                </div>
            @endif

            @if ($errors->any())
                <div class = "alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('clientarea.updateprofile') }}">
                @csrf

                <h5>الملف الشخصي</h5>
                <hr class="featurette-divider">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>الاسم الاول</label>
                    <input type="text" class="form-control" name="first_name" value="{{$profile->first_name}}" placeholder="الاسم الاول">
                    </div>
                    <div class="form-group col-md-6">
                        <label>الاسم الاخير</label>
                        <input type="text" class="form-control" name="last_name" value="{{$profile->last_name}}" placeholder="الاسم الاخير">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>الهاتف</label>
                    <input type="number" class="form-control" name="phone" value="{{$profile->phone}}" placeholder="الهاتف">
                    </div>
                    <div class="form-group col-md-6">

                    </div>
                </div>

                <div class="row featurette">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>الجنس : </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" value="0" {{ ($profile->sex=="0")? "checked" : "" }}>
                                <label class="form-check-label" for="inlineRadio1">ذكر</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" value="1" {{ ($profile->sex=="1")? "checked" : "" }}>
                                <label class="form-check-label" for="inlineRadio2">انثى</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">

                    </div>
                </div>
                <button class="btn btn-primary bg-info" type="submit">تحديث البيانات</button>
            </form>
        </div>
    </div>
</div>
@endsection
