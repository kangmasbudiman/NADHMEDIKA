@extends('layout.main')
@section('judul')
    
@endsection

@section('isi')
    <section class="content">
      

        
         
        <div class="container-fluid">
          @if (session('msg'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Selamat</strong> {{ session('msg') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif
            <div class="row">
              <div class="col-md-3">
    
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle"
                           src="{{asset('storage/'.$user->foto)}}"
                           alt="User profile picture">
                    </div>
    
                    <h3 class="profile-username text-center">{{$user->name}}</h3>
    
                    <p class="text-muted text-center">{{$user->email}}</p>
    
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Ratting</b> <a class="float-right">{{$user->userRating}}<i class="fa fa-star"></i></a>
                      </li>
                    
                    </ul>
    
                    <a href="" type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal"><b>Update Password</b></a>
                    
                  </div>
                  <!-- /.card-body -->
                </div>
             
              </div>
              <!-- /.col -->
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Setting</a></li>
                      
                      <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Jobs</a></li>
                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="active tab-pane" id="activity">
                        <form method="POST" enctype="multipart/form-data" action="{{ url('user/updateprofil') }}">
                            @csrf

                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                              <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="inputName" placeholder="Name" value="{{$user->id}}" name="id">
                                <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{$user->name}}" name="name">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{$user->email}}" name="email">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName2" class="col-sm-2 col-form-label">User Name</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName2" placeholder="Name" value="{{$user->username}}" name="username">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputExperience" class="col-sm-2 col-form-label">Tempat Lahir</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName2" placeholder="Name" value="{{$user->tempatlahir}}" name="tempatlahir">
                              
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputSkills" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                              <div class="col-sm-10">
                                <input type="date" class="form-control" id="inputSkills" placeholder="Skills" value="{{$user->tanggal}}" name="tanggal">
                              </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Foto Profil</label>
                                <div class="col-sm-10">
                                    <input type="file" accept="image/*" class="form-control @error('file')is-invalid   @enderror"
                                    placeholder="Target" name="file"> @error('file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                              </div>


                          
                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Submit</button>
                              </div>
                            </div>
                          </form>
                 
                        <!-- /.post -->
                      </div>
                      <div class="tab-pane" id="timeline">
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

                              @foreach ($jobs as $row)
                                  <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $row->idjob }}</td>
                                      <td>{{ $row->jobTitle }}</td>
                                      
                                      <td>{{$row->namaClient}}<br>
                                          {{$row->nomorClient}}
                                      </td>
                                      <td>{{ $row->status }}</td>
                                      <td>{{$row->JobLastUpdate}}</td>
                                      <td>{{ $row->total }}</td>
                                      <td><button class="btn btn-sm btn-info" title="Edit Data"
                                              onclick="window.location='{{ url('task/' . $row->idjob) }}'">
                                              <i class="fas fa-edit"></i>
                                          </button>
                                          <button class="btn btn-sm btn-info" title="Tambah Job Detail"
                                              onclick="window.location='{{ url('task/detail/' . $row->idjob) }}'">
                                              <i class=" fas fa-info"></i>
                                          </button>
                                          <button class="btn btn-sm btn-info" title="View Job Detail"
                                          onclick="window.location='{{ url('task/detailview/' . $row->idjob) }}'">
                                          <i class=" fas fa-search"></i>
                                      </button>
                                      <button class="btn btn-sm btn-success bg-yellow" title="Time Line"
                                      onclick="window.location='{{ url('task/timelineview/' . $row->idjob) }}'">
                                      <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M128 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm32 97.3c28.3-12.3 48-40.5 48-73.3c0-44.2-35.8-80-80-80S48 51.8 48 96c0 32.8 19.7 61 48 73.3V224H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H288v54.7c-28.3 12.3-48 40.5-48 73.3c0 44.2 35.8 80 80 80s80-35.8 80-80c0-32.8-19.7-61-48-73.3V288H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H544V169.3c28.3-12.3 48-40.5 48-73.3c0-44.2-35.8-80-80-80s-80 35.8-80 80c0 32.8 19.7 61 48 73.3V224H160V169.3zM488 96a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zM320 392a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
                                  </button>
                                          <form  onsubmit="return deleteData( '{{ $row->jobTitle }}')" method="POST" style="display:inline"
                                              action="{{ url('task/' . $row->idjob) }}">
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
                      <!-- /.tab-pane -->
    


                      <!-- job-->
                     
                      <!-- -->
                  
                    </div>
                    <!-- /.tab-content -->
                 


                      <!-- job-->
                     
                      <!-- -->
                  
                    </div>
                  </div>
                  
                  
                  
                  
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
          <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" action="{{ url('user/updatepassword') }}">
          @csrf

          <div class="form-group row">
          
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="inputName" placeholder="Name" value="{{$user->id}}" name="id">
             
            </div>
          </div>
   
          <div class="form-group row">
            <label for="inputName2" class="col-sm-2 col-form-label">Password Baru</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName2" placeholder="Name"  name="passwordbaru">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputExperience" class="col-sm-2 col-form-label">Ulangi Password</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName2" placeholder="Name" name="ulangipassword">
            
            </div>
          </div>
         

        
          <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
              <button type="submit" class="btn btn-danger">Submit</button>
            </div>
          </div>
        </form>



      </div>
      <div class="modal-footer">
       
        
      </div>
    </div>
  </div>
</div>



              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div><!-- /.con
       
    






        
    </section>
    <script>
      function deleteData(name){
        pesan= confirm(`Yakin ingin hapus ${name} ?`);
        if(pesan)return true;
        else return false;
      }
    </script>
@endsection

