@extends('layouts.admin')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            <a class="close" data-dismiss="alert" href="#">×</a>
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="pl-4 mb-4 mt-5">
        <h2>List User</h2>
        <label for="search">Search Email</label>
        <div class="form-group d-flex flex-wrap">
            <input type="text" name="search" id="search" class="form-control input-lg col-4"
                   value="{{ isset($search) ? $search : '' }}"
                   placeholder="Seach email">
            <button class="btn btn-primary ml-5" onclick="searchUser(this)">Search</button>
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
                    <th>Name</th>
                    <th>Mail</th>
                    <th>Coin</th>
                    <th>Verified</th>
                    <th>Permission</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <!--Table head-->
                <!--Table body-->
                <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-danger">{{ $user->total_coin }}$</td>
                        <td> @if($user->email_verified_at) <span class="text-success">Verify</span>
                            @else <span class="text-danger">Not Verify</span>@endif
                        </td>
                        <td> @if($user->level == 1) <span >Admin</span>
                            @else <span>Customer</span>@endif
                        </td>
                        <td>@if($user->status == 0) <span class="text-success">Active</span>
                            @else <span class="text-danger">Disabled</span>@endif
                        <td> <a class="btn btn-outline-danger" href="{{ route('admin.edit_account',['id' => $user->id]) }}"><i class="fas fa-edit"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
                <!--Table body-->
            </table>
            <!--Table-->
        </div>
    </div>
@endsection
