@extends('frontend.main')
@section('isifrontend')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Syarat dan Ketentuan </h2>
                <ol>
                    <li><a href="{{ asset('/') }}">Home</a></li>
                    <li>Syarat dan Ketentuan</li>
                </ol>
            </div>

        </div>
    </section>
    <br>
    <br>
    <main id="main">
        <center>
        <section id="contact" class="contact">
            <div class="card col-lg-8 mt-5 mt-lg-0">
                <div class="container">
                    <div class=" mt-5 mt-lg-0">
                       
                            @foreach ($syarat as $item)
                                <p>{{ $item->deskripsi }}</p>
                            @endforeach
                       
                    </div>
                </div>
            </div>
        </section>
    </center>









    </main>
@endsection
<!-- Button trigger modal -->
