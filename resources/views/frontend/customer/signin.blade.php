@extends('frontend.layout.master')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active">Login & Register</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Login Start -->
    <div class="login">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">

                    <div class="login-form">
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{Session::get('success')}}</p>
                        @endif
                        @if(Session::has('error'))
                            <p class="alert alert-danger">{{Session::get('error')}}</p>
                        @endif
                        <div class="row">

                            <div class="col-md-6">
                                {!!  Form::open(['route' => 'customer.login','method'=>'post','files'=>'true','required']) !!}

                                <label>E-mail / Username</label>
                                <input class="form-control" type="text" name="email" id="email" placeholder="E-mail">
                                @error('email')
                                <p class="text text-danger"> {{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                                @error('password')
                                <p class="text text-danger"> {{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="newaccount">
                                    <label class="custom-control-label" for="newaccount">Keep me signed in</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                {!!  Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->
@endsection
