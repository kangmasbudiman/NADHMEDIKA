@extends('layout.main')
@section('judul')
    Laporan  Pendapatan Perperawat
@endsection

@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  "></h3>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (session('msg'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Selamat</strong> {{ session('msg') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Pelayanan</th>
                                        <th>Perawat</th>
                                       
                                        <th>Status</th>
                                        <th>Tanggal Pelayanan</th>


                                        <th>Jumlah</th>
                                        <th>#</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($jobs as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->kodetransaksi }}</td>
                                            <td>{{ $row->namaperawatan }}</td>
                                            <td>{{ $row->name }}</td>
                                           
                                            <td>{{ $row->status }}</td>
                                            <td>{{ $row->created_at }}</td>

                                            <td>Rp {{  number_format($row->totalsemua*0.15,0,',', '.')}}</td>
                                            <td> </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Pelayanan</th>
                                        <th>Perawat</th>
                                       
                                        <th>Status</th>
                                        <th>Tanggal Pelayanan</th>
                                        <th>Jumlah</th>
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
    <script>
      function deleteData(jobTitle){
        pesan= confirm(`Yakin ingin hapus ${jobTitle} ?`);
        if(pesan)return true;
        else return false;
      }
    </script>
@endsection
