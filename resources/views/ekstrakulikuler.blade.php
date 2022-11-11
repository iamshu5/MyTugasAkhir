@include('layouts.header', ['title' => 'Kegiatan Sekolah'])

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ekstrakulikuler</li>
    </ol>
</nav>

<section id="ekstrakulikuler" class="ekstrakulikuler">
    <div class="container" data-aos="fade-down">

        <div class="container-fluid">
            <div class="section-header pt-1">
                <h2>Ekstrakulikuler</h2>
                <p>kegiatan tambahan yang dilakukan di luar jam pelajaran yang dilakukan baik di sekolah atau di luar
                    sekolah dengan tujuan untuk mendapatkan tambahan pengetahuan, keterampilan dan wawasan serta
                    membantu membentuk karakter peserta didik sesuai dengan minat dan bakat masing-masing. </p>
            </div>

            {{-- TAHFIDZ --}}
            <div class="row justify-content-center">
                <hr>
                <h5 class="text-center mb-3 fw-bold">PRAMUKA</h5>
                <p class="text-center mb-3">Kegiatan Pramuka adalah eksul wajib disekolah, bertujuan untuk membentuk
                    setiap pramuka agar memiliki kepribadian yang beriman, bertakwa, berakhlak mulia, berjiwa patriotik,
                    taat hukum, disiplin, menjunjung tinggi nilai-nilai luhur bangsa, dan memiliki kecakapan hidup
                    sebagai kader bangsa dalam menjaga dan membangun Negara Kesatuan Republik Indonesia.</p>
                <div class="col-md-4 mb-3">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/pramuka/pramuka-1.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="pramuka-1">
                </div>

                <div class="col-md-4 mb-4">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/pramuka/pramuka-2.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="pramuka-2">
                </div>

                <div class="col-md-4 mb-4">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/pramuka/pramuka-3.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="pramuka-3">
                </div>

                <hr>
                <h5 class="text-center mb-3 mt-3 fw-bold mt-4">FUTSAL</h5>
                <p class="text-center mb-3">Bertujuan untuk melatih kecepatan berpikir dan mengambil keputusan yang tepat, Kekompakan Sesama Tim</p>
                <div class="col-md-4 mb-3">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/futsal/futsal-1.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="futsal 1">
                </div>
                <div class="col-md-4 mb-3">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/futsal/futsal-2.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="futsal 2">
                </div>

                <div class="col-md-4 mb-3">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/futsal/futsal-3.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="futsal 3">
                </div>

                <hr>
                <h5 class="text-center mb-3 mt-3 fw-bold mt-4">BADMINTON</h5>
                <p class="text-center mb-3">Bertujuan untuk melatih ketangkasan, pertahanan lawan serta kelincahan pemain. </p>
                <div class="col-md-4 mb-3">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/badminton/badminton-1.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="badminton 1">
                </div>
                <div class="col-md-4 mb-3">
                    <img src="{{ url('assets/umum/img/kegiatan-sekolah/badminton/badminton-2.jpg') }}"
                        class="img-fluid rounded-3 shadow" alt="badminton 2">
                </div>
            </div> {{-- END ROW --}}
        </div>
    </div>
</section>

@include('layouts.footer')
