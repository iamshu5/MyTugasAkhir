<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title }} • SMP ISLAM NURUL HIDAYAH</title>
  <meta content="" name="description">
  <meta content="SMP ISLAM NURUL HIDAYAH" name="">

  <!-- Favicons -->
  <link href="{{ url('assets/umum/img/logo-smpinh.png') }}" rel="icon">
  <link href="{{ url('assets/umum/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('assets/umum/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/umum/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('assets/umum/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ url('assets/umum/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/umum/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <style>
    @media (min-width: 1280px) {
        .navbar a.active:before, .navbar li.active > a:before, .navbar .active:before {
            visibility: visible;
            width: 100%;
        }
    }
  </style>

  <!-- Template Main CSS File -->
  <link href="{{ url('assets/umum/css/main.css?v=1') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="">humas.smp@perguruan-nh.sch.id</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>(021) 74708223</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="https://web.facebook.com/people/Smp-Islam-Nurul-Hidayah/100063131946409/" class="facebook"><i
            class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/nuday.jhs/" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.youtube.com/channel/UC9pn5P8nKalypYCIrevVjhA" class="youtube"><i
            class="bi bi-youtube"></i></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <img src="{{ url('assets/umum/img/navbar-logo.jpg') }}" alt="Banner SMP ISLAM NURUL HIDAYAH" class="shadow"><!-- Banner Logo -->
      </a>
      <nav id="navbar" class="navbar"><!-- Navbar -->
        <ul>
          <li class="{{ $title === 'Home' ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
          <li class="{{ $title === 'Tentang Kami' ? 'active' : '' }}"><a href="{{ url('/tentang-kami') }}">Tentang Kami</a></li>
          <li class="dropdown {{ $title === 'Galeri' ? 'active' : '' }}"><a href="#"><span>Galeri</span> <i
                class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li class="{{ $title === 'Kegiatan Sekolah' ? 'active' : '' }}"><a href="{{ url('/kegiatan-sekolah') }}">Kegiatan Sekolah</a></li>
              <li><a href="{{ url('/ekstrakulikuler') }}">Ekstrakulikuler</a></li>
            </ul>
          </li>
          <li class="{{ $title === 'Kontak' ? 'active' : '' }}"><a href="{{ url('/kontak') }}">Kontak</a></li>
        </ul>
      </nav><!-- End navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

    <body>
        <main id="main">
