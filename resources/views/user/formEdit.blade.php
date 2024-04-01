@extends('layout.main')


@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Edit Data User</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('user') }}'">
                                <i class="fas fa-plus-circle"></i>Kembali
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form method="POST" enctype="multipart/form-data" action="{{ url('user/' . $id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="hidden" value="{{ $id }}"
                                            id="id"class="form-control plaintext  @error('id')is-invalid   @enderror"
                                            placeholder="Job Title" name="id">


                                        <input type="text" value="{{ $name }}"
                                            id="name"class="form-control plaintext  @error('name')is-invalid   @enderror"
                                            placeholder="Job Title" name="name">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gender</label>
                                        <select name="gender" class="form-control @error('gender')is-invalid   @enderror">

                                            <option value="{{ $gender }}"> {{ $gender == 1 ? 'Pria' : 'Wanita' }}
                                            </option>
                                            <option value="1">Pria</option>
                                            <option value="2">Wanita</option>

                                        </select>


                                        @error('gender')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror


                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Agama</label>
                                        <select name="agama" class="form-control @error('agama')is-invalid   @enderror">

                                            <option value="{{$agama}}">{{$agama}}</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                        </select>
                             
                                        @error('agama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tempat Lahir </label>
                                        <input type="text" value="{{ $tempat }}"
                                            id="name"class="form-control  @error('tempat')is-invalid   @enderror"
                                            placeholder="Tempat Lahir" name="tempat">
                                        @error('tempat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal Lahir </label>
                                        <input type="date" value="{{ $tanggal }}"
                                            id="name"class="form-control  @error('tanggal')is-invalid   @enderror"
                                            placeholder="Tempat Lahir" name="tanggal">
                                        @error('tanggal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" value="{{ $username }}"
                                            class="form-control @error('username')is-invalid   @enderror"
                                            placeholder="User Name" name="username" id="username">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" value="{{ $email }}"
                                            class="form-control @error('email')is-invalid   @enderror" placeholder="Email"
                                            name="email">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">No NIK KTP</label>
                                        <input type="text" value="{{ $ktp }}"
                                            class="form-control @error('ktp')is-invalid   @enderror" placeholder="NIK KTP"
                                            name="ktp">
                                        @error('ktp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Level</label>
                                        <select name="level" class="form-control @error('level')is-invalid   @enderror">

                                            <option value="{{ $status }}">{{ $status == 1 ? 'Admin' : 'Staff' }}
                                            </option>
                                            <option value="1">Admin</option>
                                            <option value="2">Staff</option>
                                        </select>

                                        @error('level')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Profesi</label>
                                        <select name="idprofesi"
                                            class="form-control @error('idprofesi')is-invalid   @enderror">
                                            <option value="{{ $idprofesi }}">
                                                <?php
                                                $data = DB::table('profesi')
                                                    ->where('id', $idprofesi)
                                                    ->first();
                                                if ($data) {
                                                    echo $data->namaprofesi;
                                                } else {
                                                    echo '';
                                                }
                                                ?>
                                            </option>
                                            @foreach ($profesi as $item)
                                                <option value="{{ $item->id }}">{{ $item->namaprofesi }}</option>
                                            @endforeach

                                        </select>
                                        @error('idprofesi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pendidikan Terakhir</label>
                                        <select name="idpendidikan"
                                            class="form-control @error('idpendidikan')is-invalid   @enderror">
                                            <option value="{{ $idpendidikan }}">
                                                <?php
                                                $data = DB::table('pendidikan')
                                                    ->where('id', $idpendidikan)
                                                    ->first();
                                                if ($data) {
                                                    echo $data->namapendidikan;
                                                } else {
                                                    echo '';
                                                }
                                                ?>
                                            </option>
                                            @foreach ($pendidikan as $item)
                                                <option value="{{ $item->id }}">{{ $item->namapendidikan }}</option>
                                            @endforeach

                                        </select>
                                        @error('idpendidikan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Perawatan</label>
                                        <select name="idperawatan"
                                            class="form-control @error('idpendidikan')is-invalid   @enderror">
                                            <option value="{{ $idperawatan }}">
                                                <?php
                                                $data = DB::table('kategori_perawatan')
                                                    ->where('id', $idperawatan)
                                                    ->first();
                                                if ($data) {
                                                    echo $data->namaperawatan;
                                                } else {
                                                    echo '';
                                                }
                                                ?>
                                            </option>
                                            @foreach ($perawatan as $item)
                                                <option value="{{ $item->id }}">{{ $item->namaperawatan }}</option>
                                            @endforeach

                                        </select>
                                        @error('idperawatan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Foto Profil</label>
                                        <div class="col-sm-10">
                                            <input type="file" accept="image/*"
                                                class="form-control @error('file')is-invalid   @enderror"
                                                placeholder="Target" name="file"> @error('file')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>



                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
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
@endsection
