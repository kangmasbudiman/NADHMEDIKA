@extends('layout.main')


@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Edit Tentang</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('tentang') }}'">
                                <i class="fas fa-plus-circle"></i>Kembali
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ url('tentang/'.$id) }}">
                                @csrf
                                @method('PUT')
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
                                        <label for="exampleInputEmail1">Judul</label>
                                        <input type="text" value="{{ $judul }}"
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
                                        <textarea name="deskripsi" id="editor" cols="30" rows="10">{{ $deskripsi}}</textarea>
                                       
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
