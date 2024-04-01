@extends('layout.main')


@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Tambah Client</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('client') }}'">
                                <i class="fas fa-plus-circle"></i>Kembali
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                       
                            <form method="POST" action="{{ url('client') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama  Client</label>
                                        <input type="text" value="{{old('namaClient')}}" id="nameClient"class="form-control  @error('nameClient')is-invalid   @enderror" placeholder="Nama" name="namaClient">
                                        @error('nameClient')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                   

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nomor Client</label>
                                        <input type="text" value="{{old('nomorClient')}}" id="nomorClient"class="form-control  @error('nomorClient')is-invalid   @enderror" placeholder="nomorClient" name="nomorClient">
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
