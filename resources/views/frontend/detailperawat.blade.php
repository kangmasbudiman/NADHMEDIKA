@extends('frontend.main')
@section('isifrontend')
    <!-- ======= Hero Section ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail Perawat</h2>
                <ol>
                    <li><a href="{{ asset('/') }}">Home</a></li>
                    <li><a href="{{ asset('/team') }}">Team</a></li>
                    <li>Detail Perawat</li>
                </ol>
            </div>

        </div>
    </section>

    <main id="main">
      @foreach($user as $item)
      <section class="section about-section gray-bg" id="about">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <div class="about-text go-to">
                        <h3 class="dark-color">About Me</h3>
                        <h6 class="theme-color lead"><?php-email-form
                      ?>
                      </h6>
                        <p>{!! html_entity_decode($item->deskripsi) !!}</p>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-avatar">
                        <img src="{{asset('storage/'.$item->foto)}}" wight=400 height=600 title="" alt="">
                        <h6 class="count h2" data-to="500" data-speed="500">
                        
                    </div>
                </div>
            </div>
            <div class="counter">
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="500" data-speed="500"  >{{$item->name}}</h6>
                            <p class="m-0px font-w-600">  <?php
                              $data=DB::table('kategori_perawatan')->where('id',$item->idperawatan)->first();
                              echo $data->namaperawatan; 
                                                                        
                      ?></p>
                        </div>
                    </div>

              
                </div>
            </div>
        </div>
    </section>
      @endforeach





          

        









    </main><!-- End #main -->
@endsection
