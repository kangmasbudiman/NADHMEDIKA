@extends('layout.main')
@section('judul')
    Setting Aplikasi
@endsection

@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Job List</h3>
                         
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
                                        <th>Nama</th>
                                        
                                        <th>Target</th>
                                       
                                      
                                        <th>#</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->namaaplikasi }}</td>
                                            <td>Rp. {{number_format($row->target, 0)}}</td>
                                           
                                            <td><button class="btn btn-sm btn-info" title="Edit Data"
                                                    onclick="window.location='{{ url('setting/' . $row->id) }}'">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            

                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        
                                        <th>Target</th>
                                       
                                      
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
      function deleteData(namaaplikasi){
        pesan= confirm(`Yakin ingin hapus ${namaaplikasi} ?`);
        if(pesan)return true;
        else return false;
      }
    </script>
@endsection
