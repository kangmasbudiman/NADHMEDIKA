@extends('layout.main')
@section('judul')
    Data Pelamar
@endsection

@section('isi')
    @foreach ($users as $row)
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('storage/' . $row->foto) }}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $row->name }}</h3>

                                <p class="text-muted text-center">{{ $row->usia }} Tahun</p>
                                <p class="text-muted text-center">{{ $row->email }}</p>
                                <p class="text-muted text-center">{{ $row->sosmed }}</p>
                                <p class="text-muted text-center">{{ $row->status_pernikahan }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <center>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                                Terima Menjadi Perawat
                                              </button>
                                        </center>
                                      
                                    </li>
                                    <li class="list-group-item">
                                        <b>STR</b> <a class="float-right">
                                            {{ $row->str  }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Jenis Kelamin</b> <a class="float-right">
                                            {{ $row->gender == 1 ? 'Pria' : 'Wanita' }}</a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Tepat Tanggal Lahir</b> <a class="float-right">{{ $row->tempatlahir }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tanggal Lahir</b> <a class="float-right">{{ $row->tanggal_lahir }} /
                                            {{ $row->bulan_lahir }} / {{ $row->tahun_lahir }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tanggal Lahir</b> <a class="float-right">{{ $row->tanggal_lahir }} /
                                            {{ $row->bulan_lahir }} / {{ $row->tahun_lahir }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>NIK KTP</b> <a class="float-right">{{ $row->ktp }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Agama</b> <a class="float-right">{{ $row->agama }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>No HP/Wa</b> <a class="float-right">{{ $row->nowa }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tinggi Badan</b> <a class="float-right">{{ $row->tinggi_badan }} Cm</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Berat Badan</b> <a class="float-right">{{ $row->berat_badan }} Kg</a>
                                    </li>

                                </ul>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tentang Pelamar</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Pendidikan</strong>

                                <p class="text-muted">
                                    {{ $row->nama_sekolah }} Jurusan
                                    {{ $row->jurusan }}
                                  <strong>Tahun Lulus {{ $row->lulus_tahun }}</strong>  

                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted">
                                    {{$row->alamat}}
                                    Propinsi <?php
                                    $data = DB::table('provinces')
                                        ->where('id', $row->propinsi)
                                        ->first();
                                    echo $data->name;
                                    ?>
                                    Kabupaten <?php
                                    $rg = DB::table('regencies')
                                        ->where('id', $row->kabupaten)
                                        ->first();
                                    echo $rg->name;
                                    ?>
                                    Kecamatan <?php
                                    $ds = DB::table('districts')
                                        ->where('id', $row->kecamatan)
                                        ->first();
                                    echo $ds->name;
                                    ?>

                                    Desa <?php
                                    $vs = DB::table('villages')
                                        ->where('id', $row->desa)
                                        ->first();
                                    echo $vs->name;
                                    ?>
                                </p>


                                <hr>
                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skils</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger">{{$row->pelatihan}} </br> {{$row->sertifikat}}</span>
                                    
                                </p>
                                <strong><i class="fas fa-pencil-alt mr-1"></i> Deskripsi</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger">{{$row->deskripsi}}</span>
                                    
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Pengalaman</strong>

                                <p class="text-muted">{{$row->pengalaman}}</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                   
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity"
                                            data-toggle="tab">FILE FILE</a></li>

                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                      
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('storage/' . $row->foto_ktp) }}" alt="User Image">
                                                <span class="username">
                                                    <a href="#">KTP</a>
                                                    <a href="#" class="float-right btn-tool"><i
                                                            class="fas fa-times"></i></a>
                                                </span>
                                               
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <img class="img-fluid" src="{{ asset('storage/' . $row->foto_ktp) }}"
                                                        alt="Photo">
                                                </div>
                                                <!-- /.col -->
                                              
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                      
                                        </div>
                                        <div class="post">
                                            <div class="user-block">
                                                <span class="username">
                                                    <a href="#">IJAZAH</a>
                                                    <a href="#" class="float-right btn-tool"><i
                                                            class="fas fa-times"></i></a>
                                                </span>
                                               
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <embed src="{{ asset('storage/' . $row->foto_ijazah) }}" width="800px" height="500px" />
                                                </div>
                                                <!-- /.col -->
                                              
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                      
                                        </div>

                                        <div class="post">
                                            <div class="user-block">
                                                
                                                <span class="username">
                                                    <a href="#">STR</a>
                                                    <a href="#" class="float-right btn-tool"><i
                                                            class="fas fa-times"></i></a>
                                                </span>
                                               
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <embed src="{{ asset('storage/' . $row->foto_str) }}" width="800px" height="500px" />
                                                </div>
                                                <!-- /.col -->
                                              
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                      
                                        </div>
                                        <div class="post">
                                            <div class="user-block">
                                                <span class="username">
                                                    <a href="#">SERTIFIKAT</a>
                                                    <a href="#" class="float-right btn-tool"><i
                                                            class="fas fa-times"></i></a>
                                                </span>
                                               
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <embed src="{{ asset('storage/' . $row->foto_sertifikat) }}" width="800px" height="500px" />
                                                </div>
                                                <!-- /.col -->
                                              
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                      
                                        </div>




                                        <!-- /.post -->
                                    </div>

                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <h4>APakah Anda Yakin Menerima  <strong>{{$row->name}}</strong> Sebagai Perawat NADH Medika? </h4>
                 <form method="POST" action="{{ url('user/updateanggota') }}">
                    @csrf
                    <input type="hidden" class="form-control" name="id" value="{{$row->id}}">
                    <Label>Kategori Perawatan</Label>
                    <select name="idperawatan" class="form-control @error('idperawatan')is-invalid   @enderror">

                        <option value="">-</option>
                        @foreach($kategoriperawatan as $item)
                        <option value="{{$item->id}}">{{$item->namaperawatan}}</option>
                      
                        @endforeach
                    </select>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                 </form>
                </div>
               
              </div>
            </div>
          </div>
    @endforeach





    <script>
        function deleteData(name) {
            pesan = confirm(`Yakin ingin hapus ${name} ?`);
            if (pesan) return true;
            else return false;
        }
    </script>
@endsection
