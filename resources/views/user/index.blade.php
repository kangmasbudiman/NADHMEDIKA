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
                            <h3 class="card-title  ">Job List</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('user/add') }}'">
                                <i class="fas fa-plus-circle"></i>Tambah Data
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto Profil</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Pendidikan</th>
                                        <th>Profesi</th>
                                        <th>NIK</th>
                                        <th>Kategori Perawatan</th>

                                        <th>User Name</th>
                                        <th>Status</th>
                                        <th>User Rating</th>
                                        <th>Tgl Register</th>
                                        <th>#</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($users as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td> @if($row->foto !=null)
                                                <img src="{{ asset('storage/'.$row->foto) }}" class="img-circle elevation-2" width="40" height="40" alt="User Image"></td>
                                               
                                                @endif
                                            <td> 
                                                {{ $row->name }}<br>{{ $row->gender== 1 ? 'Pria':'Wanita'}}</td>
                                            <td>{{ $row->email }}<br>{{ $row->iduser }}</td>
                                            <td>{{ $row->namapendidikan }}    </td>
                                            <td>{{ $row->namaprofesi }}    </td>
                                            <td>{{ $row->ktp }}</td>
                                            <td>{{ $row->namaperawatan }}</td>

                                            <td>{{ $row->username }}</td>
                                            <td>
                                                @if($row->level==1)
                                                <button class="btn btn-info btn-sm">Admin</button>
                                                @endif
                                                @if($row->level==2)
                                                <button class="btn btn-warning btn-sm">Pasien</button>
                                                @endif
                                                @if($row->level==3)
                                                <button class="btn btn-danger btn-sm">Perawat</button>
                                                @endif
                                                @if($row->level==4)
                                                <button class="btn btn-success btn-sm">Pelamar</button>
                                                @endif
                                            
                                            </td>
                                            <td>{{$row->userRating}}<i class="fa fa-star"></i> <br><span class="badge badge-primary"></span></td>
                                            <td>{{ $row->created_at }}</td>
                                            <td><button class="btn btn-sm btn-info" title="Edit Data"
                                                    onclick="window.location='{{ url('user/' . $row->iduser) }}'">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-success bg-white" title="List Job"
                                                    onclick="window.location='{{ url('user/listjob/' . $row->iduser) }}'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                                                </button>
                                                <form  onsubmit="return deleteData( '{{ $row->name }}')" method="POST" style="display:inline"
                                                    action="{{ url('user/' . $row->iduser) }}">
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
                                        <th>Foto Profil</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Pendidikan</th>
                                        <th>Profesi</th>
                                        <th>NIK</th>
                                        <th>Kategori Perawatan</th>

                                        <th>User Name</th>
                                        <th>Status</th>
                                        <th>User Rating</th>
                                        <th>Tgl Register</th>
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
