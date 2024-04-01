@extends('frontend.main')
@section('isifrontend')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Pricing</h2>
                <ol>
                    <li><a href="{{ asset('/') }}">Home</a></li>
                    <li>Pricing</li>
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
            <h3>DAFTAR HARGA PELAYANAN</h3>
        </center>
        <section id="pricing" class="pricing">
            <div class="container">
      
              <div class="row">
      @foreach($pelayanan as $pel)
                <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                  <div class="box featured">
                    <h3>{{$pel->namaperawatan}}</h3>
                    <h4><sup>Rp</sup>{{  number_format($pel->tarif,0,',', '.')}}<span> / {{$pel->durasi}}</span></h4>
                    {!! html_entity_decode($pel->deskripsi)!!}


                    <div class="btn-wrap">
                      <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                  </div>
                </div>
      @endforeach
      
      
              </div>
      
            </div>
          </section><!-- End Pricing Section -->
      
       
    </main><!-- End #main -->
@endsection
