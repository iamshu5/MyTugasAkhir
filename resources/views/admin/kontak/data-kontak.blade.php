@include('layouts.admin-layouts.header', ['title' => 'Kontak'])

<section id="table-kontak">
    <div class="container-fluid">
        <div class="d-flex">
            <a href="{{ url('/admin/kontak/data-kontak') }}">refresh <i class="fas fa-sync-alt"></i></a>
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <form class="form-inline d-sm-inline-block">
                <input class="form-control mr-sm-2 btn-sm mx-auto" name="search_kontak" type="search"
                    placeholder="Cari Data kontak" aria-label="Search" value="{{ request()->search_kontak ?? '' }}">
                <button class="btn btn-outline-primary my-2 my-sm-0 btn-sm" type="submit"><i
                        class="fas fa-search"></i></button>
            </form>
        </div> {{-- Form Pencarian kontak --}}

        {{-- TABLE kontak --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">TABEL DATA KONTAK MASUK SMP ISLAM NURUL HIDAYAH</h6>
                <div class="d-flex justify-content-end">
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
                                <th>NAMA</th>
                                <th>EMAIL</th>
                                <th>PESAN</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($kontak)==0)
                            <tr>
                                <td colspan="6" class="text-center bg-gradient-danger text-white">
                                    Tidak ada Data yang dapat ditampilkan
                                </td>
                            </tr>
                            @endif

                            @foreach ($kontak as $index => $data)
                            <tr>
                                <td>{{ $index + $kontak->firstItem() }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->pesan }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm rounded mb-1" data-toggle="modal"
                                        data-target="#ModalDetailKontak{{ $index }}"><i
                                            class="fas fa-address-card"></i></button>
                                    <button class="btn btn-danger btn-sm rounded mb-1 deleteKontak"
                                        data-id-kontak="{{ $data->id_kontak }}" data-nama="{{ $data->nama_kontak }}"><i
                                            class="fas fa-trash"></i></button>

                                    {{-- <button class="btn btn-danger btn-sm rounded mb-1 delete"
                                        onclick="confirmDelete('{{ url('admin/kontak/delete-kontak/'. $data->id_kontak) }}')"><i
                                        class="fas fa-trash"></i></button> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    Total ada {{ $kontak->total() }} Data Kontak
                    <div class="d-flex justify-content-end">
                        {{ $kontak->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section> {{-- End Data Tabel kontak --}}


{{-- ========== DETAIL KONTAK ========
    --}}
    @foreach($kontak as $index => $data)
    <div class="modal fade" id="ModalDetailKontak{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title text-gray-400">Detail Kontak</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="card" style="width: 30rem;">

                            {{-- <div class="card-body">
                                <h5 class="card-title" style="text-transform: uppercase">ID_DB : {{ $data->id_kontak }}
                                </h5>
                            </div> --}}

                            <div class="card-body">
                                <h5 class="card-title" style="text-transform: uppercase">Nama : {{ $data->nama }}
                                </h5>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">EMAIL : {{ $data->email }}
                                </h5>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title" style="text-transform: uppercase">Masukan : {{ $data->pesan }}
                                </h5>
                            </div>

                        </div>
                    </div>
                </div> {{-- End Modal Body --}}
            </div>
        </div>
    </div>
    @endforeach
@include('layouts.admin-layouts.footer')
