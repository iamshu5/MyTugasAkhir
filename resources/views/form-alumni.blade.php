@include('layouts.header', ['title' => 'Form Alumni'])


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Form Alumni</li>
    </ol>
</nav>

<section id="form-alumni">
    <div class="container" style="background-image: {{ url('assets/umum/img/halaman-utama.jpg') }}">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                    <h5 class="text-center mb-3">FORM DATA ALUMNI</h5>
                    <h6 class="text-center">Silahkan isi data melalui Form dibawah ini.</h6>
                    <hr>
                <div class="card">
                    <img src="{{ url('assets/umum/img/halaman-utama.jpg') }}" height="300px" class="rounded-3 shadow"
                        alt="">
                    <div class="card-body shadow">
                        @if (session()->exists('alert'))
                        <div class="alert alert-{{ session()->get('alert') ['bg'] }} alert-dismissible fade show"
                            role="alert">
                            {{ session()->get('alert') ['message'] }}
                        </div>
                        @endif

                        <form action="{{ url('/form-alumni-proses') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="" class="mb-2">Foto Alumni</label>
                                <input type="file" class="form-control" name="foto_alumni">
                                @error('foto_alumni')
                                <div class="alert alert-danger mt-2"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="mb-2">Email</label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Harap isi email Anda">
                                @error('email')
                                <div class="alert alert-danger mt-2"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="mb-2">NIS (Nomor Induk Siswa)</label>
                                <input type="number" class="form-control" name="nis" placeholder="Nomor Induk Siswa terdapat di Raport">
                                @error('nis')
                                <div class="alert alert-danger mt-2"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="mb-2">Nama Alumni</label>
                                <input type="text" class="form-control" name="nama_alumni" placeholder="Nama Alumni">
                                @error('nama_alumni')
                                <div class="alert alert-danger mt-2"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="mb-2" class="mb-2">Tahun Lulus</label>
                                <select name="tahun_lulus" id="tahun_lulus" class="form-control ">
                                    <option value="" selected disabled>Pilih Tahun Lulus</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                </select>
                                @error('tahun_lulus')
                                <div class="alert alert-danger mt-2"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="mb-2" class="mb-2">Sekolah Lanjutan</label>
                                <select name="sekolah_lanjutan" class="form-control ">
                                    <option value="" selected disabled>Pilih Sekolah Lanjutan</option>
                                    <option value="SMA">SMA</option>
                                    <option value="SMK">SMK</option>
                                    <option value="MA">MA</option>
                                    <option value="MAK">MAK</option>
                                    <option value="PONDOK_PESANTREN">PONDOK_PESANTREN</option>
                                </select>
                                @error('sekolah_lanjutan')
                                <div class="alert alert-danger mt-2"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-2" class="mb-2">Nama Sekolah*</label>
                                <input type="text" class="form-control" name="nama_sekolah" placeholder="Nama Sekolah">
                                @error('nama_sekolah')
                                <div class="alert alert-danger mt-2"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="mb-2" class="mb-2">Jurusan Lanjutan*</label>
                                <input type="text" class="form-control" name="jurusan_sekolah"
                                    placeholder="Contoh SMA: IPA / IPS, SMK: Multimedia, dll.">
                                @error('jurusan_sekolah')
                                <div class="alert alert-danger mt-2"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="mb-2" class="mb-2">Alamat*</label>
                                <textarea class="form-control" name="alamat" placeholder="Alamat Rumah"></textarea>
                                @error('alamat')
                                <div class="alert alert-danger mt-2"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="mb-2" class="mb-2">Telepon*</label>
                                <input type="text" class="form-control" name="telepon"
                                    placeholder="08xxx ( WA / SELULER )">
                                @error('telepon')
                                <div class="alert alert-danger mt-2"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success text-white shadow-sm mt-3 formAlumni" id="formAlumni">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
