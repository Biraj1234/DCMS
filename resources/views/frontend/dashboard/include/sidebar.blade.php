<div class="col-md-3">
    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
        <a class="nav-link" id="dashboard-nav"  href="{{route('customer.home')}}" role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
        <a class="nav-link" id="orders-nav"  href="{{route('dashboard.bookings')}}" role="tab"><i class="fa fa-shopping-bag"></i>My Bookings</a>
        <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
        <a class="nav-link" href="{{route('customer.logout')}}"><i class="fa fa-sign-out-alt"></i>Logout</a>
    </div>
</div>
