@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>{{ auth()->user()->name }}</td>
                            <td>{{ auth()->user()->email }}</td>
                            <td>{{ auth()->user() }}</td>
                            {{-- <td>{{ auth()->user()->profile->phone }}</td> --}}
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <hr>
                    <h3>Profiles</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($profiles as $p)
                            <tr>
                            <td>{{ $p->user->name }}</td>
                            <td>{{ $p->user->email }}</td>
                            <td>{{ $p->phone }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
