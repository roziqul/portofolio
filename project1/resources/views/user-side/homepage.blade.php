@extends('user-side.master')
@section('content')
<main class="main">
    {{-- SECTION HERO --}}
    <section id="hero" class="hero section dark-background">
        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-interval="3000">
            @foreach ($sliders as $s)
            <div class="carousel-item active">
                <img src="{{ $s->photo }}" alt="">
                <div class="carousel-container">
                    <h2 class="text-center">{{ $s->title }}</h2>
                </div>
            </div>
            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
            @endforeach
        </div>
    </section>

    {{-- SECTION TENTANG KAMI --}}
    <section id="about" class="about section" style="padding-bottom: 0px; padding-top: 40px;">
        <div class="container section-title" data-aos="fade-up" style="padding-bottom: 20px">
            <h2>Tentang Kami</h2>
        </div>
        <div class="container mb-2">
            <div class="row g-3" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-1 col-md-6 col-sm-12">
                    <p></p>
                </div>
                <div class="col-lg-10 col-md-6 col-sm-12">
                    <img src="{{ $utility->school_photo }}" class="img-fluid rounded" alt="">
                </div>
                <div class="col-lg-1 col-md-6 col-sm-12">
                    <p></p>
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row g-3" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-1 col-md-6 col-sm-12">
                    <p></p>
                </div>
                <div class="col-lg-10 col-md-6 col-sm-12">
                    <p class="text-center">
                        {{ $utility->school_description }}
                    </p>
                </div>
                <div class="col-lg-1 col-md-6 col-sm-12">
                    <p></p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row g-3" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-1 col-md-6 col-sm-12">
                    <p></p>
                </div>
                <div class="col-lg-10 col-md-6 col-sm-12">
                    <h4 class="fst-italic text-center">
                        Motto Sekolah
                    </h4>
                    <h6 class="text-center">
                        {{ $utility->school_motto }}
                    </h6>
                </div>
                <div class="col-lg-1 col-md-6 col-sm-12">
                    <p></p>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION VISI MISI TUJUAN --}}
    <section id="featured-services" class="featured-services section" style="padding-top: 20px; padding-bottom: 40px">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center">
                        <h4 class="title">Visi Sekolah</h4>
                        <p class="description">
                            {{ $utility->school_vision }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-center">
                        <h4 class="title">Misi Sekolah</h4>
                        <p class="description">
                            {{ $utility->school_mission }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-center">
                        <h4 class="title">Tujuan Sekolah</h4>
                        <p class="description">
                            {{ $utility->school_goal }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION FASILITAS SEKOLAH --}}
    <section id="team" class="team section dark-background" style="padding-top: 40px; padding-bottom: 20px">
        <div class="container section-title" data-aos="fade-up" style="padding-bottom: 20px">
            <h2>Fasilitas Sekolah</h2>
            <p>Fasilitas sekolah merupakan elemen penting yang mendukung proses pendidikan dan pengembangan siswa secara
                menyeluruh. Dengan berbagai fasilitas yang tersedia, sekolah berupaya menciptakan lingkungan belajar
                yang kondusif, aman, dan nyaman.
            </p>
        </div>
        <div class="container">
            <div id="facilitiesCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($facilities->chunk(3) as $facilityChunk)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <div class="row">
                            @foreach ($facilityChunk as $f)
                            <div class="col-lg-4 col-md-6 text-center">
                                <div class="member">
                                    <div class="facility-photo-wrapper">
                                        <img src="{{ $f->photo }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="member-info">
                                        <div class="member-info-content">
                                            <h4>{{ $f->name }}</h4>
                                            <span>{{ $f->description }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#facilitiesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#facilitiesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    {{-- SECTION EXTRAKURIKULER --}}
    <section id="team" class="team section dark-background" style="padding-top: 20px; padding-bottom: 40px">
        <div class="container section-title" data-aos="fade-up" style="padding-bottom: 20px">
            <h2>Ekstrakurikuler</h2>
            <p class="description">
                Di sekolah kami, kami menyediakan berbagai pilihan kegiatan ekstrakurikuler yang
                dirancang untuk mendukung pengembangan potensi siswa secara holistik. Mulai dari bidang olahraga, seni,
                sains, hingga kegiatan berbasis organisasi, setiap siswa dapat memilih kegiatan yang paling sesuai
                dengan minat dan bakat mereka.
            </p>
        </div>
        <div class="container">
            <div class="row gy-4">
                @foreach ($extras as $e)
                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-photo-wrapper"
                            style="width: 100%; height: 0; padding-bottom: 75%; position: relative; overflow: hidden;">
                            <img src="{{ $e->photo }}" class="img-fluid" alt="" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; border-radius:10px;">
                        </div>
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>{{ $e->name }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 text-center" style="margin-top: 30px;">
                    <a href="#" class="new-btn">Lebih lengkap..</a>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION PENCAPAIAN SISWA --}}
    <section id="portfolio" class="portfolio section" style="padding-top: 40px; padding-bottom: 40px">
        <div class="container section-title" data-aos="fade-up" style="padding-bottom: 20px">
            <h2>Pencapaian Siswa</h2>
            <p>
                Halaman Pencapaian Siswa adalah tempat di mana sekolah menampilkan berbagai prestasi yang telah diraih oleh siswa dalam berbagai bidang, baik akademik maupun non-akademik. 
            </p>
        </div>
        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($achievements as $a)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <img src="{{ $a->photo }}" class="img-fluid rounded" alt="">
                        <div class="portfolio-info">
                            <h4>{{ $a->student_name }}</h4>
                            <p>{{ $a->title }}</p>
                            <a href="{{ $a->photo }}" title="{{ $a->title }}" class="details-link">
                                <i class="bi bi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 text-center" style="margin-top: 20px;">
                        <a href="#" class="new-btnn">Lebih lengkap..</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION TENAGA PENDIDIK --}}
    <section id="team" class="team section light-background" style="padding-top: 40px">
        <div class="container section-title" data-aos="fade-up" style="padding-bottom: 20px">
            <h2 style="color: black">Tenaga Pendidik</h2>
            <p style="color: black">
                Tenaga pendidik kami adalah profesional berdedikasi yang memotivasi dan membimbing
                siswa untuk mencapai potensi terbaik mereka.
            </p>
        </div>
        <div class="container">
            <div class="row gy-4">
                @foreach ($teachers as $t)
                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-photo-wrapper">
                            <img src="{{ $t->photo }}" class="img-fluid rounded" alt="">
                        </div>
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>{{ $t->name }}</h4>
                                <span>{{ $t->position->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var myCarousel = new bootstrap.Carousel(document.getElementById('hero-carousel'), {
                interval: 3000,
                ride: 'carousel'
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .facility-photo-wrapper {
            height: 250px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .facility-photo-wrapper img {
            height: 100%;
            width: 100%;
        }
    </style>
</main>
@endsection
