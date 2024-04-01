@extends('frontend.main')
@section('isifrontend')
    <!-- ======= Hero Section ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2></h2>
                <ol>
                    <li><a href="{{ asset('/') }}">Home</a></li>
                    <li>Daftar Perawat</li>
                </ol>
            </div>

        </div>
    </section>

    <main id="main">
        <br>
        <br>
        <br>

<center><h3>Selamat Pendaftaran anda berhasil silahkan tunggu pesan dari Kami selanjutnya</h3></center>
<center><h5>SIlahkan Simpan Kode Transaksi ini ({{$idterahir}}) <br>untuk di konfirmasi ke bagian Administrasi</h5></center>
<br>
<br>

<br>
        <form action="{{ url('inputkunjungan_aksi') }}" method="POST">
            @csrf

          


        </form>















    </main><!-- End #main -->
@endsection
