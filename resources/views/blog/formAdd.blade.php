@extends('layout.main')


@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Tambah Data Blog</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('blog') }}'">
                                <i class="fas fa-plus-circle"></i>Kembali
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form method="POST" enctype="multipart/form-data" action="{{ url('blog') }}">
                                @csrf
                                <div class="card-body">
                                   <!-- 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Id Job</label>
                                        <input type="text" value="{{ old('idJob') }}"
                                            id="idJob"class="form-control  @error('idJob')is-invalid   @enderror"
                                            placeholder="Job Title" name="idJob">
                                        @error('idJob')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                -->
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kategori Blog</label>
                                    <select name="idkategori" class="form-control @error('idkategori')is-invalid   @enderror">
                                        <option value="">-</option>
                                        @foreach ($datakategori as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach

                                      </select>
                                    @error('idkategori')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Judul</label>
                                        <input type="text" value="{{ old('judul') }}"
                                            class="form-control @error('judul')is-invalid   @enderror"
                                            placeholder="judul " name="judul" id="judul">
                                        @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Deskripsi</label>
                                        <textarea name="deskripsi" id="editor" cols="30" rows="10">{{ old('deskripsi') }}</textarea>
                                       
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
                                        <label for="exampleInputEmail1">Status Trending</label>
                                        <select name="statustrending" class="form-control @error('statustrending')is-invalid   @enderror">
                                            <option value="">-</option>
                                           
                                            <option value="Trending">Trending</option>
                                            <option value="Populer">Populer</option>
                                            <option value="Biasa">Biasa</option>
                                               
                                          </select> @error('statustrending')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Penulis</label>
                                        <input type="text" readonly value="{{ $user->name }}"
                                            class="form-control @error('penulis')is-invalid   @enderror"
                                            placeholder="penulis " name="penulis" id="judul">
                                        @error('penulis')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                       
                                        <input type="hidden" readonly value="{{ $user->id }}"
                                            class="form-control @error('iduser')is-invalid   @enderror"
                                            placeholder="iduser " name="iduser" id="judul">
                                        @error('iduser')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Thumbanil</label>
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
