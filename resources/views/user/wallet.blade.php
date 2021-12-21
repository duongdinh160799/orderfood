@extends('layouts.accout')
@section('content')
    <div class="container">
        <div class="text-box order-choose ">
            <div class="row text-left" id="order">
                <div class="col-12">
                    <div class="card border-0 m-auto">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="money">
                                    <p><span class="text-dark">Money : </span> {{ $total_coin }}$ </p>
                                </div>
                                <div class="ml-auto align-self-center">
                                    <btn class="btn btn-outline-warning" data-toggle="modal" data-target="#form-recharge">Recharge</btn>
                                    <btn class="btn btn-outline-warning" data-toggle="modal" data-target="#form-withdrawal">Withdrawal</btn>
                                </div>
                            </div>
                        </div>
                        <div id="exTab1">
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a class="btn btn-outline-primary active" href="#1a" data-toggle="tab">Order</a>
                                </li>
                                <li><a class="btn btn-outline-primary" href="#2a" data-toggle="tab">Recharge</a>
                                </li>
                                <li><a class="btn btn-outline-primary" href="#3a" data-toggle="tab">Withdrawal</a>
                                </li>
                            </ul>

                            <div class="tab-content clearfix">
                                <div class="tab-pane active" id="1a">
                                    <div class="card-body p-4 row">
                                        <!--Table-->
                                        <table class="table table-hover text-dark">
                                            <!--Table head-->
                                            <thead class="mdb-color darken-3">
                                            <tr class="">
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Coin</th>
                                            </tr>
                                            </thead>
                                            <!--Table head-->
                                            <!--Table body-->
                                            <tbody>
                                            @foreach($order_coins as $key=>$order_coin)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>
                                                        <a href="{{ route('user.detailOrder',['id' => $order_coin->object_id]) }}">{{ $order_coin->order->code }}</a>
                                                    </td>
                                                    <td>{{ $order_coin->created_at }}</td>
                                                    <td>
                                                        @switch( $order_coin->order->status )
                                                            @case(0)
                                                            <span class="text-warning">Yet to be delivered</span></td>
                                                    @break
                                                    @case(1)
                                                    <span class="text-info">Shipping</span></td>
                                                    @break
                                                    @case(2)
                                                    <span class="text-success">Done</span></td>
                                                    @
                                                    @case(3)
                                                    <span class="text-danger">Cancel</span></td>
                                                    @break
                                                    @endswitch
                                                    <span class="text-success">
                                                            </span></td>
                                                    <td>{{ $order_coin->coin }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <!--Table body-->
                                        </table>
                                        <!--Table-->

                                    </div>
                                </div>
                                <div class="tab-pane" id="2a">
                                    <div class="card-body p-4 row">
                                        <!--Table-->
                                        <table class="table table-hover text-dark">
                                            <!--Table head-->
                                            <thead class="mdb-color darken-3">
                                            <tr class="">
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Code</th>
                                                <th>Status</th>
                                                <th>Coin</th>
                                            </tr>
                                            </thead>
                                            <!--Table head-->
                                            <!--Table body-->
                                            <tbody>
                                            @foreach($recharge_coins as $key=>$recharge_coin)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $recharge_coin->created_at }}</td>
                                                    <td>{{ $recharge_coin->code }}</td>
                                                    <td>
                                                        @switch($recharge_coin->status)
                                                            @case(1)
                                                                <span class="text-warning">Pending</span></td>
                                                            @break
                                                            @case(2)
                                                                <span class="text-success">Done</span></td>
                                                            @break
                                                            @case(3)
                                                                <span class="text-danger">Cancer</span></td>
                                                            @break
                                                    @endswitch

                                                    <td>{{ $recharge_coin->coin }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <!--Table body-->
                                        </table>
                                        <!--Table-->

                                    </div>
                                </div>
                                <div class="tab-pane" id="3a">
                                    <div class="card-body p-4 row">
                                        <!--Table-->
                                        <table class="table table-hover text-dark">
                                            <!--Table head-->
                                            <thead class="mdb-color darken-3">
                                            <tr class="">
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Account Name</th>
                                                <th>Account Number</th>
                                                <th>Bank Name</th>
                                                <th>Status</th>
                                                <th>Coin</th>
                                            </tr>
                                            </thead>
                                            <!--Table head-->
                                            <!--Table body-->
                                            <tbody>
                                            @foreach($withdraw_coins as $key=>$withdraw_coin)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $withdraw_coin->created_at }}</td>
                                                    <td>{{ $withdraw_coin->account_name }}</td>
                                                    <td>{{ $withdraw_coin->account_number }}</td>
                                                    <td>{{ $withdraw_coin->bank_name }}</td>
                                                    <td>
                                                        @switch($withdraw_coin->status)
                                                            @case(1)
                                                            <span class="text-warning">Pending</span></td>
                                                    @break
                                                    @case(2)
                                                    <span class="text-success">Done</span></td>
                                                    @break
                                                    @case(3)
                                                    <span class="text-danger">Cancer</span></td>
                                                    @break
                                                    @endswitch

                                                    <td>{{ $withdraw_coin->coin }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <!--Table body-->
                                        </table>
                                        <!--Table-->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('user.recharge')}}"  method="post">
            @csrf
            <div class="modal fade" id="form-recharge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">Recharge</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            <div class="form-group">
                                <label for="money_recharge">Money</label>
                                <input type="number" class="form-control" name="money_recharge" min="0" required id="money_recharge" placeholder="Enter money recharge">

                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form action="{{ route('user.withdrawal')}}"  method="post">
            @csrf
            <div class="modal fade" id="form-withdrawal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">Withdrawal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="money_withdrawal">Money</label>
                                        <input type="number" class="form-control" min="0" name="money_withdrawal" required id="money_withdrawal" placeholder="Enter money withdrawal">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name_account">Name Account</label>
                                        <input type="text" name="name_account" id="name_account" class="form-control input-lg" placeholder="Name account"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="number_account">Number Account</label>
                                        <input type="text" name="number_account" id="number_account" class="form-control input-lg"
                                               placeholder="Number Account" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="bank_name">Bank Name</label>
                                        <input type="text" name="bank_name" id="bank_name" class="form-control input-lg" placeholder="Bank name"
                                               required>
                                    </div>
                                </div>
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
@endsection
