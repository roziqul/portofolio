<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #30308b;">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('public.dashboard')}}">
        <div class="sidebar-brand-icon">
            <img src="{{asset('adminAssets/logo/Noval_Logo.jpg')}}" alt="" style="width: 3rem;">
        </div>
        <div class="sidebar-brand-text text-left mx-2">SMP Unggulan<br>Noval</div>
    </a>

    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(request()->segment(2) == 'pendaftaran') active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-user-check"></i>
            <span>Pendataan Peserta Didik</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('get.pendataan.verifikasi')}}">1. Verifikasi</a>
                <a class="collapse-item" href="{{route('get.pendataan.biodata')}}">2. Biodata</a>
                <a class="collapse-item" href="{{route('get.pendataan.ortu')}}">3. Orang Tua</a>
                <a class="collapse-item" href="{{route('get.pendataan.pemberkasan')}}">4. Pemberkasan</a>
                <a class="collapse-item" href="{{route('get.pendataan.payment')}}">5. Pembayaran PSB</a>
                <a class="collapse-item" href="{{route('get.pendataan.finalisasi')}}">6. Finalisasi</a>
                <a class="collapse-item" href="{{route('get.pendataan.status')}}">7. Status</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-upload"></i>
            <span>Program PSB</span>
        </a>
        <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('get.seleksi.input-nilai')}}">1. Input Nilai</a>
                <a class="collapse-item" href="{{route('get.seleksi.finalisasi')}}">2. Finalisasi</a>
                <a class="collapse-item" href="{{route('get.seleksi.perankingan')}}">3. Perankingan</a>
                <a class="collapse-item" href="{{route('get.seleksi.status')}}">4. Status Siswa</a>
            </div>
        </div>
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