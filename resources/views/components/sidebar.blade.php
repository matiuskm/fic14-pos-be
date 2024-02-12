        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="/" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">{{ env('APP_NAME', 'POS ARUNIKA') }}</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('img/user.jpg') }}" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                        <span>{{ ucfirst(auth()->user()->role) }}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('home') }}"
                        class="nav-item nav-link {{ Request::is('home*') ? 'active' : '' }}"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-laptop me-2"></i>Master</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('categories.index') }}"
                                class="dropdown-item {{ Request::is('categories*') ? 'active' : '' }}"><i
                                    class="fa fa-caret-right me-2"></i>
                                Categories</a>
                            <a href="{{ route('products.index') }}"
                                class="dropdown-item {{ Request::is('products*') ? 'active' : '' }}"><i
                                    class="fa fa-caret-right me-2"></i>
                                Products</a>
                            <a href="{{ route('users.index') }}"
                                class="dropdown-item {{ Request::is('users*') ? 'active' : '' }}"><i
                                    class="fa fa-caret-right me-2"></i>
                                Users</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
