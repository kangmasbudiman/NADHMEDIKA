@extends('layout.main')


@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Edit Kategori Perawatan</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('kategoriperawatan') }}'">
                                <i class="fas fa-plus-circle"></i>Kembali
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                       
                            <form method="POST" action="{{ url('kategoriperawatan/'.$id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Id</label>
                                        <input type="text" value="{{ $id}}" readonly id="id"class="form-control plaintext  @error('id')is-invalid   @enderror" placeholder="Nama Profesi" name="id">
                                        @error('id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Pelayanan</label>
                                        <input type="text" value="{{$namaperawatan}}" class="form-control @error('namaperawatan')is-invalid   @enderror" placeholder="Nama Pendidikan" name="namaperawatan" id="namaperawatan"   >
                                        @error('namaperawatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Deskripsi</label>
                                        <textarea name="deskripsi" id="editor" cols="30" rows="10">{{ $deskripsi }}</textarea>
                                       
                                       <!--
                                     <input type="text" value="{{ old('deskripsi') }}"
                                            class="form-control @error('deskripsi')is-invalid   @enderror"
                                            placeholder="deskripsi " name="deskripsi" id="deskripsi">
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tarif</label>
                                        <input type="text" value="{{ $tarif}}"
                                            class="form-control @error('tarif')is-invalid   @enderror"
                                            placeholder="Tarif" name="tarif" id="tarif">
                                        @error('tarif')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Durasi Tarif</label>
                                        <select name="durasi" class="form-control @error('durasi')is-invalid   @enderror">
                                            <option value="{{ $durasi }}">{{$durasi}}</option>
                                           
                                            <option value="Jam">Jam</option>
                                            <option value="Hari">Hari</option>
                                            <option value="Bulan">Bulan</option>
                                            <option value="Tahun">Tahun</option>
                                               
                                          </select> @error('durasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
