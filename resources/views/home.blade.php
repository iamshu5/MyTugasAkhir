@include('layouts.header', ['title' => 'Home']) {{-- Layouting --}}

{{-- Konten --}}
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
    <div class="container position-relative">
        <div class="row gy-5" data-aos="fade-in">
            <div
                class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                <h2>SELAMAT DATANG DI<br>
                    <span>SMP ISLAM NURUL HIDAYAH</span>
                </h2>
                <h6 class="text-white"><i>Generasi yang berakhlak mulia, cerdas, modern, mampu bersaing di era
                        Globalisasi</i></h6>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    {{-- <a href="{{ url('/') }}" class="btn-get-started shadow-sm">Beranda</a> --}}
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-7">
                <!-- Gambar Slider -->
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <div class="carousel-item">
                            <img src="{{ url('assets/umum/img/slider/slider-1.jpg') }}" class="d-block w-100 rounded-3"
                                alt="Slider-1" data-aos="zoom-out" data-aos-delay="100">
                            <div class="carousel-caption text-center mb-auto">
                            </div>
                        </div>

                        <div class="carousel-item">
                            <img src="{{ url('assets/umum/img/slider/slider-2.jpg') }}" class="d-block w-100 rounded-3"
                                alt="Slider-2" data-aos="zoom-out" data-aos-delay="100">
                            <div class="carousel-caption text-center mb-auto">
                                <p></p>
                            </div>
                        </div>

                        <div class="carousel-item active">
                            <img src="{{ url('assets/umum/img/slider/slider-3.jpg') }}" class="d-block w-100 rounded-3"
                                alt="Slider-3" data-aos="zoom-out" data-aos-delay="100">
                            <div class="carousel-caption text-center mb-auto">
                            </div>
                        </div>

                    </div>
                </div> <!-- End Gambar Slider-->

            </div>
        </div>
    </div>

        <div class="icon-boxes position-relative">
            <div class="container position-relative">
                <div class="row gy-4 mt-5 justify-content-center">

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><img src="{{ url('assets/umum/img/box/kotak-1.jpg') }}" alt="kotak-1"
                                    class="rounded-3 d-block w-100 ">
                            </div>
                            <h4 class="title"><a href="{{ url('/kegiatan-sekolah') }}" class="stretched-link">Kegiatan
                                    Sekolah</a></h4>
                            <span class="text-gray-500 fw-light">Klik untuk melihat</span>
                        </div>
                    </div>
                    <!--End Icon Box 1 -->


                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><img src="{{ url('assets/umum/img/box/kotak-3.jpg') }}" alt="kotak-3"
                                    class="rounded-3 d-block w-100 ">
                            </div>
                            <h4 class="title"><a href="{{ url('/ekstrakulikuler') }}" class="stretched-link">Ekstrakulikuler</a></h4>
                            <span class="text-gray-500 fw-light">Klik untuk melihat</span>
                        </div>
                    </div>
                    <!--End Icon Box 3 -->

                    {{-- <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <div class="icon"><img src="{{ url('assets/umum/img/box/kotak-4.jpg') }}" alt="kotak-3"
                                    class="rounded-3 d-block w-100 h-50 "></div>
                            <h4 class="title"><a href="#" class="stretched-link">Guru - Guru</a></h4>
                            <span class="text-gray-500 fw-light">Klik untuk melihat</span>
                        </div>
                    </div> --}}
                    <!--End Icon Box 4 -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero Section -->

{{-- Video Profile SMP ISLAM NURUL HIDAYAH --}}
<section id="call-to-action" class="call-to-action">
    <div class="container text-center" data-aos="zoom-out">
        <a href="https://www.youtube.com/watch?v=RbkyiuUCn04" class="glightbox play-btn"></a>
        <h3>PROFILE SMP ISLAM NURUL HIDAYAH</h3>
        <p> NUDAY GENERATION</p>
    </div>
</section><!-- End Video Profile SMP ISLAM NURUL HIDAYAH -->

{{-- gambar slider  --}}
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item">
            <img src="{{ url('assets/umum/img/slider/slider-4.jpg') }}" class="d-flex w-100 mx-auto" alt="Slider 4">
        </div>
        <div class="carousel-item">
            <img src="{{ url('assets/umum/img/slider/slider-5.jpg') }}" class="d-flex w-100 mx-auto" alt="Slider 5">
        </div>
        <div class="carousel-item">
            <img src="{{ url('assets/umum/img/slider/slider-6.jpg') }}" class="d-flex w-100 mx-auto" alt="Slider 6">
        </div>
        <div class="carousel-item">
            <img src="{{ url('assets/umum/img/slider/slider-7.jpg') }}" class="d-flex w-100 mx-auto" alt="Slider 7">
        </div>
        <div class="carousel-item">
            <img src="{{ url('assets/umum/img/slider/slider-8.jpg') }}" class="d-flex w-100 mx-auto" alt="Slider 8">
        </div>
        <div class="carousel-item active">
            <img src="{{ url('assets/umum/img/slider/slider-9.jpg') }}" class="d-flex w-100 mx-auto" alt="Slider 9">
        </div>
        <div class="carousel-item">
            <img src="{{ url('assets/umum/img/slider/slider-10.jpg') }}" class="d-flex w-100 mx-auto" alt="Slider 10">
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div> {{-- End Slider --}}
@include('layouts.footer') {{-- End Layouting --}}
