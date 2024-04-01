@extends('layout.main')


@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Detail Jobs</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('job') }}'">
                                <i class="fas fa-plus-circle"></i>Kembali
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form method="POST" enctype="multipart/form-data" action="{{ url('job/addjobdetail') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                       
                                        <input type="hidden" value="{{ $idJob }}"
                                            id="idJob"class="form-control  @error('idJob')is-invalid   @enderror"
                                            placeholder="Job Title" name="idJob" readonly>
                                        @error('idJob')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Deskripsi</label>
                                        <textarea class="form-control @error('deskripsi')is-invalid   @enderror" rows="3" placeholder="Enter ..." name="deskripsi"  value="{{ old('deskripsi') }}"></textarea>
                                      
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                 







                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Status</label>
                                        <select name="status" class="form-control @error('status')is-invalid   @enderror">
                                            <option value="">-</option>
                                            <option value="1">Antrian</option>
                                            <option value="2">Proses</option>
                                            <option value="3">Pending</option>
                                            <option value="4">Selesai</option>
                                          

                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">File</label>
                                        <input type="file" accept="image/*" class="form-control @error('file')is-invalid   @enderror"
                                            placeholder="Target" name="file"> @error('file')
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
