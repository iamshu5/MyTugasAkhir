@include('layouts.admin-layouts.header', ['title' => 'Data Alumni'])

{{-- ========== Table Data Alumni ==========
--}}
<section id="table-alumni">
    <div class="container-fluid">
        <div class="d-flex">
            <a href="{{ url('/admin/alumni/data-alumni') }}">refresh <i class="fas fa-sync-alt"></i></a>
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <form class="form-inline d-sm-inline-block">
                <input class="form-control mr-sm-2 btn-sm mx-auto" name="search_alumni" type="search"
                    placeholder="Cari Data Alumni" aria-label="Search" value="{{ request()->search_alumni ?? '' }}">
                <button class="btn btn-outline-primary my-2 my-sm-0 btn-sm" type="submit"><i
                        class="fas fa-search"></i></button>
            </form>
        </div> {{-- Form Pencarian --}}

        <div class="d-flex justify-content-end">
            <a href="{{ url('/alumniexportpdf') }}" class="btn btn-secondary btn-sm mb-3"><i
                class="fas fa-file-pdf"></i> Export PDF</a>
            <a href="{{ url('/alumniexportexcel') }}" class="btn btn-danger btn-sm mb-3 ml-2"><i
                class="fas fa-file-export"></i> Export Excel</a>
            <button type="button" class="btn btn-success btn-sm mb-3 ml-2" data-toggle="modal"
                data-target="#exampleModal"> <i class="fas fa-file-excel"></i>
                Import Excel
            </button>

            <!-- Modal Import Excel-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data Alumni</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('/alumniimportexcel') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Import Data Excel</label>
                                    <input type="file" name="alumniiimportexcel" class="form-control">
                                </div>
                                @error('alumniiimportexcel')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Import</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">TABEL DATA ALUMNI SMP ISLAM NURUL HIDAYAH</h6>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info shadow-sm" data-toggle="modal"
                        data-target="#ModalTambahAlumni">
                        <i class="fas fa-user-plus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">

                @if (session()->exists('alert'))
                <div class="alert alert-{{ session()->get('alert')['bg'] }} alert-dismissible fade show" role="alert">
                    {{ session()->get('alert')['message'] }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error )
                        {{ $error }}
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto Alumni</th>
                                <th>Nomor Induk Siswa</th>
                                <th>Nama Alumni</th>
                                <th>Tahun Lulus</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($alumni) == 0)
                            <tr>
                                <td colspan="6" class="text-center bg-gradient-danger text-white">
                                    Tidak ada Data yang dapat ditampilkan
                                </td>
                            </tr>
                            @endif

                            @foreach ($alumni as $index => $dataAlumni)
                            <tr>
                                <td>{{ $index + $alumni->firstItem() }}</td>
                                <td>
                                    <img height="80"
                                        src="{{ url("assets/admin/image/foto_alumni/{$dataAlumni->foto_alumni}") }}" alt="tidak ada foto Siswa Alumni">
                                </td>
                                <td>{{ $dataAlumni->nis }}</td>
                                <td>{{ $dataAlumni->nama_alumni }}</td>
                                <td>{{ $dataAlumni->tahun_lulus }}</td>
                                <td>

                                    <button class="btn btn-primary btn-sm rounded mb-1" data-toggle="modal"
                                        data-target="#ModalDetailAlumni{{ $index }}">
                                        <i class="fas fa-address-card"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm rounded mb-1" data-toggle="modal"
                                        data-target="#ModalEditAlumni{{ $index }}">
                                        <i class="fas fa-user-edit"></i></button>
                                    <button class="btn btn-danger btn-sm rounded mb-1 deleteAlumni"
                                        data-id-alumni="{{ $dataAlumni->id_alumni }}"
                                        data-nama-alumni="{{ $dataAlumni->nama_alumni }}"><i
                                            class="fas fa-trash"></i></button>
                                    {{-- <button class="btn btn-danger btn-sm rounded mb-1"
                                        onclick="confirmDelete('{{ url('admin/alumni/delete-alumni/' . $dataAlumni->id_alumni) }}')"><i
                                        class="fas fa-trash"></i></button> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    Total ada {{ $alumni->total() }} Data Alumni
                    <div class="d-flex justify-content-end">
                        {{ $alumni->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> {{-- End Data Tabel Alumni --}}

{{-- ========== Form Tambah Alumni ==========
--}}
<section id="form-tambah-alumni">
    <div class="modal fade" id="ModalTambahAlumni" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Form Tambah Alumni</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ url('admin/alumni/add-alumni') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-floating mb-3">
                            <label for="">Email*</label>
                            <input type="text" class="form-control" name="email" placeholder="example@gmail.com">
                            @error('email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Foto Alumni*</label>
                            <input type="file" class="form-control" name="foto_alumni">
                            @error('foto_alumni')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-floating mb-3">
                            <label for="">Nomor Induk Siswa*</label>
                            <input type="number" class="form-control" name="nis" placeholder="Nomor Induk Siswa">
                            @error('nis')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Nama Alumni*</label>
                            <input type="text" class="form-control" name="nama_alumni"
                                placeholder="Input Nama Siswa Alumni">
                            @error('nama_alumni')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Tahun Lulus*</label>
                            <select name="tahun_lulus" id="tahun_lulus" class="form-control">
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
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Sekolah Lanjutan*</label>
                            <select name="sekolah_lanjutan" id="sekolah_lanjutan" class="form-control">
                                <option value="" selected disabled>Pilih Jenis Sekolah Lanjutan</option>
                                <option value="SMA">SMA</option>
                                <option value="SMK">SMK</option>
                                <option value="MA">MA</option>
                                <option value="MAK">MAK</option>
                                <option value="PONDOK_PESANTREN">PONDOK PESANTREN</option>
                            </select>
                            @error('sekolah_lanjutan')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Nama Sekolah*</label>
                            <input type="text" class="form-control" name="nama_sekolah" placeholder="Nama Sekolah">
                            @error('nama_sekolah')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Jurusan Lanjutan*</label>
                            <input type="text" class="form-control" name="jurusan_sekolah"
                                placeholder="Jurusan Sekolah saat ini">
                            @error('jurusan_sekolah')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Alamat*</label>
                            <textarea class="form-control" name="alamat" placeholder="Alamat Rumah"></textarea>
                            @error('alamat')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Telepon*</label>
                            <input type="text" class="form-control" name="telepon"
                                placeholder="telepon ( WA / SELULER )">
                            @error('telepon')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm">Simpan Data Alumni <i
                                class="fa-solid fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> {{-- End Form TAmbah Alumni --}}


{{-- ========= Form Edit Alumni ============
--}}
@foreach ($alumni as $index => $dataAlumni)
<div class="modal fade" id="ModalEditAlumni{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Form Edit Alumni</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('admin/alumni/edit-alumni/' . $dataAlumni->id_alumni) }}" enctype="multipart/form-data"
                method="post">
                @csrf
                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <label for="">ID Alumni</label>
                        <input type="number" class="form-control" value="{{ $dataAlumni->id_alumni }}" readonly>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="example@gmail.com"
                            value="{{ $dataAlumni->email }}" required>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">Foto Siswa Alumni</label>
                        <input type="file" class="form-control" name="foto_alumni">
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">Nomor Induk Siswa</label>
                        <input type="number" class="form-control" name="nis" placeholder="Nomer Induk Siswa"
                            value="{{ $dataAlumni->nis }}" required>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">Nama Siswa Alumni</label>
                        <input type="text" class="form-control" name="nama_alumni" placeholder="Input Nama Siswa Alumni"
                            value="{{ $dataAlumni->nama_alumni }}" required>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">Tahun Lulus</label>
                        <select name="tahun_lulus" class="form-control" id="tahun_lulus">
                            <option value="2014" {{ $dataAlumni->tahun_lulus == '2014' ? 'selected' : '' }}>2014
                            </option>
                            <option value="2015" {{ $dataAlumni->tahun_lulus == '2015' ? 'selected' : '' }}>2015
                            </option>
                            <option value="2016" {{ $dataAlumni->tahun_lulus == '2016' ? 'selected' : '' }}>2016
                            </option>
                            <option value="2017" {{ $dataAlumni->tahun_lulus == '2017' ? 'selected' : '' }}>2017
                            </option>
                            <option value="2018" {{ $dataAlumni->tahun_lulus == '2018' ? 'selected' : '' }}>2018
                            </option>
                            <option value="2019" {{ $dataAlumni->tahun_lulus == '2019' ? 'selected' : '' }}>2019
                            </option>
                            <option value="2020" {{ $dataAlumni->tahun_lulus == '2020' ? 'selected' : '' }}>2020
                            </option>
                            <option value="2021" {{ $dataAlumni->tahun_lulus == '2021' ? 'selected' : '' }}>2021
                            </option>
                            <option value="2022" {{ $dataAlumni->tahun_lulus == '2022' ? 'selected' : '' }}>2022
                            </option>
                            <option value="2023" {{ $dataAlumni->tahun_lulus == '2023' ? 'selected' : '' }}>2023
                            </option>
                            <option value="2024" {{ $dataAlumni->tahun_lulus == '2024' ? 'selected' : '' }}>2024
                            </option>
                            <option value="2025" {{ $dataAlumni->tahun_lulus == '2025' ? 'selected' : '' }}>2025
                            </option>
                            <option value="2026" {{ $dataAlumni->tahun_lulus == '2026' ? 'selected' : '' }}>2026
                            </option>

                        </select>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">Sekolah Lanjutan</label>
                        <select name="sekolah_lanjutan" class="form-control" id="sekolah_lanjutan">
                            <option value="SMA" {{ $dataAlumni->sekolah_lanjutan == 'SMA' ? 'selected' : '' }}>
                                SMA
                            </option>
                            <option value="SMK" {{ $dataAlumni->sekolah_lanjutan == 'SMK' ? 'selected' : '' }}>
                                SMK
                            </option>
                            <option value="MA" {{ $dataAlumni->sekolah_lanjutan == 'MA' ? 'selected' : '' }}>
                                MA
                            </option>
                            <option value="MAK" {{ $dataAlumni->sekolah_lanjutan == 'MAK' ? 'selected' : '' }}>
                                MAK
                            </option>
                            <option value="PONDOK_PESANTREN"
                                {{ $dataAlumni->sekolah_lanjutan == 'PONDOK_PESANTREN' ? 'selected' : '' }}>PONDOK
                                PESANTREN
                            </option>
                        </select>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">Nama Sekolah</label>
                        <input type="text" class="form-control" name="nama_sekolah" placeholder="Nama Sekolah"
                            value="{{ $dataAlumni->nama_sekolah }}" required>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">Jurusan Sekolah</label>
                        <input type="text" class="form-control" name="jurusan_sekolah"
                            placeholder="Input Jurusan Sekolah" value="{{ $dataAlumni->jurusan_sekolah }}" required>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">Alamat</label>
                        <textarea class="form-control" name="alamat" placeholder="Alamat"
                            required>{{ $dataAlumni->alamat }}</textarea>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">Telepon</label>
                        <input class="form-control" name="telepon" placeholder="Telepon ( WA / SELULER )"
                            value="{{ $dataAlumni->telepon }}" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan Perubahan <i
                            class="fa-solid fa-check"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach


{{-- ========== DETAIL ALUMNI ========
    --}}
@foreach ($alumni as $index => $dataAlumni)
<div class="modal fade shadow" id="ModalDetailAlumni{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title text-gray-400" id="exampleModalLabel">Detail Alumni</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="card text-white bg-primary mb-3 shadow-lg" style="width: 900px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ url("assets/admin/image/foto_alumni/{$dataAlumni->foto_alumni}") }}"
                                    class="img-fluid rounded-3" alt="tidak ada foto Siswa Alumni">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title mb-2" style="text-transform: uppercase">Nis :
                                        {{ $dataAlumni->nis }}</h5>
                                    <h5 class="card-title mb-2" style="text-transform: uppercase">Nama Alumni :
                                        {{ $dataAlumni->nama_alumni }}</h5>
                                    <h6 class="card-text mb-2" style="text-transform: uppercase">Tahun Lulus :
                                        {{ $dataAlumni->tahun_lulus }}</h6>
                                    <h6 class="card-text mb-2" style="text-transform: uppercase">Sekolah Lanjutan :
                                        {{ $dataAlumni->sekolah_lanjutan }}
                                    </h6>
                                    <h6 class="card-text mb-2" style="text-transform: uppercase">Nama Sekolah :
                                        {{ $dataAlumni->nama_sekolah }}</h6>
                                    <h6 class="card-text mb-2" style="text-transform: uppercase">Jurusan Sekolah :
                                        {{ $dataAlumni->jurusan_sekolah }}</h6>
                                    <h6 class="card-text mb-2" style="text-transform: uppercase">Alamat :
                                        {{ $dataAlumni->alamat }}</h6>
                                    <h6 class="card-text" style="text-transform: uppercase">Telepon :
                                        {{ $dataAlumni->telepon }}</h6>

                                    <h6 class="card-text">Email :
                                        {{ $dataAlumni->email }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> {{-- End Modal Body --}}
        </div>
    </div>
</div>
@endforeach
@include('layouts.admin-layouts.footer')
