@extends('layout.main')


@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Silahkan Pilih Perawat Anda</h3>

                        </div>







                    </br>
                        <!-- terbaru -->
                        <div class="row row-cols-3 g-3 mt-10">
                            @foreach ($perawat as $item)
                            <form action="{{ url('pelayanan/inputkunjungan') }}" method="POST">
                                @csrf
                            <div class="col">
                              <div class="card">
                                <img src="{{ asset('storage/' . $item->foto) }}" height="300"
                                width="80" class="card-img-top"
                                  alt="Hollywood Sign on The Hill" />
                                <div class="card-body">
                                  <h5 class="card-title ">Nama Perawat: {{ $item->name }} </br></h5></br>
                               <?php
                                  $data = DB::table('kategori_perawatan')
                                      ->where('id', $item->idperawatan)
                                      ->first();
                                  echo $data->namaperawatan;
                                  ?>
                                  <p class="card-text">
                                    <p class="text-muted text-sm"><b>About: </b> {!! html_entity_decode($item->deskripsi) !!}
                                    </p>
                                    <p class="text-muted text-sm"><b>Tanggal Pelayanan: </b> {{$tanggal}}
                                    </p>
                                  </p>

                                  <input type="hidden" name="idpelayanan" value="{{ $idpelayanan }}">
                                  <input type="hidden" name="durasi"value="{{ $durasi }}">
                                  <input type="hidden" name="lokasi"value="{{ $lokasi }}">
                                  <input type="hidden" name="idperawat"value="{{ $item->id }}">
                                
                                  <input type="hidden" readonly size="30" name="tanggal"  value="{{$tanggal}}" class="form-control">
                                  <br>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                       
                                        
                                        <div class="text-right">
                                         @if($item->status_job==1)
                                         <button type="" class="btn btn-danger">Sedang Melayani Pasien</button>
                                         @endif
                                         @if($item->status_job==null)
                                            <button type="submit" class="btn btn-warning">Booking</button>
                                         @endif
                                        </div>
                                    </div>
                                    
                                </div>
                              </div>
                            </div>
                            
                        </form>
                            @endforeach
                          
                        
                          
                        
                         
                          </div>
                        
                        
                        
                        
                        
                        
                   



                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <script>
        function deleteData(namaaplikasi) {
            pesan = confirm(`Yakin ingin hapus ${namaaplikasi} ?`);
            if (pesan) return true;
            else return false;
        }
    </script>
@endsection
