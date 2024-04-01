<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{$namaaplikasi}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}"/>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">





  <!-- Vendor CSS Files -->
  <link href="{{ asset('/')}}assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/')}}assets/css/style.css" rel="stylesheet">




  <!-- add summernote-->

  <!-- =======================================================
  * Template Name: Sailor
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">PT. Nadh Medika</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      @include('frontend.menu')


    </div>
  </header>

  @yield('isifrontend')

  




  <!-- End Header -->






  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          @foreach($hubungi as $in)
          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>{{$namaaplikasi}}</h3>
              <p>{{$in->alamat}}
                   <br>
                <br><br>
                <strong>Phone:</strong> {{$in->telp}}<br>
                <strong>Email:</strong> {{$in->email}}<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>
          @endforeach

  

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>DAFTAR PELAYANAN</h4>
            <ul>
             @foreach($pelayanan as $pel)
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{$pel->namaperawatan}}</a></li>
             @endforeach
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Rating Pelayanan Kami</h4>
            <ul>
              <li><label class="fa fa-star"></label> <a href="#">Kecepatan Pelayanan <svg xmlns="http://www.w3.org/2000/svg" height="15" width="16.25" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#FFD43B" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg></a>{{$nilaikecepatanlayanan}}</li>
              <li><label class="fa fa-star"></label> <a href="#">Kualitas Pelayanan <svg xmlns="http://www.w3.org/2000/svg" height="15" width="16.25" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#FFD43B" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg> </a>{{$nilaikualitas}}</li>
              <li><label class="fa fa-star"></label> <a href="#">Respon Pelayanan <svg xmlns="http://www.w3.org/2000/svg" height="15" width="16.25" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#FFD43B" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg></a>{{$nilairespon}}</li>
              <li>  <label class="fa fa-star"></label><a href="#">Petugas <svg xmlns="http://www.w3.org/2000/svg" height="15" width="16.25" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#FFD43B" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg> </a>{{$nilaipetugas}}</li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Buletin kami</h4>
            <p>Berlangganan Pesan</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>{{$namaaplikasi}}</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
     
      </div>
    </div>
  </footer>





  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('/')}}assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('/')}}assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('/')}}assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('/')}}assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('/')}}assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{ asset('/')}}assets/vendor/php-email-form/validate.js"></script>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('/')}}assets/js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>





<script>
         function hanyaAngka(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
</script>


<script>
$(".answer").hide();
$(".coupon_question").click(function() {
    if($(this).is(":checked")) {
        $(".answer").show();
    } else {
        $(".answer").hide();
    }
});

</script>


  
  <script>
    $(function(){
      $.ajaxSetup({
        headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
      });

      $(function(){
        $('#provinsi').on('change',function(){
          let id_provinsi=$('#provinsi').val();
          $.ajax({
            type:'POST',
            url:"{{url('getkabupaten')}}",
            data: {id_provinsi: id_provinsi},
            cache:false,
            
            success:function(msg){
              $('#kabupaten').html(msg);
              $('#kecamatan').html('');
              $('#desa').html('');
              },
              error:function(data){
                console.log('error:',data);
              }
          })
        })
      })

      $(function(){
        $('#kabupaten').on('change',function(){
          let id_kabupaten=$('#kabupaten').val();
          console.log(id_kabupaten);
          $.ajax({
            type:'POST',
            url:"{{url('getkecamatan')}}",
            data: {id_kabupaten: id_kabupaten},
            cache:false,
            
            success:function(msg){
             
              $('#kecamatan').html(msg);
              $('#desa').html('');
              },
              error:function(data){
                console.log('error:',data);
              }
          })
        })
      })


      $(function(){
        $('#kecamatan').on('change',function(){
          let id_kecamatan=$('#kecamatan').val();
          
          $.ajax({
            type:'POST',
            url:"{{url('getdesa')}}",
            data: {id_kecamatan: id_kecamatan},
            cache:false,
            
            success:function(msg){
             
            
              $('#desa').html(msg);
              },
              error:function(data){
                console.log('error:',data);
              }
          })
        })
      })



    });
  </script>

</body>

</html>