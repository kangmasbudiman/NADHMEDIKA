@extends('layout.main')


@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Edit Data Client</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('user') }}'">
                                <i class="fas fa-plus-circle"></i>Kembali
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                       
                            <form method="POST" action="{{ url('client/'.$id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Client</label>
                                        <input type="hidden" value="{{ $id}}"  id="id"class="form-control plaintext  @error('id')is-invalid   @enderror" placeholder="Job Title" name="id">
  
                                        
                                        <input type="text" value="{{ $namaClient}}"  id="namaClient"class="form-control plaintext  @error('namaClient')is-invalid   @enderror" placeholder="Job Title" name="namaClient">
                                        @error('namaClient')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nomor HP Client</label>
                                        <input type="text" value="{{ $nomorClient}}" id="nomorClient"class="form-control  @error('nomorClient')is-invalid   @enderror" placeholder="Tempat Lahir" name="nomorClient">
                                        @error('nomorClient')
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
