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
                                        <th>Id Job</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Status</th>
                                    
                                        <th>#</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($jobs as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->idJobs }}</td>
                                            <td>{{ $row->deskripsi }}</td>
                                            <td>@if($row->file)
                                                <img src="{{asset('storage/'.$row->file)}}" class="img-thumbnail" style="width: 50%">
                                                @else
                                                <span class="badge badge-danger">Belum Ada Foto</span>
                                                @endif</td>
                                            <td>
                                                <?php
                                                if($row->status==1){
                                                    echo "Antrian";
                                                }elseif ($row->status==2) {
                                                    echo "Proses";
                                                }elseif($row->status==3){
                                                    echo "Pending";
                                                }else{
                                                    echo "Selesai";
                                                }
                                            ?>
                                            </td>
                                           
                                            <td>
                                                <button class="btn btn-sm btn-info" title="Edit Task Detail"
                                                    onclick="window.location='{{ url('task/detailedit/' . $row->id) }}'">
                                                    <i class=" fas fa-edit"></i>
                                                </button>
                                              <!--
                                                <form  onsubmit="return deleteData( '{{ $row->id }}')" method="POST" style="display:inline"
                                                    action="{{ url('job/deletedetail/' . $row->id) }}">
                                                    @csrf
                                                  
                                                    <button class="btn btn-sm btn-danger" type="submit" title="Hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            -->
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Job</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
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
    <script>
      function deleteData(id){
        pesan= confirm(`Yakin ingin hapus ${id} ?`);
        if(pesan)return true;
        else return false;
      }
    </script>
@endsection
