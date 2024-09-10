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
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Suncatchers - Articles</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach($articles as $a)
                            <li class="mb-3">
                                <a href="{{route('article.public.show', $a->id)}}" class="text-decoration-none text-dark">
                                    <div class="d-flex flex-column flex-md-row">
                                        <!-- Responsive Image -->
                                        <img src="{{ $a->photo }}" class="img-thumbnail me-md-3 mb-3 mb-md-0" 
                                             style="width: 100%; max-width: 200px; height: auto;" alt="Related Article">
                                        <div>
                                            <h3 class="mb-1">{{ $a->title }}</h3>
                                            <p class="mb-3 text-muted">
                                                By <strong>Admin</strong> | {{ $a->created_at->format('M d, Y') }}
                                            </p>
                                            <p class="mb-0 text-muted">{{ Str::limit($a->description, 500) }}</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
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
                    Trip With Travela. Get More Deal Offers Here.</p>
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
    .container {
        width: 100%;
    }

    /* Card for related articles */
    .card {
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .card-body {
        padding: 1rem;
    }

    .list-unstyled {
        margin: 0;
        padding: 0;
    }

    .list-unstyled li {
        border-bottom: 1px solid #ddd;
        padding: 0.5rem 0;
    }

    .list-unstyled li:last-child {
        border-bottom: none;
    }

</style>
@endsection
