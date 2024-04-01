@extends('layout.main')
@section('judul')
    Laporan Target User
@endsection

@section('isi')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card ">
                        <div class="card-header text-right ">
                            <h3 class="card-title  ">Job List</h3>

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
                                        <th>Status</th>

                                        <th>Goal</th>
                                        <th>Target</th>
                                        <th>Perolehan Rating</th>
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
                                            <td>{{ $row->status }}</td>
                                            <td>Rp {{ number_format($row->totaltarget, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($row->target, 0, ',', '.') }}</td>
                                            <td><?php
                                            if ($row->totaltarget > $row->target) {
                                                $data = DB::table('users')
                                                    ->where('id', $row->idUser)
                                                    ->first();
                                            
                                                $a = $data->userRating + 1;
                                                if ($a > 6) {
                                                    
                                                } else {
                                                    $data->userRating = $a;
                                                    $data = DB::table('users')
                                                        ->where('id', $row->idUser)
                                                        ->update(['userRating' => $a]);
                                                }
                                            } else {
                                                $data = DB::table('users')
                                                    ->where('id', $row->idUser)
                                                    ->first();
                                                $a = $data->userRating - 1;
                                                $data->userRating = $a;
                                                $data = DB::table('users')
                                                    ->where('id', $row->idUser)
                                                    ->update(['userRating' => $a]);
                                            }
                                            
                                            ?>
                                                {{ $row->totaltarget > $row->target ? '+ 1' : '- 1' }}

                                            </td>
                                            <td> </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Job</th>
                                        <th>Job Title</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Goal</th>
                                        <th>Target</th>
                                        <th>Perolehan Rating</th>
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
        function deleteData(jobTitle) {
            pesan = confirm(`Yakin ingin hapus ${jobTitle} ?`);
            if (pesan) return true;
            else return false;
        }
    </script>
@endsection
