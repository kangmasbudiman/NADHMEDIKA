@extends('frontend.main')
@section('isifrontend')
    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div id="heroCarousel" data-bs-interval="3000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">
                @foreach ($slider as $item)
                    <!-- Slide 1 -->
                    <div class="carousel-item active" style="background-image: url({{ asset('storage/' . $item->foto) }})">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown"><span>{{ $item->judul }}</span></h2>
                                <p class="animate__animated animate__fadeInUp">{!! html_entity_decode($item->deskripsi) !!}</p>
                                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>


            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <br>
        <br>




        <center>

        </center>

        <section style="background-color:#ffffff">
            <div class="container">
                <div class="content">
                    <div class="thumbnail-featured-title">
                        <h2 class="section-title-main">
                            <center>
                                <p style="color:#070807">Pilih Perawat Home Care Live In Anda</p>

                            </center>

                            <div style="margin-top:20px">
                                <center>
                                    <p style="color:#666666;font-size:12pt;">Cari dan Temukan Perawat Home Care Profesional
                                        Untuk Kebutuhan Orang Tersayang Anda</p>
                                    <lottie-player
                                        src="https://lottie.host/f86c2977-3ab6-4906-9957-86f12d852ea2/f30q2vh7UP.json"
                                        background="##FFFFFF" speed="1" style="width: 100%; height: 300px" autoplay
                                        mode="normal"></lottie-player>

                                </center>
                            </div>
                            <i class="fa fa-arrow-down fa-lg" aria-hidden="true" style="color:#009dee"></i>
                        </h2>
                    </div>
                    <div class="megatron-form container" style="background-color:#FFFFFF;">
                        <div class="form-grp clearfix">
                            
                            <br>
                            <center>
                              <form method="POST" enctype="multipart/form-data" action="{{ url('perawatcari') }}">
                                @csrf
                                    <table class="tg" width="70%">

                                        <tbody>
                                            <tr>
                                                <td class="tg-0pky">

                                                    <div class="row">
                                                        <div class="col-md-6 form-group">
                                                          
                                                          <div class="form-group">
                                                           
                                                            <select name="idpelayanan" class="form-control @error('idpelayanan')is-invalid   @enderror">
                                                                <option value="">Perawat Yang Dibutuhkan</option>
                                                                @foreach ($pelayanan as $item)
                                                                <option value="{{$item->id}}">{{$item->namaperawatan}}</option>
                                                            @endforeach
                        
                                                              </select>
                                                            @error('idpelayanan')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                     <br>
                                                        <div class="form-group">
                                                           
                                                          <select name="gender" class="form-control @error('gender')is-invalid   @enderror">
                                                              <option value="">Pilih Pria/Wanita</option>
                                                             
                                                              <option value="1">Pria</option>
                                                              <option value="2">Wanita</option>
                                                         
                      
                                                            </select>
                                                          @error('gender')
                                                              <div class="invalid-feedback">
                                                                  {{ $message }}
                                                              </div>
                                                          @enderror
                                                      </div>
                                                   
                                                    



                                                        </div>
                                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                                          <div class="form-group">
                                                          
                                                            <select name="durasi" class="form-control @error('durasi')is-invalid   @enderror">
                                                                <option value="">Durasi Kontrak</option>
                                                               
                                                                <option value="14">14 Hari</option>
                                                                <option value="91">3 Bulan</option>
                                                                <option value="183">6 Bulan</option>
                                                                <option value="365">1 Tahun</option>
                                                                   
                                                              </select> @error('durasi')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                           
                                                          <select name="lokasi" class="form-control @error('lokasi')is-invalid   @enderror">
                                                              <option value="">Lokasi</option>
                                                              <option value="Jambi Kota">Jambi Kota</option>
                                                              <option value="Muaro Jambi">Muaro Jambi</option>
                                                              <option value="Bulian">Bulian</option>
                                                                             
                                                            </select>
                                                          @error('lokasi')
                                                              <div class="invalid-feedback">
                                                                  {{ $message }}
                                                              </div>
                                                          @enderror
                                                      </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>


                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>

                                   

                                    <div class="single-form col-md-12 col-xs-12" style="margin-top:10px">
                                        <button type="submit" class="form-control"
                                            style="background-color:#009dee;border-radius: 25px">Search</button>
                                    </div>

                                </form>
                            </center>


                        </div>
                    </div>
                </div>
            </div>

        </section>









        @foreach ($tentang as $ten)
            <section id="about" class="about">
                <div class="container">

                    <div class="row content">
                        <div class="col-lg-6">
                            <h2>{{ $ten->judul }}</h2>
                            <img src="{{ asset('storage/' . $item->foto) }}" width="600" height="400">
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

 <br>
        <center>
            <h2>TOTAL PASIEN</h2>
        </center>
        <section id="clients" class="clients section-bg">
            <div class="container">
      
              <div class="row">
      
                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                  
                </div>
      
             
      
                <div class="col-lg-4 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <h1 class="img-fluid">Pasien Bulan Ini:</h1> <h1>  {{$pasienbulanan}} </h1>
                </div>
      
                <div class="col-lg-4 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <h1 class="img-fluid">Pasien Hari Ini :</h1><h1> {{$pasienharian}} </h1>
                </div>
      
                
      
                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                 
                </div>
      
              </div>
      
            </div>
          </section>
          <br>
          <center>
              <h2>DAFTAR CLIENT</h2>
          </center>

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
                    @foreach ($user as $us)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('storage/' . $us->foto) }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $us->name }}</h4>
                                    <p><?php
                                    
                                    $data = DB::table('kategori_perawatan')
                                        ->where('id', $us->idperawatan)
                                        ->first();
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
