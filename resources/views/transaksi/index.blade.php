@extends('layout.main')
@section('judul')
@endsection

@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Data Tentang</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('tentang/add') }}'">
                                <i class="fas fa-plus-circle"></i>Tambah Data
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Nama Pasien</th>
                                        <th>Tanggal Pemeriksaan</th>
                                        <th>Lokasi</th>
                                        <th>Perawat</th>
                                        <th>Durasi (hari)</th>
                                        <th>Status</th>


                                        <th>#</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($transaksi as $row)
                                        <tr>
                                            <input type="hidden" class="delete_id" value="{{ $row->id }}">
                                            <td>{{ $loop->iteration }}</td>

                                            <td class="kodetransaksi">{{ $row->kodetransaksi }}<br>



                                            </td>
                                            <td>{!! html_entity_decode($row->nama) !!}
                                                <br>{{ $row->hp }}
                                            </td>
                                            <td>{{ $row->tanggal }}</td>
                                            <td>{{ $row->lokasi }}</td>
                                            <td>

                                                <?php
                                                $data = DB::table('users')
                                                    ->where('id', $row->idperawat)
                                                    ->first();
                                                echo $data->name;
                                                
                                                ?>

                                            </td>
                                            <td>{{ $row->durasi }}</td>
                                            <td>
                                                @if ($row->status == 'Antrian')
                                                <button class="btn btn-sm btn-info">Antrian</button>

                                                @endif
                                                @if ($row->status == 'Selesai')
                                                <button class="btn btn-sm btn-success">Selesai</button>

                                                @endif
                                                @if ($row->status == 'On Proses')
                                                <button class="btn btn-sm btn-warning">Berlangsung</button>
                                               
                                                @endif
                                                @if ($row->status == 'Batal')
                                                <button class="btn btn-sm btn-danger">Batal</button>
                                                @endif
                                                @if ($row->status == 'Pending')
                                                <button class="btn btn-sm btn-info">Pending</button>
                                              
                                                @endif

                                            </td>


                                            <td>

                                                <a href="#" class="btn btn-warning btn-sm deletetentang"
                                                    data-id="{{ $row->id }}" data-nama="{{ $row->kodetransaksi }}"> <i
                                                        class="fas fa-trash-alt"></i></a>

                                                        @if ($row->status == 'Antrian')
                                                        <button class="btn btn-sm btn-info updatestatus_view" title="Status"
                                                         data-id="'.$row->id.'" data-toggle="modal"
                                                         data-target="#exampleModall">
                                                         <i class="fas fa-edit"></i> Update
                                                     </button>
                                                     @endif
                                                     @if ($row->status == 'Selesai')
                                                   
     
                                                     @endif
                                                     @if ($row->status == 'On Proses')
                                                     <button class="btn btn-sm btn-info updatestatus_view" title="Status"
                                                         data-id="'.$row->id.'" data-toggle="modal"
                                                         data-target="#exampleModall">
                                                         <i class="fas fa-edit"></i> Update
                                                     </button>
                                                     @endif
                                                     @if ($row->status == 'Batal')
                                                     <button class="btn btn-sm btn-danger">Batal</button>
                                                     @endif
                                                     @if ($row->status == 'Pending')
                                                     <button class="btn btn-sm btn-info updatestatus_view" title="Status"
                                                     data-id="'.$row->id.'" data-toggle="modal"
                                                     data-target="#exampleModall">
                                                     <i class="fas fa-edit"></i> Update
                                                 </button>
                                                     @endif



                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Trasaksi</th>
                                        <th>Nama Pasien</th>
                                        <th>Tanggal Pemeriksaan</th>
                                        <th>Lokasi</th>
                                        <th>Perawat</th>
                                        <th>Durasi (hari)</th>
                                        <th>Status</th>
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
    <!-- sweet alert-->


    <div class="modal fade" id="exampleModall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ url('transaksi/requestselesai') }}">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Silahkan Update Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" class="form-control" id="v_id" name="id" value="">
                        <input type="hidden" class="form-control" id="v_kodetransaksi" name="kodetransaksi" value="">
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
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

















    <script>
        function deleteData(jobTitle) {
            pesan = confirm(`Yakin ingin hapus ${jobTitle} ?`);
            if (pesan) return true;
            else return false;
        }
    </script>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
