@extends('layouts.accout')
@section('content')
    <div class="container">
        <div class="jumbotron text-center full-screen ">
            <h1 class="display-3">Success! <img src="{{ asset('images/3dDoge.gif') }}"></h1>
            <p class="lead">The money will be transferred to your account in a few minutes </p>
            <hr>
            <p class="lead">
                <a class="btn btn-primary btn-sm" href="{{ route('user.wallet') }}" role="button">Go back</a>
            </p>
        </div>
    </div>
@endsection
