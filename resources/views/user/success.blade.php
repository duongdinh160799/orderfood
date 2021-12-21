@extends('layouts.accout')
@section('content')
    <div class="jumbotron text-center full-screen ">
        <h1 class="display-3">Thank You! <img src="{{ asset('images/3dDoge.gif') }}"></h1>
        <p class="lead">We will get back to you in a few minutes!!!!!</p>
        <hr>
        <p class="lead">
            <a class="btn btn-primary btn-sm" href="{{ route('user.listOrder') }}" role="button">Go to order</a>
        </p>
    </div>
@endsection
