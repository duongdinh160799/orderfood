@extends('layouts.admin')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            <a class="close" data-dismiss="alert" href="#">×</a>
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="alert alert-success" id="success-alert">
        <strong>Success! </strong> Change status Wallet success.
    </div>
    <div class="pl-4 mb-4 mt-5">
        <h2>List Withdrawal</h2>
        {{--        <div class="card-body">--}}
        {{--            <label for="name">Seach</label>--}}
        {{--            {{ Form::select('search', [4=>'All',0=>'Wait for admin confirm',1=>'Doing and shipping',2=>'Done',3=>'Cancel'],isset($search) ? $search : 4, ['class' => 'form-control','data-token'=> csrf_token() ,'onchange'=>"searchOrder(this)"]) }}--}}
        {{--        </div>--}}
    </div>
    <div class="card mb-4 mt-5">
        <div class="card-body">
            <!--Table-->
            <table class="table table-hover">
                <!--Table head-->
                <thead class="mdb-color darken-3">
                <tr class="">
                    <th>#</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Account Name</th>
                    <th>Account Number</th>
                    <th>Bank Name</th>
                    <th>Coin</th>
                    <th>Status</th>
                </tr>
                </thead>
                <!--Table head-->
                <!--Table body-->
                <tbody>
                @foreach($listWithDraws as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->users->name }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>{{ $item->account_name }}</td>
                        <td>{{ $item->account_number }}</td>
                        <td>{{ $item->bank_name }}</td>
                        <td>{{ $item->coin }}</td>
                        <td>@if($item->status == 2)
                                <span class="text-success">Done
                        </span>
                            @elseif($item->status == 3)
                                <span class="text-danger">Cancel
                        </span>
                            @else
                                {{ Form::select('status', [1=>'Wait for admin confirm',2=>'Done',3=>'Cancel'],$item->status, ['class' => 'form-control','data-token'=> csrf_token() ,'onchange'=>"changeStatusWithdrawal(this,$item->id)"]) }}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <!--Table body-->
            </table>
            <!--Table-->
        </div>
    </div>
@endsection
