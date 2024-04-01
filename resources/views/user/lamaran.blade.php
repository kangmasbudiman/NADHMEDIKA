@extends('layout.main')
@section('judul')
    Daftar Pelamar
@endsection

@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Pelamar</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Usia</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Bulan Lahir</th>


                                        <th>#</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($users as $row)
                                        <tr>
                                            <input type="hidden" class="delete_id" value="{{ $row->id }}">
                                            <td>{{ $loop->iteration }}</td>

                                            <td class="foto"> <img src="{{ asset('storage/'.$row->foto) }}" class="img-circle elevation-2" width="40" height="40" alt="User Image"></td>
                                        </td>
                                        <td class="kode">{!! html_entity_decode($row->id) !!}
                                            <td class="nama">{!! html_entity_decode($row->name) !!}
                                              
                                            </td>
                                            <td class="gender">{{ $row->gender }}</td>
                                            <td class="usia">{{ $row->usia }}</td>
                                            <td class="tempatlahir">{{ $row->tempatlahir}}</td>
                                            <td class="tanggal_lahir">{{ $row->tanggal_lahir}}</td>
                                            <td class="bulan_lahir">{{ $row->bulan_lahir}}</td>
                                            <td>

                                                <button class="btn btn-sm btn-info" title="Detail User"
                                                    onclick="window.location='{{ url('user/detaillamaran/' . $row->id) }}'">
                                                    <i class="fas fa-book"></i>
                                                </button>

                                                   
                                                  
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Usia</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Bulan Lahir</th>
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


    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ url('myhomecare/ulasan') }}">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Perawat </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="v_id" name="id" value="">
                       

                        <label for="">Nama</label>
                        <input type="text" class="form-control" id="v_foto" name="nama" value="">
                        <label for="">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="v_gender" name="gender" value="">
                        <label for="">Usia</label>
                        <input type="text" class="form-control" id="v_usia" name="usia" value="">
                        <label for="">Tempat Lahir</label>
                        <input type="text" class="form-control" id="v_tempatlahir" name="tempatlahir" value="">
                        <label for="">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="v_tanggal_lahir" name="tanggal_lahir" value="">
                        <label for="">Bulan Lahir</label>
                        <input type="text" class="form-control" id="v_bulan_lahir" name="bulan_lahir" value="">

                        <!-- Start Rating -->
                       
                    

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
      function deleteData(name){
        pesan= confirm(`Yakin ingin hapus ${name} ?`);
        if(pesan)return true;
        else return false;
      }
    </script>
@endsection
