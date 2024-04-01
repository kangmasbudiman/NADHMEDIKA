<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $namaaplikasi }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/') }}plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('/') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/') }}dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            @if (session('msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


            <div class="card-header text-center">
                <a href="{{ asset('/') }}/index2.html" class="h1"><b>{{ $namaaplikasi }}</a>
            </div>
            <div class="card-body">

                <p class="login-box-msg">Pendaftaran Member Baru<br>Silahkan Lengkapi Data Dibawah ini</p>
                <form action="{{ url('login/prosesRegister') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input autofocus type="nama"
                            class="form-control
                            @error('nama')
                            is-invalid
                            @enderror
                            "
                            placeholder="Nama " name="nama"value="{{ old('nama') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="nowa"
                            class="form-control
                            @error('nowa')
                            is-invalid
                            @enderror
                            "
                            placeholder="No WhatsApp/HP" name="nowa"value="{{ old('nowa') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                        @error('nowa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="ktp"
                            class="form-control
                            @error('ktp')
                            is-invalid
                            @enderror
                            "
                            placeholder="NIK KTP" name="ktp"value="{{ old('ktp') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-book"></span>
                            </div>
                        </div>
                        @error('ktp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="input-group mb-3">
                        <select name="gender" class="form-control @error('gender')is-invalid   @enderror">

                            <option value="">-</option>
                            <option value="1">Pria</option>
                            <option value="2">Wanita</option>
                           
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
         

                   




                    <div class="input-group mb-3">
                        <input type="alamat"
                            class="form-control
                            @error('alamat')
                            is-invalid
                            @enderror
                            "
                            placeholder="Alamat" name="alamat"value="{{ old('alamat') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-home"> </span>
                            </div>
                        </div>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="input-group mb-3">
                        <input  type="username"
                            class="form-control
                            @error('username')
                            is-invalid
                            @enderror
                            "
                            placeholder="User Name" name="username"value="{{ old('username') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input  type="email"
                            class="form-control
                            @error('email')
                            is-invalid
                            @enderror
                            "
                            placeholder="Email" name="email"value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="input-group mb-3">
                        <input type="password"
                            class="form-control 
                        @error('password')
                        is-invalid
                        @enderror
                        "
                            name="password"placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <!-- /.social-auth-links -->


                <p class="mb-0">
                    <a href="{{ asset('login') }}" class="text-center">I already have a membership</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/') }}dist/js/adminlte.min.js"></script>
</body>

</html>
