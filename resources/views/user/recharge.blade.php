@extends('layouts.accout')
@section('content')
    <div class="container">
        <div class="jumbotron text-center full-screen ">
            <h1 class="display-3">Success! <img src="{{ asset('images/3dDoge.gif') }}"></h1>
            <p class="lead">You need to transfer the money to the account below with the content:
                <strong class="text-danger">{{ $recharge_coin->code }}</strong> and the admin will confirm it after you have successfully transferred.</p>
            <h4> STK: 19033243180011 </h4>
            <h4> Techcombank </h4>
            <h4> Chủ tài khoản : DINH QUY DUONG</h4>
            <hr>
            <p class="lead">
                <a class="btn btn-primary btn-sm" href="{{ route('user.wallet') }}" role="button">Go back</a>
            </p>
        </div>
    </div>
@endsection
