@extends('layout.main')
@section('judul')
@endsection

@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                  <h4>List Pekerjaan User</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                      <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                      
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-five-normal-tab" data-toggle="pill" href="#custom-tabs-five-normal" role="tab" aria-controls="custom-tabs-five-normal" aria-selected="false">Pekerjaan Dalam Proses</a>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark" aria-selected="false">Semua Pekerjaan</a>
                        </li>
                    
                      </ul>
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-five-tabContent">
                       
                        <div class="tab-pane fade show active" id="custom-tabs-five-normal" role="tabpanel" aria-labelledby="custom-tabs-five-normal-tab">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Job</th>
                                        <th>Job Title</th>
                                        
                                        <th>Client<br>No HP</th>
                                        <th>Status</th>
                                        <th>Last Update</th>
                                        <th>Target</th>
                                        <th>#</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($datajobproses as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->idjob }}</td>
                                            <td>{{ $row->jobTitle }}</td>
                                            
                                            <td>{{$row->namaClient}}<br>
                                                {{$row->nomorClient}}
                                            </td>
                                            <td>

                                                @if($row->status == "Request")
                                                <button class="btn btn-sm btn-warning" title="Request Approval"
                                               >
                                                Requested
                                                </button>
                                                @elseif($row->status == "Approve")
                                                <button class="btn btn-sm btn-success" title="Request Approval"
                                               >
                                                Approved
                                                </button>
                                                @elseif($row->status == "Antrian")
                                                <button class="btn btn-sm btn-warning" title="Request Approval"
                                                onclick="window.location='{{ url('task/requestapprove/' . $row->idjob) }}'">
                                                Request Approved
                                                </button>
                                                @elseif($row->status == "Proses")
                                                <button class="btn btn-sm btn-warning" title="Request Approval"
                                                onclick="window.location='{{ url('task/requestapprove/' . $row->idjob) }}'">
                                                Request Approved
                                                </button>
                                                @endif
                                               
                                              



                                            </td>
                                            <td>{{$row->JobLastUpdate}}</td>
                                            <td>{{ $row->total }}</td>
                                            <td>

                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Job</th>
                                        <th>Job Title</th>
                                        
                                        <th>Client<br>No HP</th>
                                        <th>Status</th>
                                        <th>Last Update</th>
                                        <th>Target</th>
                                        <th>#</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>

                        <div class="tab-pane fade" id="custom-tabs-five-overlay-dark" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Job</th>
                                        <th>Job Title</th>
                                        
                                        <th>Client<br>No HP</th>
                                        <th>Status</th>
                                        <th>Last Update</th>
                                        <th>Target</th>
                                        <th>#</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($datajob as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->idjob }}</td>
                                            <td>{{ $row->jobTitle }}</td>
                                            
                                            <td>{{$row->namaClient}}<br>
                                                {{$row->nomorClient}}
                                            </td>
                                            <td>

                                                @if($row->status == "Request")
                                                <button class="btn btn-sm btn-warning" title="Request Approval"
                                               >
                                                Requested
                                                </button>
                                                @elseif($row->status == "Approve")
                                                <button class="btn btn-sm btn-success" title="Request Approval"
                                               >
                                                Approved
                                                </button>
                                                @elseif($row->status == "Antrian")
                                                <button class="btn btn-sm btn-warning" title="Request Approval"
                                                onclick="window.location='{{ url('task/requestapprove/' . $row->idjob) }}'">
                                                Request Approved
                                                </button>
                                                @elseif($row->status == "Proses")
                                                <button class="btn btn-sm btn-warning" title="Request Approval"
                                                onclick="window.location='{{ url('task/requestapprove/' . $row->idjob) }}'">
                                                Request Approved
                                                </button>
                                                @endif
                                               
                                              



                                            </td>
                                            <td>{{$row->JobLastUpdate}}</td>
                                            <td>{{ $row->total }}</td>
                                            <td>

                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Job</th>
                                        <th>Job Title</th>
                                        
                                        <th>Client<br>No HP</th>
                                        <th>Status</th>
                                        <th>Last Update</th>
                                        <th>Target</th>
                                        <th>#</th>
                                    </tr>
                                </tfoot>
                            </table>

                          </div>



                   
                      
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
              </div>
            
            
      
            <!-- /.row -->



         
        












        </div>


        <!-- /.container-fluid -->
    </section>
    <script>
        function deleteData(jobTitle) {
            pesan = confirm(`Yakin ingin hapus ${jobTitle} ?`);
            if (pesan) return true;
            else return false;
        }
    </script>
@endsection
