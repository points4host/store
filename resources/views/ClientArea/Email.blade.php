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

            <form method="POST" action="">
                @csrf

                <h5>البريد الإلكتروني</h5>
                <hr class="featurette-divider">

                <div class="form-row">
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">البريد الإلكتروني :</label>
                    <div class="col-sm-8">
                      <input type="text" readonly class="form-control" name="email" value="{{auth()->user()->email}}" placeholder="البريد الإلكتروني">
                    </div>
                  </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
