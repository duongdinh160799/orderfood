<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bistro</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('account/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('account/css/custom/custom.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/intro/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/intro/loader.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @routes
</head>

<body>

<!--Loader-->
<div id="wrapper">

    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <h2>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h2>
        </div>
        <ul class="sidebar-nav">
            <li class="{{ $page_title == 'food_menu' ? 'active' : '' }}">
                <a href="{{ route('user.index') }}"><i class="fa fa-bars"></i>Food Menu</a>
            </li>
            <li class="{{ $page_title == 'order' ? 'active' : '' }}">
                <a href="{{ route('user.listOrder') }}"><i class="fa fa-calendar-alt"></i>Order</a>
            </li>
            <li class="{{ $page_title == 'wallet' ? 'active' : '' }}">
                <a href="{{ route('user.wallet') }}"><i class="fa fa-wallet"></i>Wallet</a>
            </li>
            <li class="sub-menu {{ $page_title == 'profile' ? 'active' : '' }}">
                <a href="#"><i class="fa fa-user"></i>Users<div class='fa fa-caret-down right'></div></a>
                <ul>
                    <li class="{{ $page_title == 'profile' ? 'active' : '' }}"><a href='{{ route('user.profile') }}'>Profile</a></li>
                    <li><a href='{{ asset('logout') }}'>Logout</a></li>
                </ul>
            </li>
        </ul>
    </aside>

    <div id="navbar-wrapper">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand" id="sidebar-toggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </nav>
    </div>

    @yield('content')

</div>

<a href="#" id="back-top"><i class="fa fa-angle-up fa-2x"></i></a>

{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
<script src="{{ asset('js/jquery-2.2.3.js') }}" type="text/javascript"></script>
<script src="{{ asset('account/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('js/backend.js') }}" type="text/javascript"></script>
@yield('scripts')


</body>
</html>
