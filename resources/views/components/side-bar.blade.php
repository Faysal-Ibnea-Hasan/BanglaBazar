<!-- Main Sidebar Container -->
@php
    $sub_menu_icon = 'fab fa-ethereum';
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">{{ config('app.name', 'My company') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{-- <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div> --}}
            <div class="info">
                <a href="#" class="d-block">Hi, {{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            {{-- User Management --}}
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->is('admin/home') ? 'active' : '' }}">
                        <i class="far fa-chart-bar"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-{{ request()->is('admin/users*') ? 'open' : 'close' }}">
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                        <i class="fas fa-address-card"></i>
                        <p>
                            User Management
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link">
                                <i class="{{$sub_menu_icon}}"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="{{$sub_menu_icon}}"></i>
                                <p>Verify Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="{{$sub_menu_icon}}"></i>
                                <p>Actions</p>
                            </a>
                        </li>
                    </ul> --}}
                </li>
                {{-- Product Management --}}
                <li class="nav-item menu-close">
                    <a href="#" class="nav-link">
                        <i class="fas fa-gift"></i>
                        <p>
                            Product Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="{{ $sub_menu_icon }}"></i>
                                <p>Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="{{ $sub_menu_icon }}"></i>
                                <p>Actions</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Category and Sub Category Management --}}
                <li
                    class="nav-item menu-{{ request()->is('admin/categories*') || request()->is('admin/sub_categories*') ? 'open' : 'close' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/categories*') || request()->is('admin/sub_categories*') ? 'active' : '' }}">
                        <i class="fas fa-tags"></i>
                        <p>
                            Category & Sub-Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="{{ $sub_menu_icon }}"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sub_categories.index') }}" class="nav-link">
                                <i class="{{ $sub_menu_icon }}"></i>
                                <p>Sub Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Order Management --}}
                <li class="nav-item menu-close">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cart-plus"></i>
                        <p>
                            Order Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="{{ $sub_menu_icon }}"></i>
                                <p>Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="{{ $sub_menu_icon }}"></i>
                                <p>Actions</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
