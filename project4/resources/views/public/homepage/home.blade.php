@extends('public.master')
@section('content')

<div id="slider" class="container-fluid position-relative p-0">
    @include('public.partials.navbar')
    <div class="carousel-header">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($sliders as $index => $s)
                    <li data-bs-target="#carouselId" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach ($sliders as $index => $s)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $s->photo) }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Explore The World</h4>
                            <h1 class="display-2 text-capitalize text-white mb-4">{{ $s->title }}</h1>
                            <p class="mb-5 fs-5">
                                {{$s->description}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<div id="about" class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="h-100">
                    <img src="{{asset('public-assets/img/about-img-2.jpg')}}" class="img-fluid w-100 h-100 rounded" alt="">
                </div>
            </div>
            <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url({{asset('public-assets/img/about-img-1.png')}});">
                {{-- SECTION DESCRIPTION --}}
                <h5 class="section-about-title pe-3">About Us</h5>
                <h1 class="mb-4">Welcome to <span class="text-primary">Suncatchers Tour and Travel</span></h1>
                <p class="mb-3">
                    Welcome to Suncatchers Tour and Travel, a premier tour and travel company dedicated to turning your travel dreams into reality. Whether you're planning a relaxing getaway, a thrilling adventure, or a cultural exploration, we are here to create tailor-made itineraries that suit your preferences. With our extensive knowledge of destinations around the world, we provide not just trips, but unforgettable experiences that leave lasting memories.
                </p>
                <p class="mb-3">
                    At Suncatchers Tour and Travel, we pride ourselves on offering exceptional service from start to finish. From the moment you begin planning your trip, our expert team will guide you through every step, ensuring that your journey is seamless and stress-free. We handle everything – from accommodation and transportation to exclusive tours and special requests – so you can focus on enjoying every moment.
                </p>
                <p class="mb-3">
                    Our mission is to connect people with the wonders of the world, offering both popular and off-the-beaten-path destinations. Whether you are traveling solo, with family, or in a group, we provide personalized travel packages that cater to all types of travelers. Our partnerships with trusted local operators ensure that you experience the best of each destination, from authentic cultural experiences to breathtaking landscapes.
                </p>
            </div>
        </div>
    </div>
</div>

<div id="service" class="container-fluid bg-light service py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Services</h5>
            <h1 class="mb-0">Our Services</h1>
        </div>
        <div class="row g-4 align-items-stretch"> <!-- align-items-stretch untuk menyamakan tinggi semua item -->
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0 h-100"> <!-- h-100 -->
                            <div class="service-content text-end d-flex flex-column"> <!-- d-flex flex-column untuk tata konten -->
                                <h5 class="mb-4">Comprehensive Tour Packages</h5>
                                <p class="mb-0">
                                    We offer complete tour packages with optional hotel room 
                                    bookings to enhance your travel experience. 
                                </p>
                            </div>
                            <div class="service-icon p-4">
                                <i class="fa fa-suitcase-rolling fa-4x text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0 h-100"> <!-- h-100 -->
                            <div class="service-content text-end d-flex flex-column"> <!-- d-flex flex-column -->
                                <h5 class="mb-4">Flexible Pickup and Drop-off</h5>
                                <p class="mb-0">
                                    Our services include flexible pickup and drop-off 
                                    to your schedule and preferred location, 
                                    ensuring a convenient and stress-free journey.
                                </p>
                            </div>
                            <div class="service-icon p-4">
                                <i class="fa fa-map-marker-alt fa-4x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0 h-100"> <!-- h-100 -->
                            <div class="service-icon p-4">
                                <i class="fa fa-shuttle-van fa-4x text-primary"></i>
                            </div>
                            <div class="service-content d-flex flex-column"> <!-- d-flex flex-column -->
                                <h5 class="mb-4">Variety of Vehicles</h5>
                                <p class="mb-0">
                                    Our fleet includes APV, Innova, and Hiace vehicles, 
                                    ensuring comfortable transportation options for any group size.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0 h-100"> <!-- h-100 -->
                            <div class="service-icon p-4">
                                <i class="fa fa-calendar-check fa-4x text-primary"></i>
                            </div>
                            <div class="service-content d-flex flex-column"> <!-- d-flex flex-column -->
                                <h5 class="mb-4">Advance Booking Required</h5>
                                <p class="mb-0">
                                    To guarantee availability and the best service, 
                                    bookings must be made at least two days in advance (H-2).
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="destination" class="container-fluid destination py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Destination</h5>
            <h1 class="mb-0">Popular Destination</h1>
        </div>
        <div class="tab-class text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                @foreach($maindestinations as $m)
                <li class="nav-item">
                    <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#tab-{{ $m->id }}">
                        <span class="text-dark mx-4">{{ $m->name }}</span> 
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach($maindestinations as $m)
                <div id="tab-{{ $m->id }}" class="tab-pane fade show p-0 {{ $loop->first ? 'active' : '' }}">
                    <div class="row g-4">
                        <div class="col-xl-12">
                            <div class="row g-4">
                                @foreach($m->subDestinations as $s)
                                <div class="col-lg-4">
                                    <div class="destination-img" style="height: 300px; overflow: hidden;"> <!-- Fixed height -->
                                        <img class="img-fluid w-100 h-100" src="{{asset('storage/'.$s->photo)}}" alt="" style="object-fit: cover;">
                                        <div class="destination-overlay p-4">
                                            <h4 class="text-white mb-2 mt-3">{{$s->name}}</h4>
                                        </div>
                                        <div class="search-icon">
                                            <a href="{{asset('storage/'.$s->photo)}}" data-lightbox="destination-{{$m->id}}"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>            
        </div>
    </div>
</div>

<div id="review" class="container-fluid bg-light testimonial py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Customer Reviews</h5>
            <h1 class="mb-0">Our Clients Say!!!</h1>
        </div>
        <div class="testimonial-carousel owl-carousel">
            @foreach ($reviews as $r)
            <div class="testimonial-item text-center rounded pb-4 bg-white">
                <a href="{{asset('storage/' . $r->documentation)}}" data-lightbox="gallery-3" class="my-auto">
                    <div class="testimonial-comment bg-white rounded p-4" style="height: 120px">
                        <p class="text-center mb-5">
                            {{$r->review}}
                        </p>
                    </div>
                    <div class="testimonial-img p-1">
                        <img src="{{asset('storage/' . $r->photo_customer)}}" class="img-fluid rounded-circle" alt="Image" style="height: 100%">
                    </div>
                    <div style="margin-top: -35px;">
                        <h5 class="mb-0">{{$r->name}}</h5>
                        <p class="mb-0">{{$r->destination}}</p>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div id="gallery" class="container-fluid gallery py-5 my-5">
    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
        <h5 class="section-title px-3">Our Gallery</h5>
        <h1 class="mb-4">Tourism & Traveling Gallery</h1>
        <p class="mb-0">
            {{-- Add a brief description or message here if needed --}}
        </p>
    </div>
    <div class="tab-class text-center">
        <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
            @foreach($maindestinations as $m)
            <li class="nav-item">
                <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#GalleryTab-{{ $m->id }}">
                    <span class="text-dark mx-4">{{ $m->name }}</span>
                </a>
            </li>
            @endforeach
        </ul>
        <div class="tab-content">
            @foreach($maindestinations as $m)
            <div id="GalleryTab-{{$m->id}}" class="tab-pane fade show p-0 {{ $loop->first ? 'active' : '' }}">
                <div class="gallery-row d-flex flex-nowrap overflow-auto" style="gap: 1rem; padding-bottom: 1rem;">
                    @foreach ($m->subDestinations as $s)
                        @foreach ($s->Gallery as $g)
                        <div class="gallery-item-wrapper" style="flex: 0 0 auto; width: 400px;"> <!-- Fixed width for consistent size -->
                            <div class="gallery-item h-100 position-relative">
                                <img src="{{ asset('storage/' . $g->photo) }}" class="img-fluid w-100 h-auto rounded" alt="Image" style="object-fit: cover; aspect-ratio: 16 / 9;"> <!-- Landscape aspect ratio -->
                                <div class="gallery-content" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 10px; background: rgba(0, 0, 0, 0.5);">
                                    <h5 class="text-white text-uppercase mb-2">{{$s->name}}</h5>
                                </div>
                                <div class="gallery-plus-icon" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                    <a href="{{ asset('storage/' . $g->photo) }}" data-lightbox="gallery-{{$m->id}}"><i class="fa fa-plus-square fa-1x btn btn-light btn-lg-square text-primary"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


<div class="container-fluid bg-light py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h1 class="mb-0">Why Choose Suncatchers Tour and Travel?</h1>
            <p class="fs-5 text-muted mt-3">Discover the unmatched advantages of our product and see why it stands out from the rest.</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-check-circle fa-3x text-primary"></i>
                        </div>
                        <h4 class="card-title">High Quality</h4>
                        <p class="card-text">Product A is built with the finest materials, ensuring durability and longevity in every use.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-thumbs-up fa-3x text-primary"></i>
                        </div>
                        <h4 class="card-title">User-Friendly</h4>
                        <p class="card-text">Designed with the user in mind, Product A offers intuitive and easy-to-use features.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-star fa-3x text-primary"></i>
                        </div>
                        <h4 class="card-title">Top-Rated</h4>
                        <p class="card-text">With numerous 5-star reviews, Product A is a customer favorite for its exceptional performance.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-clock fa-3x text-primary"></i>
                        </div>
                        <h4 class="card-title">Time-Saving</h4>
                        <p class="card-text">Product A helps you complete tasks faster, giving you more time for what truly matters.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-hand-holding-usd fa-3x text-primary"></i>
                        </div>
                        <h4 class="card-title">Affordable</h4>
                        <p class="card-text">Get the best value for your money with Product A, offering premium features at a competitive price.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-shield-alt fa-3x text-primary"></i>
                        </div>
                        <h4 class="card-title">Secure</h4>
                        <p class="card-text">Product A ensures your data and privacy are protected with state-of-the-art security measures.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Our Blog</h5>
            <h1 class="mb-4">Popular Travel Blogs</h1>
            <p class="mb-0">Explore our latest travel blogs with insights, tips, and stories from around the world. Let these blogs inspire your next adventure.</p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach ($articles as $a)
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="blog-item d-flex flex-column">
                    <div class="blog-img">
                        <div class="blog-img-inner">
                            <img class="img-fluid w-100 rounded-top" src="{{asset('storage/' . $a->photo)}}" alt="Image">
                            <div class="blog-icon">
                                <a href="" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                            </div>
                        </div>
                        <div class="blog-info d-flex align-items-center border border-start-0 border-end-0">
                            <a href="#" class="btn-hover flex-fill text-center text-white py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>{{$a->created_at}}</a>
                        </div>
                    </div>
                    <div class="blog-content border border-top-0 rounded-bottom p-4 d-flex flex-column flex-grow-1">
                        <p class="mb-3">Posted By: Admin</p>
                        <a href="#" class="h4">{{$a->title}}</a>
                        <p class="my-3">{{Str::limit($a->description, 100, '...')}}</p>
                        <div class="mt-auto">
                            <a href="{{route('article.public.show', $a->id)}}" class="btn btn-primary rounded-pill py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div id="booking" class="container-fluid booking py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h5 class="section-booking-title pe-3">Booking</h5>
                <h1 class="text-white mb-4">Online Booking</h1>
                <p class="text-white mb-4">Explore the world with our expertly crafted tour packages that cater to every traveler's desires. Whether you're looking for adventure, relaxation, or cultural immersion, we offer unique experiences that will leave you with unforgettable memories. Let us handle the details while you enjoy the journey.
                </p>
                <p class="text-white mb-4">Our dedicated team ensures a seamless booking experience, from selecting your destination to securing your accommodations and tours. With 24/7 support and personalized travel options, we guarantee a stress-free and exciting adventure for every traveler. Start your journey with us today!
                </p>                
                <a href="#" class="btn btn-light text-primary rounded-pill py-3 px-5 mt-2">Read More</a>
            </div>
            <div class="col-lg-6">
                <h1 class="text-white mb-3">Book A Tour Deals</h1>
                <p class="text-white mb-4">Get <span class="text-warning">50% Off</span> On Your First Adventure
                    Trip With Suncatchers Tour and Travel. Get More Deal Offers Here.</p>
                <form action="{{route('reservation.post')}}" enctype="multipart/form-data" method="POST" target="_blank">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-white border-0" id="name" name="name" placeholder="Your Name">
                                <label for="name">Nama Lengkap</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating date" id="date3" data-target-input="nearest">
                                <input type="date" class="form-control bg-white border-0" id="datetime" name="pick_date" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                <label for="datetime">Tanggal Penjemputan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select bg-white border-0" id="select1" name="destination">
                                    @foreach ($maindestinations as $m)
                                    <option value="{{$m->name}}">{{$m->name}}</option>
                                    @endforeach
                                </select>
                                <label for="select1">Tujuan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-white border-0" name="persons" placeholder="2">
                                <label for="name">Jumlah Penumpang</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-white border-0" name="pick_location" placeholder="Surabaya, Indonesia">
                                <label for="name">Lokasi Penjemputan</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <button class="btn btn-icon btn-icon-left btn-success text-white w-100 py-3" type="submit">
                                    <i class="fab fa-whatsapp"></i>
                                    Book Now via Whatsapp
                                </button>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-floating">
                                <button class="btn btn-icon btn-icon-left btn-success text-white w-100 py-3" type="submit">
                                    <i class="fab fa-weixin"></i>
                                    Book Now via Weixin
                                </button>
                            </div>
                        </div>                        --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Hover effect for gallery items */
    .gallery-item:hover .gallery-content {
        opacity: 1;
    }
    .gallery-item:hover .gallery-plus-icon {
        display: block;
    }
</style>

{{-- <style>
    .testimonial-item {
        min-height: 400px; /* Set the minimum height */
    }
</style> --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const divs = document.querySelectorAll('div[id]');
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

        function onScroll() {
            let currentDiv = '';

            divs.forEach(div => {
                const divTop = div.offsetTop;
                const divHeight = div.clientHeight;

                if (pageYOffset >= divTop - divHeight / 3) {
                    currentDiv = div.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').substring(1) === currentDiv) {
                    link.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', onScroll);
        onScroll(); // Jalankan sekali saat halaman dimuat untuk menetapkan kelas 'active' yang benar
    });
</script>
@endsection
