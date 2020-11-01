<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link d-flex">
        <img src="{{ asset('logo/syria.png') }}" alt="syrian_flag" class="ml-3 w-75">

    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-header">Users Section</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('view_admins') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Admins</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('view_users') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ban_users') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bannd Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Add_users') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Products Section</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-box"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_product') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add_product') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Products</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Categories Section</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-tags"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('view_category') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add_category') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header"> Banners Section
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-images"></i>
                        <p>
                            Banners
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('View_banner') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Banners</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add_banner') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Banner</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Order Section</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Order</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
