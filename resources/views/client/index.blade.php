@extends('layout.main')
@section('judul')
    List User
@endsection

@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Data Client</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('client/add') }}'">
                                <i class="fas fa-plus-circle"></i>Tambah Data
                            </button>
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
                                        
                                        <th>Nomor HP</th>
                                      
                                       
                                        <th>#</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($client as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->nohp }}</td>
                                            <td><button class="btn btn-sm btn-info" title="Edit Data"
                                                    onclick="window.location='{{ url('client/' . $row->id) }}'">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                               
                                                <form  onsubmit="return deleteData( '{{ $row->namaClient }}')" method="POST" style="display:inline"
                                                    action="{{ url('client/' . $row->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" type="submit" title="Hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nomor HP</th>
                                      
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
      function deleteData(name){
        pesan= confirm(`Yakin ingin hapus ${name} ?`);
        if(pesan)return true;
        else return false;
      }
    </script>
@endsection
