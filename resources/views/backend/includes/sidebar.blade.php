<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('index')}}" target="_blank" class="brand-link">
        <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">DCMS|Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('uploads/'. auth()->user()->profile_picture)}}" class="img-circle elevation-2" alt="User Image">
                           </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->



                <li class="nav-item has-treeview">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Basic Setup
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('backend.size.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Size</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('backend.costumeType.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Costume Type</p>
                            </a>
                        </li>
                    </ul>
                </li>






                <li class="nav-item has-treeview">
                    <a href="{{route('backend.costume.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tshirt"></i>
                        <p>
                            Costumes
                        </p>
                    </a>

                </li>






                <li class="nav-item has-treeview">
                    <a href="{{route('backend.admin.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-check"></i>
                        <p>
                            Admin
                        </p>
                    </a>

                </li>


                <li class="nav-item has-treeview">
                    <a href="{{route('frontend.customer.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Customers
                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview">
                    <a href="{{route('backend.costume.index')}}" class="nav-link">
                        <i class=" nav-icon fas fa-cart-arrow-down"></i>
                        <p>
                            Bookings
                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
