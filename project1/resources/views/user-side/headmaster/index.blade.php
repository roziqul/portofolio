@extends('user-side.master')
@section('content')
<main class="main">
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

    <section id="about" class="about section" style="padding-bottom: 0px; padding-top: 40px">
        <div class="container mb-2">
            <div class="row g-3" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <img src="{{ $headmaster->photo }}" class="img-fluid rounded" alt="" style="max-height: 500px; width: 100%">
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row g-3" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <p>
                        {{ $headmaster->speech }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
