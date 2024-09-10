<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a class="logo d-flex align-items-center">
            <img src="{{asset('user-assets/img/logo.png')}}" alt="">
            <h1 class="sitename">{{$utility->school_name}}</h1>
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li class="dropdown">
                    <a href="#">
                        <span>Profil</span> 
                        <i class="bi bi-chevron-down toggle-dropdown"></i>
                    </a>
                    <ul>
                        <li><a href="#">Sambutan Kepala Sekolah</a></li>
                        <li><a href="#">Visi Misi dan Tujuan</a></li>
                        <li><a href="#">Tenaga Pendidik</a></li>
                        <li><a href="#">Fasilitas</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#">
                        <span>Akademik</span> 
                        <i class="bi bi-chevron-down toggle-dropdown"></i>
                    </a>
                    <ul>
                        <li><a href="#">Ekstrakulikuler</a></li>
                    </ul>
                </li>
                <li><a href="#" class="">Berita</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>
