@include('layouts.header', ['title' => 'Kegiatan Sekolah'])

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kegiatan Sekolah</li>
    </ol>
</nav>
<section id="kegiatan-sekolah" class="kegiatan-sekolah">
    <div class="container" data-aos="fade-up">
        <div class="container-fluid">
            <div class="section-header pt-3">
                <h2>Kegiatan Sekolah</h2>
                <p>Membuat Karakter Berakhlak Mulia, Taqwa, Sholeh dan Sholehah, Berjiwa Nasionalis, Percaya Diri</p>
            </div>

            {{-- TAHFIDZ --}}
            <div class="row justify-content-center">
                <hr>
                <h5 class="text-center mb-3 fw-bold">TAHFIDZ</h5>
                <span class="text-center mb-3">Bersama Membangun Generasi Qurani. Kemampuan daya ingat, memelihara dan
                    menjaga kemurnian Al-Quran.</span>
                <div class="col-md-4 mb-3">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/tahfidz/tahfidz-1.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="tahfidz-1">
                </div>

                <div class="col-md-4 mb-4">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/tahfidz/tahfidz-2.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="tahfidz-2">
                </div>

                <div class="col-md-4 mb-4">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/tahfidz/tahfidz-3.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="tahfidz-3">
                </div>

                <div class="col-md-4 mb-4">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/tahfidz/tahfidz-4.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="tahfidz-4">
                </div>

                <div class="col-md-4 mb-4">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/tahfidz/tahfidz-5.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="tahfidz-5">
                </div>

                <div class="col-md-4 mb-4">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/tahfidz/tahfidz-6.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="tahfidz-6">
                </div>
                <hr>
                <h5 class="text-center mb-3 mt-3 fw-bold mt-4">PRAKTIK LAB</h5>
                <span class="text-center mb-3">Bersaing di Era Globalisasi, Ilmu Pengetahuan Teknologi, Kreativitas,
                    Efisien Dalam Melakukan Pekerjaan</span>
                <div class="col-md-4 mb-3">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/lab/labb-1.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="lab 1">
                </div>
                <div class="col-md-4 mb-3">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/lab/labb-2.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="lab 2">
                </div>

                <div class="col-md-4 mb-3">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/lab/labb-3.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="lab 3">
                </div>

                <div class="col-md-4 mb-3">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/lab/labb-4.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="lab 4">
                </div>

                <div class="col-md-4 mb-3">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/lab/labb-5.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="lab 5">
                </div>
            </div> {{-- END ROW --}}
        </div>
    </div>
</section>

@include('layouts.footer')
