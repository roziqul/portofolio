<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #30308b;">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
        <div class="sidebar-brand-icon">
            <img src="{{asset('adminAssets/logo/Noval_Logo.jpg')}}" alt="" style="width: 3rem;">
        </div>
        <div class="sidebar-brand-text text-left mx-2">SMP Unggulan<br>Noval</div>
    </a>

    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(request()->routeIs('filterPendataan')) active @endif">
        <a class="nav-link" href="{{ route('filterPendataan') }}">
            <i class="fas fa-fw fa-database"></i>
            <span>Pendataan</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(request()->routeIs('filterSeleksi')) active @endif">
        <a class="nav-link" href="{{ route('filterSeleksi') }}">
            <i class="fas fa-fw fa-sort-numeric-down"></i>
            <span>Seleksi</span>
        </a>
    </li>
    <hr class="sidebar-divider">

    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(request()->routeIs('filterPayment')) active @endif">
        <a class="nav-link" href="{{route('filterPayment')}}">
            <i class="fas fa-fw fa-money-check-alt"></i>
            <span>Pembayaran</span>
        </a>
    </li>
    <hr class="sidebar-divider">

    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(request()->routeIs('users*')) active @endif">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span>
        </a>
    </li>
    <hr class="sidebar-divider">

    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(request()->routeIs('utilities.siswa*')) active @endif">
        <a class="nav-link" href="{{route('utilities.siswa')}}">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Data Siswa</span>
        </a>
    </li>
    <hr class="sidebar-divider">

    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(request()->routeIs('utilities.kuota*')) active @endif">
        <a class="nav-link" href="{{route('utilities.kuota')}}">
            <i class="fas fa-fw fa-school"></i>
            <span>Kuota</span>
        </a>
    </li>
    <hr class="sidebar-divider">

    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(request()->routeIs('utilities.feature*')) active @endif">
        <a class="nav-link" href="{{route('utilities.feature')}}">
            <i class="fas fa-fw fa-check"></i>
            <span>Fitur</span>
        </a>
    </li>
    <hr class="sidebar-divider">

    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="{{route('getLogout')}}">
            <i class="fas fa-fw fa-key"></i>
            <span>Logout</span>
        </a>
    </li>
    <hr class="sidebar-divider">

</ul>