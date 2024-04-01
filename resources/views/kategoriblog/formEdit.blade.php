@extends('layout.main')


@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Edit Kategori Blog</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('kategoriblog') }}'">
                                <i class="fas fa-plus-circle"></i>Kembali
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                       
                            <form method="POST" action="{{ url('kategoriblog/'.$id) }}">
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
                                        <label for="exampleInputEmail1">Nama Kategori Blog</label>
                                        <input type="text" value="{{$nama}}" class="form-control @error('nama')is-invalid   @enderror" placeholder="Nama Pendidikan" name="nama" id="nama"   >
                                        @error('nama')
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
