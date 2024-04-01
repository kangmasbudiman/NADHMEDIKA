@extends('frontend.main')
@section('isifrontend')
    <!-- ======= Hero Section ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Daftar Perawat</h2>
                <ol>
                    <li><a href="{{ asset('/') }}">Home</a></li>
                    <li>Daftar Perawat</li>
                </ol>
            </div>

        </div>
    </section>

    <main id="main">

     


        <form action="{{ url('pelayanan/inputkunjungan') }}" method="POST">
            @csrf
            <section id="team" class="team ">
                <div class="container">
          
                  <div class="row">
          
                    @foreach($user as $item)
                    <div class="col-lg-6">
                      <div class="member d-flex align-items-start">
                        <div class="pic"><img src="{{asset('storage/'.$item->foto)}}" width="80" height="40" class="img-fluid" alt=""></div>
                        <div class="member-info">
                        <a href="{{asset('detailperawat/'.$item->id)}}"><h4>{{$item->name}}</h4></a>  
                          <span>
                            <?php
                                                        $data=DB::table('kategori_perawatan')->where('id',$item->idperawatan)->first();
                                                        echo $data->namaperawatan; 
                                                                                                   
                                                ?>
                         </span>
                          <p>{!!html_entity_decode($item->deskripsi) !!}</p>
                          <br>
                          <a href="{{asset('detailperawat/'.$item->id)}}" class="btn btn-sm btn-success">Detail</a>
                          <input type="hidden" name="idpelayanan" value="{{$idpelayanan}}">
                          <input type="hidden" name="durasi"value="{{$durasi}}">
                          <input type="hidden" name="lokasi"value="{{$lokasi}}">
                          <input type="hidden" name="idperawat"value="{{$item->id}}">
                        
                     
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
          
                </div>
              </section><!-- End Team Section -->
              <button></button>
        </form>

        
         

        









   
   
   
            </main><!-- End #main -->
@endsection
