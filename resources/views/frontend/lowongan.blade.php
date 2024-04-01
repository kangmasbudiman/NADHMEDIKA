@extends('frontend.main')
@section('isifrontend')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Lowongan</h2>
                <ol>
                    <li><a href="{{ asset('/') }}">Home</a></li>
                    <li>Lowongan</li>
                </ol>
            </div>

        </div>
    </section>
    <br>
    <br>
    <main id="main">
     
        <center>
            @if (session('msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> {{ session('msg') }}
               
            </div>
        @endif
            <h5>Daftar Menjadi Perawat NADH Medika</h5>

            <section id="contact" class="contact">

                <div class="card col-lg-8 mt-5 mt-lg-0">

                    <div class="container">
                        <div class=" mt-5 mt-lg-0">

                            <form method="POST" enctype="multipart/form-data" action="{{ url('inputlowongan') }}">
                                @csrf
                                <div class="row">
                                    <div class="card btn btn-warning">
                                        <div class="card-header">
                                            <h4>Data Diri</h4>
                                        </div>

                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="">Nama*</label>
                                        <input type="text" name="nama" class="form-control" id=""
                                            placeholder="Nama Pelamar" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                      <label for="">No-KTP*</label>
                                      <input type="number" pattern="[0-9]" onkeypress="return hanyaAngka(event)" name="ktp" class="form-control" id=""
                                          placeholder="Nomor KTP" required>
                                  </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">No HP*</label>
                                        <input type="text" name="hp" class="form-control" id="" onkeypress="return hanyaAngka(event)"
                                            placeholder="No HP/Wa" required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="">Jenis Kelamin</label>

                                        <select name="gender" class="form-control" required>

                                            <option value="">-</option>
                                            <option value="1">Pria</option>
                                            <option value="2">Wanita</option>

                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Usia</label>
                                        <input type="text" name="usia" class="form-control" id="" onkeypress="return hanyaAngka(event)"
                                            placeholder="Masukkan Usia Anda Saat ini" required>

                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Tempat Lahir</label>
                                        <input type="text" name="tempatlahir" class="form-control" id=""
                                            placeholder="Tempat Lahir" required>

                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="text" name="tanggallahir" class="form-control" id="" onkeypress="return hanyaAngka(event)"
                                            placeholder="Contoh 01" required>

                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Bulan Lahir</label>
                                        <input type="text" name="bulanlahir" class="form-control" id=""
                                            placeholder="Contoh Maret" required>

                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Tahun Lahir</label>
                                        <input type="text" name="tahunlahir" class="form-control" id="name" onkeypress="return hanyaAngka(event)"
                                            placeholder="Contoh 2002" required>


                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Tinggi Badan</label>
                                        <input type="text" class="form-control" name="tinggi_badan" id=""
                                            placeholder="Tinggi Badan Contoh (172 Cm)" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Berat Badan</label>
                                        <input type="text" class="form-control" name="berat_badan" id=""
                                            placeholder="Berat Badan Contoh (50 Kg)" required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="">Agama</label>
                                        <select name="agama" class="form-control" required>
                                            <option value="">-</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Katholik">Katholik</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Status</label>
                                        <select name="statuspernikahan" class="form-control" required>
                                            <option value="">-</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Merried</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Riwayat Penyakit</label>
                                        <input type="text" class="form-control" name="riwayat_penyakit"
                                            id="" placeholder="Riwayat Penyakit yang pernah diderita jika ada">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="">Sosial Media</label>
                                        <input type="text" class="form-control" name="sosmed" id=""
                                            placeholder="(FB/IG/LinkedLink)" required>
                                    </div>

                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Email" required>
                                    </div>
                                   

                                </div>
                                <div class="form-group">
                                  <label for="">Deskripsi Diri</label>
                                  <textarea class="form-control" name="deskripsi" id="summernote"></textarea>
                              </div>
      
                                <br>
                                <div class="card btn btn-warning">
                                    <div class="card-header">
                                        <h4>Lokasi</h4>
                                    </div>

                                </div>

                                <div class="form-group mt-3">
                                    <select name="provinsi" id="provinsi" class="form-control">
                                        <option value="-">Pilih Provinsi</option>
                                        @foreach ($provinces as $pv)
                                            <option value="{{ $pv->id }}">{{ $pv->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <select name="kabupaten" id="kabupaten" class="form-control">
                                        <option value="-">Pilih Kabupaten</option>

                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <select name="kecamatan" id="kecamatan" class="form-control">
                                        <option value="-">Pilih Kecamatan</option>

                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <select name="desa" id="desa" class="form-control">
                                        <option value="-">Pilih Desa</option>

                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="jalan" id=""
                                        placeholder="Jalan / Dusun dan RT/RW" required>



                                </div>



                                <br>
                                <div class="card btn btn-warning">
                                    <div class="card-header">
                                        <h4>Riwayat Pendidikan</h4>
                                    </div>

                                </div>

                                <div class="form-group mt-3">
                                    <Label>Pendidikan Terakhir</Label>
                                    <select name="idpendidikan" id="" class="form-control">
                                        <option value="-">Pilih Pendidikan</option>
                                        @foreach ($pendidikan as $item)
                                            <option value="{{ $item->id }}">{{ $item->namapendidikan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <Label>Nama Sekolah</Label>
                                    <input type="text" class="form-control" name="namasekolah" id=""
                                        placeholder="Nama Sekolah terakhir" required>

                                </div>
                                <div class="form-group mt-3">
                                    <Label>Jurusan</Label>
                                    <input type="text" class="form-control" name="jurusan" id=""
                                        placeholder="Jurusan" required>
                                </div>
                                <div class="form-group mt-3">
                                  <Label>Lulus Tahun</Label>
                                  <input type="text" class="form-control" name="lulustahun" id=""
                                    placeholder="Tahun Lulus Anda (Contoh 2000)" required>
                                                          
                              </div>
                              <div class="card btn btn-warning">
                                <div class="card-header">
                                    <h4>Informasi Lain</h4>
                                </div>

                            </div>
                              <div class="form-group mt-3">
                                <Label>Mengetahui Nadh Medika dari</Label>
                                <select name="dapatinfo" id="" class="form-control">
                                    <option value="-">Pilih</option>
                                    <option value="Iklan">Iklan</option>
                                    <option value="Sosmed">Sosmed</option>
                                    <option value="Tetangga">Tetangga</option>
                                    <option value="Radio">Radio</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Instagream">Instagram</option>
                               </select>
                            </div>
                            <div class="form-group mt-3">
                              <Label>Pelatihan yang diikuti</Label>
                              <input type="text" class="form-control" name="pelatihan" id=""
                                placeholder="Contoh(BTCLS, ACLS, DLL)" >
                                                      
                          </div>
                          <div class="form-group mt-3">
                            <Label>Sertifikat Yang di miliki</Label>
                            <input type="text" class="form-control" name="sertifikat" id=""
                              placeholder="Contoh(Sertifikat BTCLS, Sertifikat ACLS, DLL)" >
                                                    
                        </div>
                        <div class="form-group mt-3">
                          <Label>Memiliki STR Aktif</Label>
                          <select name="str" id="" class="form-control">
                              <option value="-">Pilih</option>
                              <option value="Ya">Ya</option>
                              <option value="Tidak">Tidak</option>
                                                     </select>
                      </div>
                      <div class="form-group mt-3">
                        <Label>Pengalaman Kerja</Label>
                        <input type="text" class="form-control" name="pengalaman" id=""
                          placeholder="Contoh(Perawat RS A, Perawat RS B, dll)" >
                                                
                    </div>

                    <div class="card btn btn-warning">
                      <div class="card-header">
                          <h4>File FIle</h4>
                      </div>

                  </div>
                    <div class="form-group mt-3">
                      <Label text-align: left>Pas Foto 3x4 (jpg,jpeg)</Label>
                      <input type="file" class="form-control" name="foto" id=""
                        >
                        @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror      
                  </div>
                  <div class="form-group mt-3">
                    <Label>KTP(jpg,jpeg)</Label>
                    <input type="file" class="form-control" name="filektp" id="">
                                 
                </div>
                <div class="form-group mt-3">
                  <Label>IJazah(jpg,jpeg, pdf)</Label>
                  <input type="file" class="form-control" name="ijazah" id="">
                               
              </div>
              <div class="form-group mt-3">
                <Label>STR(jpg,jpeg, pdf)</Label>
                <input type="file" class="form-control" name="filestr" id="">
                            
            </div>
            <div class="form-group mt-3">
              <Label>Sertifikat(jpg,jpeg, )</Label>
              <input type="file" class="form-control" name="filesertifikat" id="">
                           
          </div>
          <p>*Semua file yang di updload tidak boleh lebih dari 2mb</p>


<br>
 <div class="card btn btn-warning">
                      <div class="card-header">
                          <h4>Pernyataan</h4>
                      </div>
                     
                  </div>
                  <br>
                  
                <a href="{{url('/frontsyarat')}}">Syarat dan Ketentuan</a>
                  <br>
                  <br>

                  <fieldset class="question">
                    <input class="coupon_question" type="checkbox" name="coupon_question" value="1" />
                    <label for="coupon_question">Dengan ini saya menyatakan data yang saya berikan adalah benar/dapat dipertanggung jawabkan dan saya telah meyetujui</label>
                    
                   
                </fieldset>
             
                <fieldset class="answer">
                  <div class="text-center"><button type="submit" class="btn btn-success">Kirim
                    Lamaran</button></div>
                </fieldset>




                              
                                <br>
                            </form>

                        </div>

                    </div>

                </div>
                </div>

            </section><!-- End Contact Section -->
        </center>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>




    </main>
@endsection
<!-- Button trigger modal -->

