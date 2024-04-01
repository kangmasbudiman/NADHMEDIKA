@extends('layout.main')


@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Silahkan Pilih Pelayanan anda</h3>
                         
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (session('msg'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Selamat</strong> {{ session('msg') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <br>
                            <center>
                                <form method="POST" enctype="multipart/form-data" action="{{ url('pelayanan/perawatcari') }}">
                                  @csrf
                                      <table class="tg" width="70%">
  
                                          <tbody>
                                              <tr>
                                                  <td class="tg-0pky">
  
                                                      <div class="row">
                                                          <div class="col-md-6 form-group">
                                                            
                                                            <div class="form-group">
                                                             
                                                              <select name="idpelayanan" class="form-control @error('idpelayanan')is-invalid   @enderror">
                                                                  <option value="">Perawat Yang Dibutuhkan</option>
                                                                  @foreach ($pelayanan as $item)
                                                                  <option value="{{$item->id}}">{{$item->namaperawatan}}</option>
                                                              @endforeach
                          
                                                                </select>
                                                              @error('idpelayanan')
                                                                  <div class="invalid-feedback">
                                                                      {{ $message }}
                                                                  </div>
                                                              @enderror
                                                          </div>
                                                       <br>
                                                          <div class="form-group">
                                                             
                                                            <select name="gender" class="form-control @error('gender')is-invalid   @enderror">
                                                                <option value="">Pilih Pria/Wanita</option>
                                                               
                                                                <option value="1">Pria</option>
                                                                <option value="2">Wanita</option>
                                                           
                        
                                                              </select>
                                                            @error('gender')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                             
                                                            <input type="date"  name="tanggal" class="form-control" >
                                                              @error('lokasi')
                                                                  <div class="invalid-feedback">
                                                                      {{ $message }}
                                                                  </div>
                                                              @enderror
                                                          </div>
                                                     
                                                      
  
  
  
                                                          </div>
                                                          <div class="col-md-6 form-group mt-3 mt-md-0">
                                                            <div class="form-group">
                                                            
                                                              <select name="durasi" class="form-control @error('durasi')is-invalid   @enderror">
                                                                  <option value="">Durasi Kontrak</option>
                                                                 
                                                                  <option value="14">14 Hari</option>
                                                                  <option value="91">3 Bulan</option>
                                                                  <option value="183">6 Bulan</option>
                                                                  <option value="365">1 Tahun</option>
                                                                     
                                                                </select> @error('durasi')
                                                                  <div class="invalid-feedback">
                                                                      {{ $message }}
                                                                  </div>
                                                              @enderror
                                                          </div>
                                                          <br>
                                                          <div class="form-group">
                                                             
                                                            <select name="lokasi" class="form-control @error('lokasi')is-invalid   @enderror">
                                                                <option value="">Lokasi</option>
                                                                <option value="Jambi Kota">Jambi Kota</option>
                                                                <option value="Muaro Jambi">Muaro Jambi</option>
                                                                <option value="Bulian">Bulian</option>
                                                                               
                                                              </select>
                                                            @error('lokasi')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                    
                                                          </div>
                                                      </div>
                                                      <br>
                                                     
  
  
                                                  </td>
  
                                              </tr>
                                          </tbody>
                                      </table>
  
                         
                                     
  
                                      <div class="single-form col-md-10 col-xs-10" style="margin-top:10px">
                                          <button type="submit" class="form-control"
                                              style="background-color:#14eb55;border-radius: 25px">CARI PELAYANAN</button>
                                      </div>
  
                                  </form>
                              </center>




                         
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
      function deleteData(namaaplikasi){
        pesan= confirm(`Yakin ingin hapus ${namaaplikasi} ?`);
        if(pesan)return true;
        else return false;
      }
    </script>
@endsection
