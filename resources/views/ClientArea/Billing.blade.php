@extends('Web.Header')

@section('auth')

<div class="container my-5">
    <div class="row featurette">
        <div class="col-md-2 text-center">
            @include('ClientArea.Nav_Link')
        </div>
        <div class="col-md-10 border py-3 rounded">

            <h5>الفواتير</h5>

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>

        </div>
    </div>
</div>
@endsection
