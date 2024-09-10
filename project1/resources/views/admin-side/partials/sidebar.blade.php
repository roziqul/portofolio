<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">EduLink - 01</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">E1</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li @if (request()->routeIs('dashboard')) class="active" @endif>
                <a href="{{route('dashboard')}}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dasbor Admin</span>
                </a>
            </li>
            <li @if (request()->routeIs('alumni-graduate*')) class="active" @endif>
                <a href="{{route('alumni-graduate.index')}}" class="nav-link">
                    <i class="fas fa-user-graduate"></i>
                    <span>Alumni</span>
                </a>
            </li>
            <li @if (request()->routeIs('buletin*')) class="active" @endif>
                <a href="{{route('buletin.index')}}" class="nav-link">
                    <i class="fas fa-newspaper"></i>
                    <span>Berita</span>
                </a>
            </li>
            <li @if (request()->routeIs('gallery*')) class="active" @endif>
                <a href="{{route('gallery.index')}}" class="nav-link">
                    <i class="fas fa-images"></i>
                    <span>Galeri</span>
                </a>
            </li>
            <li @if (request()->routeIs('position*')) class="active" @endif>
                <a href="{{route('position.index')}}" class="nav-link">
                    <i class="fas fa-user-tie"></i>
                    <span>Jabatan</span>
                </a>
            </li>
            <li @if (request()->routeIs('headmaster*')) class="active" @endif>
                <a href="{{route('headmaster.index')}}" class="nav-link">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Kepala Sekolah</span>
                </a>
            </li>
            <li @if (request()->routeIs('achievement*')) class="active" @endif>
                <a href="{{route('achievement.index')}}" class="nav-link">
                    <i class="fas fa-trophy"></i>
                    <span>Prestasi Siswa</span>
                </a>
            </li>
            <li @if (request()->routeIs('teacher*')) class="active" @endif>
                <a href="{{route('teacher.index')}}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Tenaga Pendidik</span>
                </a>
            </li>
            <li @if (request()->routeIs('slider*')) class="active" @endif>
                <a href="{{route('slider.index')}}" class="nav-link">
                    <i class="fas fa-sliders-h"></i>
                    <span>Slider</span>
                </a>
            </li>
            <li @if (request()->routeIs('#')) class="active" @endif>
                <a href="#" class="nav-link">
                    <i class="fas fa-cogs"></i>
                    <span>Utilitas</span>
                </a>
            </li>
        </ul>
    </aside>
</div>