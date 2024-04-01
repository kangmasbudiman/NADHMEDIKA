@extends('layout.main')


@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Edit Job</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('job') }}'">
                                <i class="fas fa-plus-circle"></i>Kembali
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                       
                            <form method="POST" action="{{ url('job/'.$idjob) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Id Job</label>
                                        <input type="text" value="{{ $idjob}}" readonly id="idJob"class="form-control plaintext  @error('idJob')is-invalid   @enderror" placeholder="Job Title" name="idJob">
                                        @error('idJob')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Judul Pekerjaan</label>
                                        <input type="text" value="{{$jobTitle}}" class="form-control @error('jobTitle')is-invalid   @enderror" placeholder="Job Title" name="jobTitle" id="jobTitle"   >
                                        @error('jobTitle')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                  
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Client</label>
                                        <select name="namaClient" class="form-control @error('namaClient')is-invalid   @enderror">
                                            <option value="{{$namaClient}}">
                                                <?php
                                                $data=DB::table('client')->where('id',$namaClient)->first();
                                                echo $data->nama;                                                
                                                ?>
                                            </option>
                                            @foreach ($dataclient as $item)
                                            <option value="{{$item->id}}">{{$item->nama}}</option>
                                            @endforeach

                                          </select>
                                        @error('namaClient')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Staff</label>
                                        <select name="idUser" class="form-control @error('idUser')is-invalid   @enderror">
                                            <option value="{{$idUser}}"><?php
                                                        $data=DB::table('users')->where('id',$idUser)->first();
                                                        echo $data->name;                                                
                                                ?></option>
                                            @foreach ($datauser as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach

                                        </select>
                                        @error('idUser')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Total</label>
                                        <input type="text" class="form-control @error('total')is-invalid   @enderror" placeholder="Target"  value={{ $total}} name="total">
                                        @error('total')
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
