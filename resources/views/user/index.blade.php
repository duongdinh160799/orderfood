@extends('layouts.accout')
@section('content')
    <!-- Topic Cards -->
    @if(session()->has('error'))
        <div class="alert alert-danger">
            <a class="close" data-dismiss="alert" href="#">×</a>
            {{ session()->get('error') }}
        </div>
    @endif
    <div id="cards_landscape_wrap-2">
        <div class="container-fluid no-gutters">
            <div class="row">

                <div class="col-8">
                    <h3 class="text-left">Menu</h3>
                    <div class="row">
                        @foreach($listItems as $item)
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                                <a href="#"  onclick="addtocart(this,{{ $item->id }}, {{ $item->price }})">
                                    <div class="card-flyer">
                                        <div class="text-box">
                                            <div class="image-box">
                                                <img src="{{ $item->image }}"
                                                    alt=""/>
                                            </div>
                                            <div class="text-container">
                                                <h6>{{ $item->name }}</h6>
                                                <p class="price">{{ $item->price }}$</p>
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-4">
                    <form action="{{ route('user.order') }}" method="post">
                        @csrf
                    <div class="text-box order-choose ">
                        <div class="row text-left" id="order">
                            <div class="col-12" >
                                <div class="card border-0 m-auto">
                                    <div class="card-header">
                                        Your order
                                    </div>
                                    <div class="card-body p-0" id="cart">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-button">
{{--                            <input class="btn btn-outline-danger" type="submit" value="Order Now">--}}
                            <input class="btn btn-outline-danger" name="openModal" data-toggle="modal" data-target="#form-modal" value="Order Now">
                        </div>
                    </div>

                        <div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <h5 class="modal-title" id="exampleModalLabel">Your shipping address</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                        <div class="modal-body text-left">
                                            <div class="form-group">
                                                <label for="address">Shipping Address</label>
                                                <input type="text" class="form-control" name="address" required id="address" placeholder="Enter shipping address" value="{{ $user->address }}">

                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input type="number" class="form-control" required name="phone" id="phone" value="{{ $user->phone }}" placeholder="Phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="payment">Your Wallet : <span class="text-danger strong mr-3">{{ $total_coin }}$ </span> </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="payment">Payments</label>
                                                {{ Form::select('payment', $payments,0, ['class' => 'form-control ','required','placeholder' => 'Choose Payment']) }}
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Note</label>
                                                <textarea rows="4" class="form-control" name="description" id="description" placeholder="Enter your note"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
