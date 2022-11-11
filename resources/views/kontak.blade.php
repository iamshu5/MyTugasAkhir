@include('layouts.header', ['title' => 'Kontak'])

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Contact</h2>
            <p>Jika ada yang ingin ditanyakan/memberikan masukan, Anda dapat menghubungi kami melalui form dibawah ini
            </p>
        </div>
        @if (session()->exists('alert'))
        <div class="alert alert-{{ session()->get('alert')['bg'] }} alert-dismissible fade show" role="alert">
            {{ session()->get('alert')['message'] }}
        </div>
        @endif
        <div class="row gx-lg-0 gy-4">

            <div class="col-lg-4">

                <div class="info-container d-flex flex-column align-items-center justify-content-center">
                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4>ALAMAT:</h4>
                            <p>Jl. Reni jaya Timur 6A, Pd. Petir, Bojong Sari - Kota Depok</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>EMAIL:</h4>
                            <p>humas.smp@perguruan-nh.sch.id</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>TELEPON:</h4>
                            <p>(021) 74708223</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-clock flex-shrink-0"></i>
                        <div>
                            <h4>JAM KERJA:</h4>
                            <p>Senin-Kamis: 08:00 - 14:00</p>
                            <p>Jumat-Sabtu: 08:00 - 13:00</p>
                        </div>
                    </div><!-- End Info Item -->
                </div>

            </div>
            {{-- //class="php-email-form" --}}
            <div class="col-lg-6">
                <form action="{{ url('/kontak-proses')}}" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-6 form-group ml-5">
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
                            @error('nama')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group ml-5">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            @error('email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3 ml-3">
                            <textarea class="form-control" name="pesan" placeholder="Isi Masukan dari Anda"></textarea>
                            @error('pesan')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div> --}}
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success mt-4">Send Message</button>
                    </div>
                </form>
            </div> {{-- End Contact Form --}}

        </div>

    </div>
</section><!-- End Contact Section -->

@include('layouts.footer')
