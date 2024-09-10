@if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="#">SmartLib - V1</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="index.html">St</a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li @if (request()->routeIs('admin-dashboard')) class="active" @endif>
                    <a href="{{ route('admin-dashboard') }}" class="nav-link">
                        <i class="fas fa-home"></i>
                        <span>Admin Dashboard</span>
                    </a>
                </li>
                <li class="menu-header">Services</li>
                <li class="nav-item dropdown @if (request()->routeIs('catalog*') || request()->routeIs('section*') || request()->routeIs('category*')) active @endif">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-columns"></i>
                        <span>Catalog</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li @if (request()->routeIs('catalog*')) class="active" @endif>
                            <a class="nav-link" href="{{ route('catalog.index') }}">
                                Book Collection
                            </a>
                        </li>
                        <li @if (request()->routeIs('category*')) class="active" @endif>
                            <a class="nav-link" href="{{ route('category.index') }}">
                                Category
                            </a>
                        </li>
                        <li @if (request()->routeIs('section*')) class="active" @endif>
                            <a class="nav-link" href="{{ route('section.index') }}">
                                Section
                            </a>
                        </li>
                    </ul>
                </li>
                <li @if (request()->routeIs('admin-reservation*') || request()->routeIs('admin-reserved*') && (!request()->routeIs('admin-reserved-search-reserved') || request()->routeIs('admin-reserved-result'))) class="active" @endif>
                    <a href="{{ route('admin-reservation-index') }}" class="nav-link">
                        <i class="fas fa-book-open"></i>
                        <span>Book Lending</span>
                    </a>
                </li>
                <li @if (request()->routeIs('admin-reserved-search-reserved') || request()->routeIs('admin-reserved-result')) class="active" @endif>
                    <a href="{{ route('admin-reserved-search-reserved') }}" class="nav-link">
                        <i class="fas fa-book-reader"></i>
                        <span>Book Return</span>
                    </a>
                </li>
                <li @if (request()->routeIs('missing*')) class="active" @endif>
                    <a href="{{ route('missing.index') }}" class="nav-link">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>Missing Report</span>
                    </a>
                </li>
                <li class="menu-header">Users</li>
                <li @if (request()->routeIs('administrator-data*')) class="active" @endif>
                    <a href="{{ route('administrator-data.index') }}" class="nav-link">
                        <i class="fas fa-user-secret"></i>
                        <span>Admin</span>
                    </a>
                </li>
                <li @if (request()->routeIs('student*')) class="active" @endif>
                    <a href="{{ route('student.index') }}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Student</span>
                    </a>
                </li>
                <li class="menu-header">Utility</li>
                <li>
                    <a href="#" class="nav-link">
                        <i class="fas fa-school"></i>
                        <span>School Information</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>App Configuration</span>
                    </a>
                </li>
            </ul>
        </aside>
    </div>
@elseif (auth()->user()->role == 'student')
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="index.html">SmartLib - V1</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="index.html">St</a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li @if (request()->routeIs('admin-dashboard')) class="active" @endif>
                    <a href="{{ route('admin-dashboard') }}" class="nav-link">
                        <i class="fas fa-home"></i>
                        <span>Student Dashboard</span>
                    </a>
                </li>
                <li class="menu-header">Services</li>
                <li class="nav-item dropdown @if (request()->routeIs('catalog*') || request()->routeIs('section*') || request()->routeIs('category*')) active @endif">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-columns"></i>
                        <span>Catalog</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li @if (request()->routeIs('catalog*')) class="active" @endif>
                            <a class="nav-link" href="{{ route('catalog.index') }}">
                                Book Collection
                            </a>
                        </li>
                        <li @if (request()->routeIs('category*')) class="active" @endif>
                            <a class="nav-link" href="{{ route('category.index') }}">
                                Category
                            </a>
                        </li>
                        <li @if (request()->routeIs('section*')) class="active" @endif>
                            <a class="nav-link" href="{{ route('section.index') }}">
                                Section
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li @if (request()->routeIs('studentReservation*')) class="active" @endif>
                    <a href="{{ route('studentReservation.index') }}" class="nav-link">
                        <i class="fas fa-book-open"></i>
                        <span>Pengajuan Peminjaman</span>
                    </a>
                </li>
                <li @if (request()->routeIs('studentLost*')) class="active" @endif>
                    <a href="{{ route('studentLost.index') }}" class="nav-link">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>Pengajuan Kehilangan</span>
                    </a>
                </li> --}}
            </ul>
        </aside>
    </div>
@else
<a href="{{ route('login') }}"></a>
@endif
