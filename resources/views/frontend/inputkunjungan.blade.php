@extends('frontend.main')
@section('isifrontend')
    <!-- ======= Hero Section ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Lengkapi Data Kunjungan</h2>
                <ol>
                    <li><a href="{{ asset('/') }}">Home</a></li>
                    <li>Lengkapi data</li>
                </ol>
            </div>

        </div>
    </section>

    <main id="main">
        <br>
        <br>
        <br>



        <form action="{{ url('inputkunjungan_aksi') }}" method="POST">
            @csrf

            <center>
                <table class="tg" width="70%">

                    <tbody>
                        <tr>
                            <td class="tg-0pky">

                                <div class="row">
                                    <div class="col-md-6 form-group">

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" 
                                            class="form-control @error('nama')is-invalid   @enderror"
                                            placeholder="Nama Pasien"  name="nama">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputEmail1">No HP/WA</label>
                                      <input type="number" 
                                          class="form-control   @error('hp')is-invalid   @enderror"
                                          placeholder="No HP/WA"  name="hp" pattern="[0-9]*">
                                      @error('hp')
                                          <div class="invalid-feedback">
                                              {{ $message }}
                                          </div>
                                      @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal</label>
                                    <input type="date"
                                        class="form-control @error('tanggal')is-invalid   @enderror"
                                        placeholder="Target" name="tanggal">
                                    @error('tanggal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                  <br>
                                  <br>                               

                                     





                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                      <div class="form-group">
                                        <label for="">Pelayanan Yang Dibutuhkan</label>
                                        <select name="idpelayanan"
                                            class="form-control @error('idpelayanan')is-invalid   @enderror">
                                            <option value="{{ $idpelayanan }}">
                                                <?php
                                                $data = DB::table('kategori_perawatan')
                                                    ->where('id', $idpelayanan)
                                                    ->first();
                                                echo $data->namaperawatan;
                                                ?>
                                            </option>
                                            @foreach ($pelayanan as $item)
                                                <option value="{{ $item->id }}">{{ $item->namaperawatan }}</option>
                                            @endforeach

                                        </select>
                                        @error('idpelayanan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Perawat</label>
                                        <input type="text" readonly
                                            class="form-control @error('namaperawat')is-invalid   @enderror"
                                            placeholder="Target" value={{ $namaperawat }} name="namaperawat">
                                        @error('namaperawat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <input type="hidden" readonly
                                          class="form-control @error('idperawat')is-invalid   @enderror"
                                          placeholder="Target" value={{ $idperawat }} name="idperawat">
                                  

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Lokasi</label>
                                        <input type="text" readonly
                                            class="form-control @error('lokasi')is-invalid   @enderror"
                                            placeholder="Target" value={{ $lokasi }} name="lokasi">
                                        @error('lokasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                      <input type="hidden">
                                        <div class="form-group">
                                            <label for="">Durasi Pelayanan</label>
                                            <select name="durasi"
                                                class="form-control @error('durasi')is-invalid   @enderror">
                                                <option value="{{ $durasi }}">{{ $durasi }}</option>

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
                                      

                                      


                                    </div>



                                </div>
                                <br>
                                <br>


                            </td>

                        </tr>
                    </tbody>

                </table>
                <button class="btn btn-warning ">Submit</button>
            </center>


        </form>















    </main><!-- End #main -->
@endsection
