@extends('user-side.master')
@section('content')
<main class="main">
    <section id="team" class="team section dark-background" style="padding-top: 80px; padding-bottom: 40px">
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
                <div class="col-lg-4 col-md-6 text-center" data-aos="fade-up" data-aos-delay="100">
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
        </div>
    </section>

</main>
@endsection
