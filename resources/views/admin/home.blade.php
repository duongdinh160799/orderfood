@extends('layouts.admin')
@section('content')
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
                        <td> @if($user->email_verified_at) <span class="text-success">Verify</span>
                            @else <span class="text-danger">Not Verify</span>@endif
                        </td>
                        <td> @if($user->level == 1) <span >Admin</span>
                            @else <span>Customer</span>@endif
                        </td>
                        <td>@if($user->status == 0) <span class="text-success">Active</span>
                            @else <span class="text-danger">Not Active</span>@endif
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
