@include('layouts.admin-layouts.header', ['title' => 'Data Guru'])

{{-- ========== Table Data guru ==========
--}}
<section id="table-guru">
    <div class="container-fluid">
        <div class="d-flex">
            <a href="{{ url('/admin/guru/data-guru') }}">refresh <i class="fas fa-sync-alt"></i></a>
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <form class="form-inline d-sm-inline-block">
                <input class="form-control mr-sm-2 btn-sm mx-auto" name="search_guru" type="search"
                    placeholder="Cari Data Guru" aria-label="Search" value="{{ request()->search_guru ?? '' }}">
                <button class="btn btn-outline-primary my-2 my-sm-0 btn-sm" type="submit"><i
                        class="fas fa-search"></i></button>
            </form>
        </div> {{-- Form Pencarian Guru --}}

        {{-- IMPORT EXPORT DATA GURU --}}
        <div class="d-flex justify-content-end">
            <a href="{{ url('/guruexportpdf') }}" class="btn btn-secondary btn-sm mb-3"><i class="fas fa-file-pdf"></i>
                Export PDF</a>
            <a href="{{ url('/guruexportexcel') }}" class="btn btn-danger btn-sm mb-3 ml-2"><i
                    class="fas fa-file-export"></i> Export Excel</a>
            <button type="button" class="btn btn-success btn-sm mb-3 ml-2" data-toggle="modal"
                data-target="#exampleModal">
                <i class="fas fa-file-excel"></i> Import Excel
            </button>

            <!-- Modal Import Excel-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data Excel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('/guruimportexcel') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Import Data Excel</label>
                                    <input type="file" name="guruuimportexcel" class="form-control">
                                </div>
                                @error('guruuimportexcel')
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

        {{-- TABLE GURU --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">TABEL DATA GURU SMP ISLAM NURUL HIDAYAH</h6>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info shadow-sm" data-toggle="modal"
                        data-target="#ModalTambahGuru">
                        <i class="fas fa-user-plus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">

                {{-- Alert --}}
                @if (session()->exists('alert'))
                <div class="alert alert-{{ session()->get('alert') ['bg'] }} alert-dismissible fade show" role="alert">
                    {{ session()->get('alert') ['message'] }}
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
                                <th>Foto Guru</th>
                                <th>Nomor Induk Guru</th>
                                <th>Nama Guru</th>
                                <th>Mapel</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($guru)==0)
                            <tr>
                                <td colspan="6" class="text-center bg-gradient-danger text-white">
                                    Tidak ada Data yang dapat ditampilkan
                                </td>
                            </tr>
                            @endif

                            @foreach ($guru as $index => $data)
                            <tr>
                                <td>{{ $index + $guru->firstItem() }}</td>
                                <td>
                                    <img height="80" src="{{ url("assets/admin/image/foto_guru/{$data->foto_guru}") }}"
                                        alt="Tidak ada Foto Guru">
                                </td>
                                <td>{{ $data->nig }}</td>
                                <td>{{ $data->nama_guru }}</td>
                                <td>{{ $data->mapel }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm rounded mb-1" data-toggle="modal"
                                        data-target="#ModalDetailGuru{{ $index }}"><i
                                            class="fas fa-address-card"></i></button>
                                    <button class="btn btn-warning btn-sm rounded mb-1" data-toggle="modal"
                                        data-target="#ModalEditGuru{{ $index }}">
                                        <i class="fas fa-user-edit"></i></button>
                                    <button class="btn btn-danger btn-sm rounded mb-1 deleteGuru"
                                        data-id="{{ $data->id_guru }}" data-nama="{{ $data->nama_guru }}"><i
                                            class="fas fa-trash"></i></button>

                                    {{-- <button class="btn btn-danger btn-sm rounded mb-1 delete"
                                        onclick="confirmDelete('{{ url('admin/guru/delete-guru/'. $data->id_guru) }}')"><i
                                        class="fas fa-trash"></i></button> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    Total ada {{ $guru->total() }} Data Guru
                    <div class="d-flex justify-content-end">
                        {{ $guru->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section> {{-- End Data Tabel Guru --}}

{{-- ========== Form Tambah Guru ==========
--}}
<section id="form-tambah-guru">
    <div class="modal fade" id="ModalTambahGuru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Form Tambah Guru</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ url('admin/guru/add-guru') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-floating mb-3">
                            <label for="">Foto Guru*</label>
                            <input type="file" class="form-control" name="foto_guru">
                            @error('foto_guru')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Nomor Induk Guru*</label>
                            <input type="number" class="form-control" name="nig" placeholder="Input Nomer Induk Guru">
                            @error('nig')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Nama Guru*</label>
                            <input type="text" class="form-control" name="nama_guru" placeholder="Input Nama Guru">
                            @error('nama_guru')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Mapel*</label>
                            <input type="text" class="form-control" name="mapel" placeholder="Input Nama Guru">
                            @error('mapel')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Gelar*</label>
                            <input type="text" class="form-control" name="gelar" placeholder="Gelar S1, S2">
                            @error('gelar')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Tahun Mulai Mengajar*</label>
                            <input type="text" class="form-control" name="mengajar_sejak" placeholder="Sejak">
                            @error('mengajar_sejak')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Tanggal Lahir*</label>
                            <input type="date" class="form-control" name="tgl_lahir" placeholder="Sejak">
                            @error('tgl_lahir')
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
                            <label for="">telepon*</label>
                            <input type="text" class="form-control" name="telepon"
                                placeholder="Telepon ( WA / SELULER )">
                            @error('telepon')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm">Simpan Data Guru <i
                                class="fa-solid fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> {{-- End Form TAmbah Guru --}}



{{-- ========= Form Edit Guru ============
--}}
@foreach($guru as $index => $data)
<div class="modal fade" id="ModalEditGuru{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Form Edit Guru</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('admin/guru/edit-guru/' . $data->id_guru) }}" enctype="multipart/form-data"
                method="post">
                @csrf
                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <label for="">ID Guru</label>
                        <input type="number" class="form-control" value="{{ $data->id_guru }}" readonly>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">Foto Guru</label>
                        <input type="file" class="form-control" name="foto_guru">
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">Nomor Induk Guru</label>
                        <input type="number" class="form-control" name="nig" placeholder="Harap isi Nomor Induk Guru"
                            value="{{ $data->nig }}" required>
                        {{-- @error('nig')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror --}}
                </div>

                <div class="form-floating mb-3">
                    <label for="">Nama Guru</label>
                    <input type="text" class="form-control" name="nama_guru" placeholder="Harap isi nama guru"
                        value="{{ $data->nama_guru }}" required>
                    {{-- @error('nama_guru')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror --}}
        </div>

        <div class="form-floating mb-3">
            <label for="">Mapel</label>
            <input type="text" class="form-control" name="mapel" placeholder="Harap isi Mata Pelajaran"
                value="{{ $data->mapel }}" required>
            {{-- @error('mapel')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror --}}
    </div>

    <div class="form-floating mb-3">
        <label for="">Gelar</label>
        <input type="text" class="form-control" name="gelar" placeholder="Harap isi Gelar (S1, S2)"
            value="{{ $data->gelar }}" required>
        {{-- @error('gelar')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror --}}
</div>

<div class="form-floating mb-3">
    <label for="">Tahun Mulai Mengajar*</label>
    <input type="text" class="form-control" name="mengajar_sejak" placeholder="Harap isi mengajar sejak"
        value="{{ $data->mengajar_sejak }}" required>
    {{-- @error('mengajar_sejak')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
@enderror --}}
</div>

<div class="form-floating mb-3">
    <label for="">Tanggal Lahir*</label>
    <input type="date" class="form-control" name="tgl_lahir" value="{{ $data->tgl_lahir }}"></input>
    {{-- @error('alamat')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
@enderror --}}
</div>

<div class="form-floating mb-3">
    <label for="">Alamat*</label>
    <textarea class="form-control" name="alamat" placeholder="Harap isi Alamat Rumah"
        required>{{ $data->alamat }}</textarea>
    {{-- @error('alamat')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
@enderror --}}
</div>

<div class="form-floating mb-3">
    <label for="">Telepon*</label>
    <input type="text" class="form-control" name="telepon" placeholder="Harap isi Telepon ( WA / SELULER )"
        value="{{ $data->telepon }}" required>
    {{-- @error('telepon')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
@enderror --}}
</div>

</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-success">Simpan Perubahan <i class="fa-solid fa-check"></i></button>
</div>
</form>
</div>
</div>
</div>
@endforeach


{{-- ========== DETAIL Guru ========
    --}}
@foreach($guru as $index => $data)
<div class="modal fade" id="ModalDetailGuru{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title text-gray-400">Detail Guru</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="card" style="width: 30rem;">
                        <img src="{{ url("assets/admin/image/foto_guru/{$data->foto_guru}") }}"
                            class="card-img-top rounded-3" alt="tidak ada foto guru" height="410px" width="540px">

                        <div class="card-body">
                            <h5 class="card-title" style="text-transform: uppercase">Nomor Induk Guru : {{ $data->nig }}
                            </h5>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title" style="text-transform: uppercase">Nama Guru : {{ $data->nama_guru }}
                            </h5>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="text-transform: uppercase">Mapel : {{ $data->mapel }}
                            </li>
                            <li class="list-group-item" style="text-transform: uppercase">Gelar : {{ $data->gelar }}
                            </li>
                            <li class="list-group-item" style="text-transform: uppercase">Mengajar Sejak Tahun :
                                {{ $data->mengajar_sejak }}</li>
                            <li class="list-group-item" style="text-transform: uppercase">Tanggal Lahir :
                                {{ $data->tgl_lahir }}
                            </li>
                            <li class="list-group-item" style="text-transform: uppercase">Alamat : {{ $data->alamat }}
                            </li>
                            <li class="list-group-item" style="text-transform: uppercase">Telepon : {{ $data->telepon }}
                            </li>
                        </ul>

                    </div>
                </div>
            </div> {{-- End Modal Body --}}
        </div>
    </div>
</div>
@endforeach

@include('layouts.admin-layouts.footer')
