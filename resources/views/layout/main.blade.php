<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $namaaplikasi}}</title>
 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="{{asset('/')}}plugins/fontawesome-free/css/all.min.css">
 <!-- DataTables -->
 <link rel="stylesheet" href="{{asset('/')}}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="{{asset('/')}}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
 <link rel="stylesheet" href="{{asset('/')}}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="{{asset('/')}}dist/css/adminlte.min.css">
<!-- Toaster-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
.rating-css{
  justify-content: center;
  height: 80px;
  width: 465px;
 
  border:4px solid #838383;
  padding:5px;

}

.rating-css div {
  color:#ffe400;
  font-size: 20px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-weight: 200;
  text-align: center;
  text-transform: uppercase;
  padding:  0;

}

.rating-css input {
  display: none;

}

.rating-css input + label {
  font-size: 30px;
  text-shadow: 1px 1px 0 #ffe400;
  cursor: pointer;
  
}

.rating-css input:checked + label~label{
  color: #838383;
}


.rating-css label:active {
  transform: scale(0.8);
  

}


</style>







</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-success ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link btn" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link btn" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>

        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>

              </div>
            </div>
          </form>

        </div>
      </li>

   
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link btn color-white" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{$notif}}</span>
        </a>
     
      </li>
    
   
      <li class="nav-item-white">
        <a class="nav-link btn" href="{{ url('logout')}}"  role="button">
            <i class="nav-icon fas fa-sign-out-alt">Logout</i>
        </a>
      </li>


    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-success bg-success elevation-1">
    <!-- Brand Logo -->
    <a href="{{ asset('/')}}index3.html" class="brand-link">
      <img src="{{ asset('/')}}dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{$namaaplikasi}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('storage/'.$user->foto) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('user/profil')}}"  style="color:white;"class="d-block">{{ $user->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
  

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @include('layout.menu')
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('judul')</h1>
          </div>
          

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   @yield('isi')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2024 <a href=""></a>.</strong> {{$namaaplikasi}}.
  </footer>
  <!-- jQuery -->
  <script src="{{asset('/')}}plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('/')}}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="{{asset('/')}}plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{asset('/')}}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('/')}}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{asset('/')}}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="{{asset('/')}}plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="{{asset('/')}}plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="{{asset('/')}}plugins/jszip/jszip.min.js"></script>
  <script src="{{asset('/')}}plugins/pdfmake/pdfmake.min.js"></script>
  <script src="{{asset('/')}}plugins/pdfmake/vfs_fonts.js"></script>
  <script src="{{asset('/')}}plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="{{asset('/')}}plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="{{asset('/')}}plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('/')}}dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('/')}}dist/js/demo.js"></script>
  <!-- Page specific script -->


  <!-- sweet alert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
<!-- new swett alert-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- CK Editor-->
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>


<!-- Toastr -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- CK Editor-->


<!-- membuat grafik -->

<script type="text/javascript">
  $(document).on('click','.detail_view',function(){
    var _this=$(this).parents('tr');


$('#v_id').val(_this.find('.kode').text());
    $('#v_nama').val(_this.find('.nama').text());
    $('#v_foto').val(_this.find('.foto').text());

   $('#v_gender').val(_this.find('.gender').text());
    $('#v_usia').val(_this.find('.usia').text());
    $('#v_tempatlahir').val(_this.find('.tempatlahir').text());
    $('#v_tanggal_lahir').val(_this.find('.tanggal_lahir').text());
    $('#v_bulan_lahir').val(_this.find('.bulan_lahir').text());


});
</script>






<script type="text/javascript">
  $(document).on('click','.updatestatus_view',function(){
   var _this=$(this).parents('tr');
  
    
 

    $('#v_kodetransaksi').val(_this.find('.kodetransaksi').text());
    $('#').val(_this.find('.namaperawatan').text());
    $('#').val(_this.find('.idperawat').text());
    $('#').val(_this.find('.tanggal').text());

});
</script>

<script type="text/javascript">
  $(document).on('click','.ulasan_view',function(){
   var _this=$(this).parents('tr');
  
    
    $('#v_id').val(_this.find('.id').text());

    $('#v_kodetransaksi').val(_this.find('.kodetransaksi').text());
    $('#').val(_this.find('.namaperawatan').text());
    $('#').val(_this.find('.idperawat').text());
    $('#').val(_this.find('.tanggal').text());

});
</script>




<script>
  ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
          console.error( error );
      } );
</script>




<script>
@if (session('msg'))
toastr.success("{{ session('msg') }}",'System',{
  'progressBar': true,

});  
@endif
</script>


<!-- akhir membuat toas-->
<!-- sweet alert untuk membuat konfirmasi delete-->
<script>
  $('.deleteslider').click(function(){
    var profesiid=$(this).attr('data-id');
    var nama=$(this).attr('data-nama');

    swal({
              title: "Apa Anda Yakin Ingin Menghapus "+ nama +"",
              text: "Data anda akan terhapus ",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location="slider/delete/"+profesiid+""
                swal("Data "+nama+" berhasil dihapus!", {
                  icon: "success",
                });
              } else {
                swal("Data anda tidak jadi dihapus");
              }
            });
  });
             
</script>

<script>
  $('.deletetentang').click(function(){
    var profesiid=$(this).attr('data-id');
    var nama=$(this).attr('data-nama');

    swal({
              title: "Apa Anda Yakin Ingin Menghapus "+ nama +"",
              text: "Data anda akan terhapus ",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location="tentang/delete/"+profesiid+""
                swal("Data "+nama+" berhasil dihapus!", {
                  icon: "success",
                });
              } else {
                swal("Data anda tidak jadi dihapus");
              }
            });
  });
             
</script>

<script>
  $('.deletehubungi').click(function(){
    var profesiid=$(this).attr('data-id');
    var nama=$(this).attr('data-nama');

    swal({
              title: "Apa Anda Yakin Ingin Menghapus "+ nama +"",
              text: "Data anda akan terhapus ",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location="hubungi/delete/"+profesiid+""
                swal("Data "+nama+" berhasil dihapus!", {
                  icon: "success",
                });
              } else {
                swal("Data anda tidak jadi dihapus");
              }
            });
  });
             
</script>


<script>
  $('.deletelowongan').click(function(){
    var profesiid=$(this).attr('data-id');
    var nama=$(this).attr('data-nama');

    swal({
              title: "Apa Anda Yakin Ingin Menghapus "+ nama +"",
              text: "Data anda akan terhapus ",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location="lowongan/delete/"+profesiid+""
                swal("Data "+nama+" berhasil dihapus!", {
                  icon: "success",
                });
              } else {
                swal("Data anda tidak jadi dihapus");
              }
            });
  });
             
</script>


<script>
  $('.deleteblog').click(function(){
    var profesiid=$(this).attr('data-id');
    var nama=$(this).attr('data-nama');

    swal({
              title: "Apa Anda Yakin Ingin Menghapus "+ nama +"",
              text: "Data anda akan terhapus ",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location="blog/delete/"+profesiid+""
                swal("Data "+nama+" berhasil dihapus!", {
                  icon: "success",
                });
              } else {
                swal("Data anda tidak jadi dihapus");
              }
            });
  });
             
</script>


<script>
  $('.deletekategoriblog').click(function(){
    var profesiid=$(this).attr('data-id');
    var nama=$(this).attr('data-nama');

    swal({
              title: "Apa Anda Yakin Ingin Menghapus "+ nama +"",
              text: "Data anda akan terhapus ",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location="kategoriblog/delete/"+profesiid+""
                swal("Data "+nama+" berhasil dihapus!", {
                  icon: "success",
                });
              } else {
                swal("Data anda tidak jadi dihapus");
              }
            });
  });
             
</script>

<script>
  $('.deletekategoriperawatan').click(function(){
    var profesiid=$(this).attr('data-id');
    var nama=$(this).attr('data-nama');

    swal({
              title: "Apa Anda Yakin Ingin Menghapus "+ nama +"",
              text: "Data anda akan terhapus ",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location="kategoriperawatan/delete/"+profesiid+""
                swal("Data "+nama+" berhasil dihapus!", {
                  icon: "success",
                });
              } else {
                swal("Data anda tidak jadi dihapus");
              }
            });
  });
             
</script>

<script>
  $('.deletependidikan').click(function(){
    var profesiid=$(this).attr('data-id');
    var nama=$(this).attr('data-nama');

    swal({
              title: "Apa Anda Yakin Ingin Menghapus "+ nama +"",
              text: "Data anda akan terhapus ",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location="pendidikan/delete/"+profesiid+""
                swal("Data "+nama+" berhasil dihapus!", {
                  icon: "success",
                });
              } else {
                swal("Data anda tidak jadi dihapus");
              }
            });
  });
              
            
</script>

<script>
    $('.delete').click(function(){
      var profesiid=$(this).attr('data-id');
      var nama=$(this).attr('data-nama');

      swal({
                title: "Apa Anda Yakin Ingin Menghapus "+ nama +"",
                text: "Data anda akan terhapus ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  window.location="profesi/delete/"+profesiid+""
                  swal("Data "+nama+" berhasil dihapus!", {
                    icon: "success",
                  });
                } else {
                  swal("Data anda tidak jadi dihapus");
                }
              });
    });
                
              
  </script>

  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
   <script>
    $(function () {
      $("#example3").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
      $('#example4').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

</body>
</html>
