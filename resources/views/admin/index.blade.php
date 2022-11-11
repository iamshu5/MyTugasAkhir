@include('layouts.admin-layouts.header', ['title' => 'Homepage Admin'])
<div class="container pt-5">
    @if (session()->exists('alert'))
    <div class="alert alert-{{ session()->get('alert') ['bg'] }} alert-dismissible fade show" role="alert">
        {{ session()->get('alert') ['message'] }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card shadow-sm">
        <div class="row">
            <div class="col md-4">
                <img src="{{ url('assets/admin/image/logo-smpinh.png') }}" class="img-fluid rounded mx-auto" width="200"
                    height="100" alt="LOGO SMP ISLAM NURUL HIDAYAH">
            </div>
            <div class="col-md-9">
                <h3 class="card-title mt-5 font-weight-bold justify-content-center">Selamat Datang!
                    {{ auth()->user()->nama_user }}</h3>
                <p>Sekolah Menengah Pertama Islam Nurul Hidayah, Sawangan Kecamatan Bojong Sari Kota Depok.</p>
            </div>
        </div>
    </div>
</div>
@include('layouts.admin-layouts.footer')
