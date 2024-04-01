@extends('frontend.main')
@section('isifrontend')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>About</h2>
        <ol>
          <li><a href="{{asset('/')}}">Home</a></li>
          <li>About</li>
        </ol>
      </div>

    </div>
</section>
<br>
<br>
    <main id="main">

        <!-- ======= About Section ======= -->
        @foreach ($tentang as $ten)
            <section id="about" class="about">
                <div class="container">

                    <div class="row content">
                        <div class="col-lg-6">
                            <h2>{{ $ten->judul }}</h2>
                            <img src="{{ asset('storage/' . $ten->foto) }}" width="600" height="400">
                            <h3></h3>
                        </div>

                        <div class="col-lg-6 pt-4 pt-lg-0">
                            <p>
                                {!! html_entity_decode($ten->deskripsi) !!}
                            </p>
                        </div>
                    </div>

                </div>

            </section>
        @endforeach
        <!-- End About Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients section-bg">
            <div class="container">

                <div class="row">

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
                    </div>

                </div>

            </div>
        </section><!-- End Clients Section -->
        <br>
        <center>
            <h3>DAFTAR PELAYANAN</h3>
        </center>
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="row">

                    @foreach ($pelayanan as $pel)
                        <div class="col-md-6 mt-4 mt-md-0">
                            <div class="icon-box">
                                <i class="bi bi-card-checklist"></i>
                                <h4><a href="#">{{ $pel->namaperawatan }}</a></h4>
                                <p>{!! html_entity_decode($pel->deskripsi) !!}</p>
                            </div>
                        </div>
                    @endforeach



                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Portfolio Section ======= -->
        <center>
            <h3>TENAGA PROFESIONAL KAMI</h3>
        </center>
        <section id="portfolio" class="portfolio">
            <div class="container">



                <div class="row portfolio-container">
                    @foreach($user as $us)

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('storage/'.$us->foto) }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{$us->name}}</h4>
                                <p><?php
                                  
                                                        $data=DB::table('kategori_perawatan')->where('id',$us->idperawatan)->first();
                                                        echo $data->namaperawatan; 
                                                                                                 
                                                ?>
                                </p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" class="portfolio-details-lightbox"
                                        data-glightbox="type: external" title="Portfolio Details"><i
                                            class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach






                </div>

            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->
@endsection
