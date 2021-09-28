@extends('frontend.dashboard.layout.master')

@section('dashboard-content')
    <div class="col-md-9">
        @if(Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
        @endif
        @if(Session::has('error'))
            <p class="alert alert-danger">{{Session::get('error')}}</p>
        @endif

        <div class="tab-content">
            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                <h4>Dashboard</h4>
                <p>
                    Welcome {{Auth::guard('customer')->user()->fname}}!!
                </p>
            </div>

            <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                <h4>Payment Method</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque.
                </p>
            </div>
            <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                <h4>Account Details</h4>
                <div class="row">
                    <div class="col-md-6">
                        <input class="form-control" type="text" placeholder="First Name">
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" placeholder="Last Name">
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" placeholder="Mobile">
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" placeholder="Email">
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" type="text" placeholder="Address">
                    </div>
                    <div class="col-md-12">
                        <button class="btn">Update Account</button>
                        <br><br>
                    </div>
                </div>
                <h4>Password change</h4>
                <div class="row">
                    <div class="col-md-12">
                        <input class="form-control" type="password" placeholder="Current Password">
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" placeholder="New Password">
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" placeholder="Confirm Password">
                    </div>
                    <div class="col-md-12">
                        <button class="btn">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
