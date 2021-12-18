@extends('layouts.accout')
@section('content')
    @foreach($listOrders as $order)
        <div class="text-box order-choose ">
            <div class="row text-left" id="order">
                <div class="col-12" >
                    <div class="card border-0 m-auto">
                        <div class="card-header">
                            Order #123123123
                        </div>
                        <div class="card-body p-4 row">
                            <label class="col-2">Date</label><span class="col-10">{{ $order->created_at }}</span>
                            <label class="col-2">Status</label><span class="col-10">Done</span>
                            <label class="col-2">Total</label><span class="col-10">{{ $order->total }}</span>
                            <label class="col-2">Paymen</label><span class="col-10">
                                @switch($order->payment_type)
                                    @case(1)
                                    Cash On Delivery
                                    @break
                                    @case(2)
                                    Wallet
                                    @break
                                @endswitch</span>
                            <label class="col-2">Address</label><span class="col-10">{{ $order->address }}</span>
                            <label class="col-2">Phone number</label><span class="col-10">123123123123</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 m-4">
                <a class="btn btn-outline-danger" href="{{ route('user.detailOrder',['id' => $order->id]) }}">Detail</a>
            </div>
        </div>
    @endforeach

@endsection
