<div class="container-fluid footer py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-12 col-lg-12 col-xl-10">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">Contact Us</h4>
                    <a href=""><i class="fas fa-map-marker-alt me-2"></i>{{$contact->address}}</a>
                    <a href="mailto:{{$contact->email}}"><i class="fas fa-envelope me-2"></i>{{$contact->email}}</a>
                    <a href="http://wa.me/{{$contact->contact_wa}}"><i class="fab fa-whatsapp me-2"></i>{{$contact->contact_wa}}</a>
                    <a href="#"><i class="fab fa-weixin me-2"></i>{{$contact->contact_wechat}}</a>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-share fa-2x text-white me-2"></i>
                        <a class="btn-square btn btn-primary rounded-circle mx-1" href="{{$contact->instagram}}"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn-square btn btn-primary rounded-circle mx-1" href="{{$contact->instagram}}"><i class="fab fa-twitter"></i></a>
                        <a class="btn-square btn btn-primary rounded-circle mx-1" href="{{$contact->instagram}}"><i class="fab fa-instagram"></i></a>
                        <a class="btn-square btn btn-primary rounded-circle mx-1" href="{{$contact->instagram}}"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>