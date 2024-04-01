@extends('layout.main')


@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Edit Setting</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('setting') }}'">
                                <i class="fas fa-plus-circle"></i>Kembali
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                       
                            <form method="POST" action="{{ url('settingupdate') }}">
                                @csrf
                               
                                <div class="card-body">
                                    <div class="form-group">
                                       
                                        <input type="hidden" value="{{ $id}}" readonly id="idJob"class="form-control plaintext  @error('idJob')is-invalid   @enderror" placeholder="Job Title" name="id">
                                        @error('id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Aplikasi</label>
                                        <input type="text" value="{{ $namaaplikasi}}"  id="idJob"class="form-control plaintext  @error('idJob')is-invalid   @enderror" placeholder="Job Title" name="namaaplikasi">
                                        @error('namaaplikasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Total</label>
                                        <input type="text" class="form-control @error('target')is-invalid   @enderror" placeholder="Target"  value={{ $target}} name="target">
                                        @error('target')
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
