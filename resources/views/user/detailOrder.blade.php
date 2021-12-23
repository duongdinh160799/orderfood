@extends('layouts.accout')
@section('content')
    <div class="text-box order-choose ">
        <div class="row text-left" id="order">
            <div class="col-12" >
                <div class="card border-0 m-auto">
                    <div class="card-header">
                        Order #<strong>{{ $order->code }}</strong>
                    </div>
                    <div class="card-body p-4 row">
                        <label class="col-2">Date</label><span class="col-10">{{ $order->created_at }}</span>
                        <label class="col-2">Status</label><span class="col-10">
                                                        @switch($order->status)
                                @case(0)
                                <span class="text-warning">Wait for admin confirm </span>
                                @break
                                @case(1)
                                <span class="text-info"> Doing and shipping </span>
                                @break
                                @case(2)
                                <span class="text-success">Done </span>
                                @break
                                @case(3)
                                <span class="text-danger">Cancel </span>
                                @break
                            @endswitch
                        </span>
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
                        <label class="col-2">Phone number</label><span class="col-10">{{ $order->phone }}</span>
                    </div>
                    <div class="abcd">
                        <table class="table table-image">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->order_details as $item)
                            <tr>
                                <td class="image-thumb">
                                    <img src="{{ $item->items->image }}"  alt="" width="100px" height="100px">
                                </td>
                                <td>{{ $item->items->name }}</td>
                                <td class="qty">{{ $item->quantity }}</td>
                                <td>{{ $item->items->price }}</td>
                                <td>{{ $item->items->price*$item->quantity }}</td>
                            </tr>
                            @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><h3>Total:</h3></td>
                                    <td><h3> {{ $order->total }}</h3></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
        <div class="p-4 m-4">
            <a class="btn btn-outline-danger" href="{{ route('user.listOrder') }}">Back</a>
        </div>
    </div>
@endsection
