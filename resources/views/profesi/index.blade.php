@extends('layout.main')
@section('judul')
    Profesi List
@endsection

@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Daftar Profesi</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('profesi/add') }}'">
                                <i class="fas fa-plus-circle"></i>Tambah Data
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                             <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                                                        
                                        <th>Nama Profesi</th>
                                        <th>#</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($profesi as $row)
                                        <tr>
                                            <input type="hidden" class="delete_id" value="{{$row->id}}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->namaprofesi }}</td>
                                           
                                            <td><button class="btn btn-sm btn-info" title="Edit Data"
                                                    onclick="window.location='{{ url('profesi/' . $row->id) }}'">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                        
                                                        <a href="#" class="btn btn-warning btn-sm delete" data-id="{{ $row->id }}" data-nama="{{ $row->namaprofesi }}"   > <i class="fas fa-trash-alt"></i></a>                             
                                      
                                            

                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Profesi</th>
                                        
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
 

    <script>
      function deleteData(jobTitle){
        pesan= confirm(`Yakin ingin hapus ${jobTitle} ?`);
        if(pesan)return true;
        else return false;
      }
    </script>



@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
