<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="{{route('homepage')}}" class="navbar-brand p-0">
        <h1 class="m-0">Suncatchers</h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="/homepage#slider" class="nav-item nav-link active">Home</a>
            <a href="/homepage#about" class="nav-item nav-link">About</a>
            <a href="/homepage#service" class="nav-item nav-link">Services</a>
            <a href="/homepage#destination" class="nav-item nav-link">Destination</a>
            <a href="/homepage#review" class="nav-item nav-link">Review</a>
            <a href="/homepage#gallery" class="nav-item nav-link">Gallery</a>
            <a href="{{route('article.public.index')}}" class="nav-item nav-link">Article</a>
        </div>
        <a href="/homepage#booking" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Book Now</a>
    </div>
</nav>