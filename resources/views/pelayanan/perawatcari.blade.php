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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ url('pelayanan/inputkunjungan') }}" method="POST">
                                @csrf
                                @foreach ($perawat as $item)
                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                        <div class="card bg-light d-flex flex-fill">
                                            <div class="card-header text-muted border-bottom-0">
                                                <span>
                                                    <?php
                                                    $data = DB::table('kategori_perawatan')
                                                        ->where('id', $item->idperawatan)
                                                        ->first();
                                                    echo $data->namaperawatan;
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="lead"><b>{{ $item->name }}</b></h2>
                                                        <p class="text-muted text-sm"><b>About: </b> {!! html_entity_decode($item->deskripsi) !!}
                                                        </p>
                                                        <p class="text-muted text-sm"><b>Tanggal Pelayanan: </b> {{$tanggal}}
                                                        </p>

                                                    </div>
                 
                                                    
                                                    <div class="col-5 text-center">
                                                        <img src="{{ asset('storage/' . $item->foto) }}" height="80"
                                                            width="80" alt="user-avatar" class="img-circle img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="idpelayanan" value="{{ $idpelayanan }}">
                                            <input type="hidden" name="durasi"value="{{ $durasi }}">
                                            <input type="hidden" name="lokasi"value="{{ $lokasi }}">
                                            <input type="hidden" name="idperawat"value="{{ $item->id }}">
                                          
                                            <input type="hidden" readonly size="30" name="tanggal"  value="{{$tanggal}}" class="form-control">
                                            <br>
                                            <div class="card-footer">
                                                <div class="row">
                                                   
                                                    
                                                    <div class="text-right">
                                                     
                                                        <button type="submit" class="btn btn-warning">Booking</button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </form>
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
