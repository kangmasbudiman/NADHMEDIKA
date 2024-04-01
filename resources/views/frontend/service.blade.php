@extends('frontend.main')
@section('isifrontend')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Service</h2>
        <ol>
          <li><a href="{{asset('/')}}">Home</a></li>
          <li>Service</li>
        </ol>
      </div>

    </div>
</section>
<br>
<br>
    <main id="main">

   <br>
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

    
    </main><!-- End #main -->
@endsection
