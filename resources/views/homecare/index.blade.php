@extends('layout.main')


@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Daftar My Home Care </h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">


                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Pelayanan</th>
                                        <th>Perawat</th>
                                        <th>Tanggal Pelayanan</th>
                                        <th>Durasi (Hari)</th>
                                        <th>Status</th>
                                        <th>Total Pembayaran</th>
                                        <th>#</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($homecare as $row)
                                        <tr>
                                            <input type="hidden" class="delete_id" value="{{ $row->id }}">
                                            <td class="id">{{ $loop->iteration }}</td>
                                            <td class="kodetransaksi">{{ $row->kodetransaksi }}</td>
                                            <td class="namaperawatan"> <?php
                                            $data = DB::table('kategori_perawatan')
                                                ->where('id', $row->idpelayanan)
                                                ->first();
                                            echo $data->namaperawatan;
                                            ?></td>
                                            <td class="idperawat"> <?php
                                            $data = DB::table('users')
                                                ->where('id', $row->idperawat)
                                                ->first();
                                            echo $data->name;
                                            ?></td>
                                            <td class="tanggal">{{ $row->tanggal }}</td>
                                            <td class="durasi">{{ $row->durasi }}</td>
                                            <td class="status">{{ $row->status }}</td>
                                            <td class="">Rp.<?php
                                            $data = DB::table('kategori_perawatan')
                                                ->where('id', $row->idpelayanan)
                                                ->first();
                                            $total = $row->durasi * $data->tarif;
                                            echo number_format($total, 0, ',', '.');
                                            ?></td>

                                            <td>
                                                @if($user->level==3)
                                                <button class="btn btn-sm btn-danger ulasan_view" title="Ulasan"
                                                data-id="'.$row->id.'" data-toggle="modal"
                                                data-target="#exampleModal">
                                                <i class="fas fa-edit"></i>Update Status
                                            </button>
                                                @endif
                                                @if($user->level==2)
                                                @if ($row->status_review == null)
                                                    <button class="btn btn-sm btn-info ulasan_view" title="Ulasan"
                                                        data-id="'.$row->id.'" data-toggle="modal"
                                                        data-target="#exampleModal">
                                                        <i class="fas fa-edit"></i>Beri Ulasan
                                                    </button>
                                                @endif
                                                    @endif

                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Pelayanan</th>
                                        <th>Perawat</th>
                                        <th>Tanggal Pelayanan</th>
                                        <th>Durasi (Hari)</th>
                                        <th>Status</th>
                                        <th>Total Pembayaran</th>
                                        <th>#</th>
                                    </tr>
                                </tfoot>
                            </table>



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
    @if($user->level==2)
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
          
            <div class="modal-content">
               
                <form method="POST" action="{{ url('myhomecare/ulasan') }}">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Silahkan Beri Ulasan Tentang Pelayanan Kami</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" class="form-control" id="v_id" name="id" value="">
                        <input type="hidden" class="form-control" id="v_kodetransaksi" name="kodetransaksi" value="">

                        <!-- Start Rating -->
                        <div class="rating-css">
                            <div>Kualitas Layanan </div>
                            <div class="start-icon">
                                <input type="radio" name="rating1" id="rating1" value="1">
                                <label for="rating1" class="fa fa-star"></label>

                                <input type="radio" name="rating1" id="rating2" value="2">
                                <label for="rating2" class="fa fa-star"></label>

                                <input type="radio" name="rating1" id="rating3" value="3">
                                <label for="rating3" class="fa fa-star"></label>

                                <input type="radio" name="rating1" id="rating4" value="4">
                                <label for="rating4" class="fa fa-star"></label>

                                <input type="radio" name="rating1" id="rating5" value="5">
                                <label for="rating5" class="fa fa-star"></label>

                            </div>

                        </div>
                        <!-- End Start Rating -->
                        <!-- Start Rating -->
                        <div class="rating-css">
                            <div>Kecepatan Layanan </div>
                            <div class="start-icon">
                                <input type="radio" name="lrating1" id="lrating1" value="1">
                                <label for="lrating1" class="fa fa-star"></label>

                                <input type="radio" name="lrating1" id="lrating2" value="2">
                                <label for="lrating2" class="fa fa-star"></label>

                                <input type="radio" name="lrating1" id="lrating3" value="3">
                                <label for="lrating3" class="fa fa-star"></label>

                                <input type="radio" name="lrating1" id="lrating4" value="4">
                                <label for="lrating4" class="fa fa-star"></label>

                                <input type="radio" name="lrating1" id="lrating5" value="5">
                                <label for="lrating5" class="fa fa-star"></label>

                            </div>

                        </div>
                        <!-- End Start Rating -->

                        <div class="rating-css">
                            <div>Respon Layanan </div>
                            <div class="start-icon">
                                <input type="radio" name="rsrating1" id="rsrating1" value="1">
                                <label for="rsrating1" class="fa fa-star"></label>

                                <input type="radio" name="rsrating1" id="rsrating2" value="2">
                                <label for="rsrating2" class="fa fa-star"></label>

                                <input type="radio" name="rsrating1" id="rsrating3" value="3">
                                <label for="rsrating3" class="fa fa-star"></label>

                                <input type="radio" name="rsrating1" id="rsrating4" value="4">
                                <label for="rsrating4" class="fa fa-star"></label>

                                <input type="radio" name="rsrating1" id="rsrating5" value="5">
                                <label for="rsrating5" class="fa fa-star"></label>

                            </div>

                        </div>
                        <!-- End Start Rating -->


                        <div class="rating-css">
                            <div>Pelayanan Petugas</div>
                            <div class="start-icon">
                                <input type="radio" name="prating1" id="prating1" value="1">
                                <label for="prating1" class="fa fa-star"></label>

                                <input type="radio" name="prating1" id="prating2" value="2">
                                <label for="prating2" class="fa fa-star"></label>

                                <input type="radio" name="prating1" id="prating3" value="3">
                                <label for="prating3" class="fa fa-star"></label>

                                <input type="radio" name="prating1" id="prating4" value="4">
                                <label for="prating4" class="fa fa-star"></label>

                                <input type="radio" name="prating1" id="prating5" value="5">
                                <label for="prating5" class="fa fa-star"></label>

                            </div>

                        </div>
                        <!-- End Start Rating -->





                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
               
            </div>
                  
        </div>
        
    </div>
    @endif
    @if($user->level==3)
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
          
            <div class="modal-content">
               
                <form method="POST" action="{{ url('myhomecare/requestselesai') }}">
                    @csrf
    
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Silahkan Update Status Pelayanan Pasien Anda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
    
                        <input type="hidden" class="form-control" id="v_id" name="id" value="">
                        <input type="hidden" class="form-control" id="v_kodetransaksi" name="kodetransaksi" value="">
                        <label for="">Status Pelayanan</label>
                        <select name="status" class="form-control @error('status')is-invalid   @enderror">
    
                            <option value="">-</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Pending">Pending</option>
                            <option value="Batal">Batal</option>
                            <option value="On Proses">On Proses</option>
    
                           
                        </select>
    
    
    
    
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Save</button>
                    </div>
                </form>
               
            </div>
                  
        </div>
        
    </div>
    @endif

    {{-- View Script JS --}}








    <script>
        function deleteData(namaaplikasi) {
            pesan = confirm(`Yakin ingin hapus ${namaaplikasi} ?`);
            if (pesan) return true;
            else return false;
        }
    </script>
@endsection
