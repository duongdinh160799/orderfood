@extends('layouts.accout')
@section('content')
        <div class="card mb-4 mt-5">
            <div class="card-body">
                <!--Table-->
                <table class="table table-hover">
                    <!--Table head-->
                    <thead class="mdb-color darken-3">
                    <tr class="">
                        <th>#</th>
                        <th>Order</th>
                        <th>Date</th>
                        <th>Payment</th>
                        <th>Address</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <!--Table head-->
                    <!--Table body-->
                    <tbody>
                    @foreach($listOrders as $key => $order)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>#{{ $order->code }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td> @switch($order->payment_type)
                                @case(1)
                                Cash On Delivery
                                @break
                                @case(2)
                                Wallet
                                @break
                                @endswitch</span></td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->total }}</td>
                        <td>
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
                        </td>
                        <td> <a class="btn btn-outline-danger" href="{{ route('user.detailOrder',['id' => $order->id]) }}"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                    <!--Table body-->
                </table>
                <!--Table-->
            </div>
        </div>
@endsection
