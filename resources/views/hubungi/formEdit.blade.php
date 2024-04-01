@extends('layout.main')


@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Edit Hubungi Kami</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('hubungi') }}'">
                                <i class="fas fa-plus-circle"></i>Kembali
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                       
                            <form method="POST" action="{{ url('hubungi/'.$id) }}">
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
                                        <label for="exampleInputEmail1">Deskripsi</label>
                                        <textarea name="nama" id="editor" cols="30" rows="10">{{$nama}}</textarea>
                                       
                                       <!--
                                     <input type="text" value="{{ old('deskripsi') }}"
                                            class="form-control @error('deskripsi')is-invalid   @enderror"
                                            placeholder="deskripsi " name="deskripsi" id="deskripsi">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    -->
                                    </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Link Google Map</label>
                                    <input type="text"  value="{{$linkmap}}"
                                        class="form-control @error('linkmap')is-invalid   @enderror"
                                        placeholder="linkmap " name="linkmap" id="linkmap"> 
                                    @error('linkmap')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                  
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat</label>
                                    <input type="text"  value="{{$alamat}}"
                                        class="form-control @error('alamat')is-invalid   @enderror"
                                        placeholder="alamat " name="alamat" id="alamat"> 
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">email</label>
                                    <input type="text"  value="{{$telp}}"
                                        class="form-control @error('telp')is-invalid   @enderror"
                                        placeholder="telp " name="telp" id="telp"> 
                                    @error('telp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text"  value="{{$email}}"
                                        class="form-control @error('email')is-invalid   @enderror"
                                        placeholder="email " name="email" id="email"> 
                                    @error('email')
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
