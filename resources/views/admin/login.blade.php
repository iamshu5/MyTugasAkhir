<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page | SMPI NH</title>

    <link rel="icon" type="image/x-icon" href="{{ url('assets/admin/image/logo_nh.jpg') }}">
    {{-- Kit FontAwesome --}}
    <link rel="stylesheet" href="{{ url('assets/admin/js/7fdd60d3a4.js') }}">
    <link href="{{ url('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- CSS Sb Admin-->
    <link href="{{ url('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-success">

    {{-- Form Login --}}
    <section id="login">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <img src="{{ url('assets/umum/img/navbar-logo.jpg') }}" alt="Banner SMP ISLAM NURUL HIDAYAH"
                    class="shadow rounded-3">
                </div>
                @if (session()->exists('alert'))
                <div class="alert alert-{{ session()->get('alert') ['bg'] }} alert-dismissible fade show" role="alert">
                    {{ session()->get('alert') ['message'] }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-9 col-md-9">
                    <div class="card o-hidden shadow-lg my-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 d-none d-lg-block">
                                    <img src="{{ url('assets/umum/img/halaman-utama2.jpg') }}" widht="1080px"
                                        height="510px" alt="Halaman Utama" class="rounded-2">
                                </div>

                                <div class="col-lg-6 mt-5">
                                    <div class="p-6">
                                        <div class="text-center text-success mb-5">
                                            <h1>Selamat Datang!</h1>
                                        </div>
                                        <form class="" method="POST">
                                            @csrf
                                            <div class="form-group text-success">
                                                <label for="">
                                                    <h6>USERNAME</h6>
                                                </label>
                                                <input type="text" name="username" class="form-control shadow"
                                                    placeholder="Masukan Username" required>
                                            </div>

                                            <div class="form-group text-success">
                                                <label for="">
                                                    <h6>PASSWORD</h6>
                                                </label>
                                                <input type="password" name="password" class="form-control shadow"
                                                    placeholder="Masukan Password" required>
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-success shadow-lg" type="submit"
                                                    name="login">LOGIN</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> {{-- End Form Login --}}
</body>

</html>
