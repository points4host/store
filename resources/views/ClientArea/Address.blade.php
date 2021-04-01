@extends('Web.Header')

@section('auth')

<div class="container my-5">
    <div class="row featurette">
        <div class="col-md-2 text-center">
            @include('ClientArea.Nav_Link')
        </div>


        <div class="col-md-10 border py-3 rounded">
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

            <form method="POST" action="{{ route('clientarea.updateaddress') }}">
                @csrf

                <h5>العنوان</h5>
                <hr class="featurette-divider">

                  <div class="form-group">
                    <label for="staticEmail" class="col-sm-4 col-form-label">الدولة :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="country" value="{{$address->country}}" placeholder="الدولة">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="staticEmail" class="col-sm-4 col-form-label">المدينة :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="city" value="{{$address->city}}" placeholder="المدينة">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="staticEmail" class="col-sm-4 col-form-label">العنوان :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="taital" value="{{$address->taital}}" placeholder="العنوان">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="staticEmail" class="col-sm-4 col-form-label">الرمز البريدي :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="zip_code" value="{{$address->zip_code}}" placeholder="الرمز البريدي">
                    </div>
                  </div>

                  <button class="btn btn-primary bg-info" type="submit">تحديث البيانات</button>

            </form>
        </div>
    </div>
</div>
@endsection
