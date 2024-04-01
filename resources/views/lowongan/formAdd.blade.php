@extends('layout.main')


@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Tambah Data Lowongan</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('lowongan') }}'">
                                <i class="fas fa-plus-circle"></i>Kembali
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form method="POST" action="{{ url('lowongan') }}">
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
                                    <label for="exampleInputEmail1">Lowongan Kerja</label>
                                    <textarea name="nama" id="editor" cols="30" rows="10">{{ old('nama') }}</textarea>
                                   
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
