@extends('layout.main')


@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Eddit Jobs Detail</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('job') }}'">
                                <i class="fas fa-plus-circle"></i>Kembali
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form method="POST" enctype="multipart/form-data" action="{{ url('job/updatejobdetail') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                       
                                        <input type="hidden" value="{{ $id }}"
                                            id="id"class="form-control  @error('id')is-invalid   @enderror"
                                            placeholder="Job Title" name="id" readonly>
                                      
                                    </div>
                                    <div class="form-group">
                                       
                                        <input type="text" value="{{ $idJobs }}"
                                            id="idJobs"class="form-control  @error('idJobs')is-invalid   @enderror"
                                            placeholder="Job Title" name="idJobs" readonly>
                                      
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Deskripsi</label>
                                        <textarea class="form-control @error('deskripsi')is-invalid   @enderror" rows="3" placeholder="Enter ..." name="deskripsi" >{{$deskripsi}}</textarea>
                                      
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Status</label>
                                        <select name="status" class="form-control @error('status')is-invalid   @enderror">
                                            <option value="{{$status}}"><?php
                                                    if($status==1){
                                                        echo "Antrian";
                                                    }elseif ($status==2) {
                                                        echo "Proses";
                                                    }elseif($status==3){
                                                        echo "Pending";
                                                    }else{
                                                        echo "Selesai";
                                                    }
                                                ?>
                                            </option>
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
                                    @if($file)
                                    <img src="{{asset('storage/'.$file)}}" class="img-thumbnail" style="width: 50%">
                                    @else
                                    <span class="badge badge-danger">Belum Ada Foto</span>
                                    @endif


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
