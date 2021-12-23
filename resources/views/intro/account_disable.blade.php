@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Your Account is disable by admin') }}</div>

                    <div class="card-body">
                        {{ __('Please contact us via email to unlock your account') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
