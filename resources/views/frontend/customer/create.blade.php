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
                    <div class="register-form">
                        <div class="row">
                            <div class="col-md-6">
                                {!!  Form::open(['route' =>'frontend.customer.store','method'=>'post']) !!}
                                <label>First Name</label>
                                <input class="form-control" type="text" name="fname" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <label>Last Name"</label>
                                <input class="form-control" type="text" name="lname" placeholder="Last Name">
                            </div>
                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input class="form-control" name="email" type="text" placeholder="E-mail">
                            </div>
                            <div class="col-md-6">
                                <label>Mobile No</label>
                                <input class="form-control" name="mobile_number" type="text" placeholder="Mobile No">
                            </div>
                            <div class="col-md-6">
                                <label>Password</label>
                                <input class="form-control" name="password" type="password" placeholder="Password">
                            </div>
                            <div class="col-md-6">
                                <label>Retype Password</label>
                                <input class="form-control" type="password" name="cname" placeholder="Password">
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
