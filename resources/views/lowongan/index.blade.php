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
                            <h3 class="card-title  ">Data Lowongan Kerja</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('lowongan/add') }}'">
                                <i class="fas fa-plus-circle"></i>Tambah Data
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                             <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                                                        
                                        <th>Lowongan Kerja</th>
                                        <th>#</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($lowongan as $row)
                                        <tr>
                                            <input type="hidden" class="delete_id" value="{{$row->id}}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td> {!! html_entity_decode($row->nama)!!}
                                            
                                            </td>
                                           
                                            <td><button class="btn btn-sm btn-info" title="Edit Data"
                                                    onclick="window.location='{{ url('lowongan/' . $row->id) }}'">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                        
                                                        <a href="#" class="btn btn-warning btn-sm deletelowongan" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}"   > <i class="fas fa-trash-alt"></i></a>                             
                                      
                                            

                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Lowongan Kerja</th>
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
