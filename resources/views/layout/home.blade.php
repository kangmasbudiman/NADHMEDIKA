@extends('layout.main')
@section('judul')
    DASHBOARD <strong>{{ $namaaplikasi }}</strong>
@endsection

@section('isi')
    <section class="content">
        @if ($user->level == 1)
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jumlahjob }}</h3>

                            <p>Total Pelayanan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $jumlahjobantrian }}<sup style="font-size: 20px"></sup></h3>

                            <p>Total Pelayanan Dalam Antrian</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $jumlahjobselesai }}</h3>

                            <p>Total Pelayanan Selesai</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $jumlah }}</h3>

                            <p>Total User</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>{{ $jumlahperawat }}</h3>

                            <p>Total Perawat</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-indigo">
                        <div class="inner">
                            <h3>{{ $calonperawat }}</h3>

                            <p><a class="" style="color:white;"href="{{url('user/lamaranperawat')}}">Total Lamaran Perawat</a></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        

                    </div>
                </div>



                <!-- ./col -->
            </div>
            <!-- /.r

        <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Grafik Pertumbuhan Pasien Perbulan</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">


                    
                    <div id="grafik">

                    </div>


                </div>
               
            </div>
            <!-- /.card -->
        @endif
        @if ($user->level == 2)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Selamat Datang {{ $user->username }}</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $jumlahmyhomecare }}<sup style="font-size: 20px"></sup></h3>

                                    <p>Total My Homecare</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer-->
            </div>
        @endif
    </section>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
    

    var pasien= <?php echo json_encode($pasien)?>;
    var bulan= <?php echo json_encode($bulannya)?>;

   
   
       
 
      Highcharts.chart('grafik',{
        title:{
          text:'Grafik Pasien'
        },
        xAxis:{
          categories: bulan
        },
        yAxis:{
          title:{
            text: 'Jumlah Pasien'
          },
          
        },
        plotOptions:{
          series:{
            allowPointSelect: true,
          }
        },
        series:[
          {
            name:'Total Pasien',
            data:pasien,
          }
        ]
      });
      </script>

@endsection
