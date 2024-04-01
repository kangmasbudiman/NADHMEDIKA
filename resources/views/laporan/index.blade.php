@extends('layout.main')
@section('judul')
    
@endsection

@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card ">
                        <div class="card-header text-left ">
                            Periode Laporan
                        <!-- /.card-header -->  
                        <div class="card-body">
                            
                            <form method="POST" action="{{ url('laporanuser/aksi') }}">
                                @csrf
                                <div class="card-body">
                                              
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tanggal  </label>
                                                <input type="date" value="{{old('tanggal')}}" id="name"class="form-control  @error('tanggal')is-invalid   @enderror" placeholder="Tempat Lahir" name="tanggal">
                                                @error('tanggal')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Sampai Dengan  </label>
                                                <input type="date" value="{{old('tanggal1')}}" id="name"class="form-control  @error('tanggal1')is-invalid   @enderror" placeholder="Tempat Lahir" name="tanggal1">
                                                @error('tanggal')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                        
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
    <script>
      function deleteData(name){
        pesan= confirm(`Yakin ingin hapus ${name} ?`);
        if(pesan)return true;
        else return false;
      }
    </script>
@endsection
