@extends('layout.main')
@section('judul')
    Job List
@endsection

@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Job List</h3>
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="window.location='{{ url('job/add') }}'">
                                <i class="fas fa-plus-circle"></i>Tambah Data
                            </button>
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

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Job</th>
                                        <th>Job Title</th>
                                        <th>User</th>
                                        <th>Client</th>
                                        <th>Status</th>
                                        <th>Last Update</th>
                                        <th>Target</th>
                                        <th>#</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($jobs as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->idjob }}</td>
                                            <td>{{ $row->jobTitle }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>
                                               
                                                <?php
                                                        $data=DB::table('client')->where('id',$row->idClient)->first();
                                                        echo $data->nama; 
                                                        echo "<br>";
                                                        echo $data->nohp;                                               
                                                ?>

                                            </td>
                                            <td>{{ $row->status }}
                                                @if($row->status == "Request")
                                                <button class="btn btn-sm btn-warning" title="Request Approval"
                                                onclick="window.location='{{ url('job/requestapprove/' . $row->idjob) }}'">
                                                Request Approved
                                                </button>
                                             
                                                @elseif($row->status == "Approve")
                                                <button class="btn btn-sm btn-warning" title="Request Approval"
                                               >
                                                Approved
                                                </button>
                                                @elseif($row->status == "Antrian")
                                                <button class="btn btn-sm btn-warning" title="Request Approval"
                                                onclick="window.location='{{ url('job/requestapprove/' . $row->idjob) }}'">
                                                Request Approved
                                                </button>
                                                @elseif($row->status == "Proses")
                                                <button class="btn btn-sm btn-warning" title="Request Approval"
                                                onclick="window.location='{{ url('job/requestapprove/' . $row->idjob) }}'">
                                                Request Approved
                                                </button>
                                                @endif
                                            
                                            
                                            
                                            </td>




                                            <td>{{$row->JobLastUpdate}}</td>
                                            <td>{{ $row->total }}</td>
                                            <td><button class="btn btn-sm btn-info" title="Edit Data"
                                                    onclick="window.location='{{ url('job/' . $row->idjob) }}'">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-info" title="Tambah Job Proses"
                                                    onclick="window.location='{{ url('job/detail/' . $row->idjob) }}'">
                                                    <i class=" fas fa-info"></i>
                                                </button>
                                                <button class="btn btn-sm btn-info" title="View Job Detail"
                                                onclick="window.location='{{ url('job/detailview/' . $row->idjob) }}'">
                                                <i class=" fas fa-search"></i>
                                            </button>
                                            <button class="btn btn-sm btn-success bg-yellow" title="Time Line"
                                            onclick="window.location='{{ url('job/timelineview/' . $row->idjob) }}'">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M128 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm32 97.3c28.3-12.3 48-40.5 48-73.3c0-44.2-35.8-80-80-80S48 51.8 48 96c0 32.8 19.7 61 48 73.3V224H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H288v54.7c-28.3 12.3-48 40.5-48 73.3c0 44.2 35.8 80 80 80s80-35.8 80-80c0-32.8-19.7-61-48-73.3V288H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H544V169.3c28.3-12.3 48-40.5 48-73.3c0-44.2-35.8-80-80-80s-80 35.8-80 80c0 32.8 19.7 61 48 73.3V224H160V169.3zM488 96a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zM320 392a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
                                        </button>
                                                <form  onsubmit="return deleteData( '{{ $row->jobTitle }}')" method="POST" style="display:inline"
                                                    action="{{ url('job/' . $row->idjob) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" type="submit" title="Hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Job</th>
                                        <th>Job Title</th>
                                        <th>User</th>
                                        <th>Client</th>
                                        <th>Status</th>
                                        <th>Last Update</th>
                                        <th>Target</th>
                                        <th>#</th>
                                    </tr>
                                </tfoot>
                            </table>
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
      function deleteData(jobTitle){
        pesan= confirm(`Yakin ingin hapus ${jobTitle} ?`);
        if(pesan)return true;
        else return false;
      }
    </script>
@endsection
