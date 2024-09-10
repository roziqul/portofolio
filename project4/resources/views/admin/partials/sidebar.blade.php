<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Suncatchers - Admin</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">SA</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>

            <li @if (request()->routeIs('admin.dashboard')) class="active" @endif>
                <a href="{{route('admin.dashboard')}}" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li @if (request()->routeIs('article*')) class="active" @endif>
                <a href="{{route('article.index')}}" class="nav-link">
                    <i class="fas fa-newspaper"></i>
                    <span>Artikel</span>
                </a>
            </li>
            <li class="nav-item dropdown @if (request()->routeIs('maindestination*') || request()->routeIs('subdestination*')) active @endif">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Destinasi</span></a>
                <ul class="dropdown-menu">
                  <li @if (request()->routeIs('maindestination*')) class="active" @endif><a class="nav-link" href="{{route('maindestination.index')}}">Destinasi Utama</a></li>
                  <li @if (request()->routeIs('subdestination*')) class="active" @endif><a class="nav-link" href="{{route('subdestination.index')}}">Sub Destinasi</a></li>
                </ul>
            </li>
            <li @if (request()->routeIs('gallery*')) class="active" @endif>
                <a href="{{route('gallery.index')}}" class="nav-link">
                    <i class="fas fa-images"></i>
                    <span>Galeri</span>
                </a>
            </li>
            <li @if (request()->routeIs('contact*')) class="active" @endif>
                <a href="{{route('contact.index')}}" class="nav-link">
                    <i class="fas fa-phone"></i>
                    <span>Kontak</span>
                </a>
            </li>
            <li @if (request()->routeIs('slider*')) class="active" @endif>
                <a href="{{route('slider.index')}}" class="nav-link">
                    <i class="fas fa-sliders-h"></i>
                    <span>Slider</span>
                </a>
            </li>
            <li @if (request()->routeIs('review*')) class="active" @endif>
                <a href="{{route('review.index')}}" class="nav-link">
                    <i class="fas fa-star"></i>
                    <span>Ulasan</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
