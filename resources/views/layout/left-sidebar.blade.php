<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light "><b>Ecommerce</b></span> <br> <span
            style="    margin-left: 73px;
        "></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">


        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('dasboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Dashbord
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('users')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('products') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('categories')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Product Categories
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('role_permissions')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Roles & Permission
                        </p>
                    </a>
                </li>




                <li class="nav-item">
                    <a href="{{route('orders')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Orders
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('reviews')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Reviews
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('feedbacks')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Feedback
                        </p>
                    </a>
                </li>





                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>





            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
