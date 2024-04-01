@extends('layout.main')
@section('judul')
    
@endsection

@section('isi')
    <section class="content">


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Timeline</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Timeline</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        @foreach($detailjob as $item)
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                
                <span class="bg-red">{{$item->created_at->format('Y:m:d')}}</span>
              </div>
              <div>
                <i class="fas fa-list bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> {{$item->created_at->format('H:i:s')}}</span>
                <!--  <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3> -->
                  <div class="timeline-body">
                    
                    <strong><span>Deskripsi</span></strong>
                    <br>
                    {{$item->deskripsi}}
                  </div>
                  <div class="timeline-body">
                    <img src="{{asset('storage/'.$item->file)}}"  width=20% alt="...">
                   
                  </div>
                  <div class="timeline-footer">
                   
                  </div>
                </div>
              </div>
              
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
        
      </div>
      @endforeach
      <!-- /.timeline -->

    </section>
    <!-- /.content -->
  </div>
</section>
<script>
  function deleteData(jobTitle){
    pesan= confirm(`Yakin ingin hapus ${jobTitle} ?`);
    if(pesan)return true;
    else return false;
  }
</script>
@endsection