@extends('layouts.admin')
@section('content')
    <div class="alert alert-success" id="success-alert">
        <strong>Success! </strong> Change status order success.
    </div>
    <div class="card mb-4 mt-5">
        <h2>List Order</h2>
        <div class="card-body">
            <label for="name">Seach</label>
            {{ Form::select('search', [4=>'All',0=>'Wait for admin confirm',1=>'Doing and shipping',2=>'Done',3=>'Cancel'],isset($search) ? $search : 4, ['class' => 'form-control','data-token'=> csrf_token() ,'onchange'=>"searchOrder(this)"]) }}
        </div>
    </div>
    <div class="card mb-4 mt-5">
        <div class="card-body">
            <!--Table-->
            <table class="table table-hover">
                <!--Table head-->
                <thead class="mdb-color darken-3">
                <tr class="">
                    <th>#</th>
                    <th>Order</th>
                    <th>Customer</th>
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
                        <td>{{ $order->users->name }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td><span> @switch($order->payment_type)
                                    @case(1)
                                    Cash On Delivery
                                    @break
                                    @case(2)
                                    Wallet
                                    @break
                                @endswitch</span></td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->total }}</td>
                        <td>@if($order->status == 2)
                                <span class="text-success">Done
                        </span>
                            @elseif($order->status == 3)
                                <span class="text-danger">Cancel
                        </span>
                            @else
                                {{ Form::select('status', [0=>'Wait for admin confirm',1=>'Doing and shipping',2=>'Done',3=>'Cancel'],$order->status, ['class' => 'form-control','data-token'=> csrf_token() ,'onchange'=>"changeStatusOrder(this,$order->id)"]) }}
                            @endif
                            {{--                            @switch($order->status)--}}
                            {{--                                @case(0)--}}
                            {{--                                <span class="text-warning">Wait for admin confirm </span>--}}
                            {{--                                @break--}}
                            {{--                                @case(1)--}}
                            {{--                                <span class="text-info"> Doing and shipping </span>--}}
                            {{--                                @break--}}
                            {{--                                @case(2)--}}
                            {{--                                <span class="text-success">Done </span>--}}
                            {{--                                @break--}}
                            {{--                                @case(3)--}}
                            {{--                                <span class="text-danger">Cancel </span>--}}
                            {{--                                @break--}}
                            {{--                            @endswitch--}}

                        </td>
                        <td><a class="btn btn-outline-danger"
                               href="{{ route('admin.detailOrder',['id' => $order->id]) }}"><i
                                    class="fas fa-eye"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
                <!--Table body-->
            </table>
            <!--Table-->
        </div>
    </div>
@endsection
