@extends('layouts.accout')
@section('content')
    @if(session()->has('error'))
        <div class="alert alert-danger">
            <a class="close" data-dismiss="alert" href="#">×</a>
            {{ session()->get('error') }}
        </div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success">
            <a class="close" data-dismiss="alert" href="#">×</a>
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="container">
        <form id="form-change-profile" role="form" method="POST" action="{{ route('user.editProfile') }}" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h2>Profile</h2>
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Name" value="{{ $user->name }}"
                              required tabindex="1">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-4">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" id="number" class="form-control input-lg" value="{{ $user->phone }}"
                               placeholder="Phone Number" required tabindex="2">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control input-lg " disabled value="{{ $user->email }}"
                               placeholder="Email Address"  tabindex="3">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-4">
                    <label for="birthday">Birthday</label>
                        <div class="form-group">
                            <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                            <input class="form-control input-lg" type="text" name="birthday" required value="{{ $user->birthday? date_create_from_format("Y-m-d", $user->birthday)->format("d-m-Y") : ''}}"/>
                            <span class="input-group-addon"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="email">ID Number</label>
                        <input type="number" name="id_number" id="id_number" class="form-control input-lg" required placeholder="Your ID number" value="{{ $user->id_number }}"
                               tabindex="5">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-4">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        {{ Form::select('gender', [1=>'Male',2=>'Female',3=>'Others'],$user->gender, ['class' => 'form-control ','placeholder' => 'Choose Gender']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-8">
                    <label for="address">Address</label>
                    <input type="Text" name="address" id="address" class="form-control input-lg" placeholder="Address" value="{{ $user->address }}"
                           tabindex="6">
                </div>
            </div>


            <hr class="colorgraph">
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-6">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </form>
{{--        //change password--}}
        <form id="form-change-password" role="form" method="POST" action="{{ route('user.changePassword') }}"  class="form-horizontal">
            <h2 class="pt-5">Change Password</h2>
            <hr>
            <div class="col-md-9">
                <label for="current-password" class="col-sm-4 control-label">Current Password</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="password" class="form-control @error('current-password')  is-invalid @enderror" id="current-password" name="current-password" placeholder="Password" required>
                        @error('current-password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <label for="password" class="col-sm-4 control-label">New Password</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"  id="password" name="password" placeholder="Password" required>
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <label for="password_confirmation" class="col-sm-4 control-label">Re-enter Password</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password" required>
                        @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-6">
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
