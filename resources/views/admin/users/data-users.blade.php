@include('layouts.admin-layouts.header', ['title' => 'Data Users'])

<section class="table-users">
    <div class="container-fluid">
        <div class="mb-3 d-flex justify-content-end">
            <form class="form-inline my-2 my-md-0 mw-100">
                <input class="form-control mr-sm-2 btn-sm mx-auto" name="search_users" type="search"
                    placeholder="Cari Data User" aria-label="Search" value="{{ request()->search_users ?? '' }}">
                <button class="btn btn-outline-info my-2 my-sm-0 btn-sm" type="submit"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div> {{-- Form Pencarian --}}

        <!-- Table Users -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DATA USER</h6>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalTambahUser">
                        <i class="fa-solid fa-user-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                {{-- Alert jika data Sukses --}}
                @if(session()->exists('alert'))
                <div class="alert alert-{{ session()->get('alert') ['bg'] }} alert-dismissible fade show" role="alert">
                    {{ session()->get('alert') ['message'] }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-light" id="dataTable" width="100%"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Telepon</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($users) == 0)
                            <tr>
                                <td colspan="6" class="text-center bg-gradient-danger text-white">
                                    Tidak ada Data.
                                </td>
                            </tr>
                            @endif

                            @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img height="80" src="{{ url("assets/admin/image/users/{$user->foto}") }}">
                                </td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->password }}</td>
                                <td>{{ $user->telepon }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm rounded mb-1" data-toggle="modal"
                                        data-target="#ModalEditUser{{ $index }}"><i
                                            class="fas fa-user-edit"></i></button>
                                    <button class="btn btn-danger btn-sm rounded mb-1 deleteUser"
                                        data-id-users="{{ $user->id_user }}" data-nama-users="{{ $user->nama_user }}"><i
                                            class="fas fa-trash"></i></button>
                                    {{-- <button class="btn btn-danger btn-sm rounded mb-1"
                                        onclick="confirmDelete('{{ url('admin/users/delete-users/' . $user->id_user) }}')"><i
                                        class="fa-solid fa-trash"></i></button> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========== Modal form tambah User  ==========
--}}
<div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Form Tambah User</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url('admin/users/add-users') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <label for="">FOTO USER*</label>
                        <input type="file" class="form-control" name="foto">
                        @error('foto')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">USERNAME*</label>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                        @error('username')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">PASSWORD*</label>
                        <input type="text" class="form-control" name="password" placeholder="Password">
                        @error('password')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">NAMA USER*</label>
                        <input type="text" class="form-control" name="nama_user" placeholder="Nama Users">
                        @error('nama_user')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">TELEPON (WA) / (SELULER)*</label>
                        <input type="text" min="0" class="form-control" name="telepon" placeholder="Telepon">
                        @error('telepon')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan User <i
                            class="fa-solid fa-user-plus"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ========== Modal Edit User  ==========
--}}
@foreach($users as $index => $user)
<div class="modal fade" id="ModalEditUser{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Form Edit User</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('admin/users/edit-users/' . $user->id_user) }}" enctype="multipart/form-data"
                method="post">
                @csrf

                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <label for="">FOTO USER*</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">USERNAME*</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                            value="{{ $user->username }}" required>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">PASSWORD*</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">NAMA USER*</label>
                        <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Nama Users"
                            value="{{ $user->nama_user }}" required>
                    </div>

                    <div class="form-floating mb-3">
                        <label for="">TELEPON (WA) / (SELULER)*</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon"
                            value="{{ $user->telepon }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success shadow">Simpan Perubahan <i
                            class="fa-solid fa-check"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@include('layouts.admin-layouts.footer')
