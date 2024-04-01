<?php

namespace App\Http\Controllers;

use App\Models\Kategoriperawatan;
use App\Models\Pendidikan;
use App\Models\Profesi;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\StoreJobsdetailRequest;
use App\Http\Requests\UpdateJobsdetailRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Models\Jobdetail;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {

        $users = User::all();
        $user = Auth::user();

        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,

        $idUser = Auth::user()->id;
        $datasetting = Setting::first();
     

        $datauser = DB::table('users')
        ->leftjoin('pendidikan', 'pendidikan.id', '=', 'users.idpendidikan')
        ->leftjoin('profesi', 'profesi.id', '=', 'users.idprofesi')
        ->leftjoin('kategori_perawatan', 'kategori_perawatan.id', '=', 'users.idperawatan')
        ->select('users.id as iduser','users.email','users.username','users.level','users.tempatlahir','users.tanggal','users.userRating','users.foto','users.ktp','users.agama','users.idprofesi','users.idpendidikan','users.idperawatan','users.name','users.gender', 'pendidikan.*', 'profesi.*','kategori_perawatan.*')
        ->get();

        return view("user.index")->with([
            "user" => Auth::user(),
            "users" => $datauser,
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
        ]);



    }

    public function updateanggota(Request $request){
      $data=User::find($request->id);
      $data->level='3';
      $data->idperawatan=$request->idperawatan;
      $data->update();
      return redirect('user')->with('msg', 'Pelamar Berhasil di Aprrove');
    }

    public function detaillamaranperawat($id){
       


        $data=User::where('id',$id)->get();
    

        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        $datasetting = Setting::first();
        $dataperawatan=Kategoriperawatan::all();
        return view("user.detaillamaran")->with([
            "user" => Auth::user(),
            "users" => $data,
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'kategoriperawatan'=>$dataperawatan,
        ]);
        
    }

    public function lamaranperawat(){
        $data=User::where('level','4')->get();
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        $datasetting = Setting::first();
        return view("user.lamaran")->with([
            "user" => Auth::user(),
            "users" => $data,
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
        ]);
        
    }

    public function listjob($id)
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $id)->get();
        // "datajob"=>$datajob,

        $datajobproses = Job::where([['idUser', $id], ['Status', 'Proses']])->get();

        // dd($datajobproses);
        $idUser = Auth::user()->id;
        $datasetting = Setting::first();
        //use App\Models\Setting;
        //  'namaaplikasi'=>$datasetting->namaaplikasi,
        //'target'=>$datasetting->target,

        return view("user.listjob")->with([
            "user" => Auth::user(),
            "users" => User::all(),
            "notif" => $countjob,
            "datajob" => $datajob,
            "datajobproses" => $datajobproses,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
        ]);


    }

    public function create()
    {

        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();

        $datasetting = Setting::first();
        $profesi = Profesi::all();
        $pendidikan = Pendidikan::all();
        $perawatan = Kategoriperawatan::all();


        return view("user.formAdd")->with([
            "user" => Auth::user(),
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'profesi' => $profesi,
            'pendidikan' => $pendidikan,
            'perawatan' => $perawatan,
            
            





        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $validate = $request->validated();
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt('1');
        $user->level = $request->level;
        $user->tempatlahir = $request->tempat;
        $user->tanggal = $request->tanggal;
        $user->gender = $request->gender;
        $user->ktp = $request->ktp;
        $user->agama = $request->agama;
        $user->idprofesi = $request->idprofesi;
        $user->idpendidikan = $request->idpendidikan;
        $user->idperawatan = $request->idperawatan;

        $user->save();
        return redirect('user')->with('msg', 'Tambah User Berhasil');

    }

    public function show(User $job, $id)
    {

        
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        $datajob = Job::where('idUser', $datauser->id)->get();
        $data = $job->find($id);
        

        $datasetting = Setting::first();
        $profesi=Profesi::all();
        $pendidikan=Pendidikan::all();
        $perawatan = Kategoriperawatan::all();
        return view('user.formEdit')->with([
            "user" => Auth::user(),
            "id" => $data->id,
            "name" => $data->name,
            "username" => $data->username,
            "gender" => $data->gender,
            "tempat" => $data->tempatlahir,
            "tanggal" => $data->tanggal,
            "status" => $data->level,
            "email" => $data->email,
            "notif" => $countjob,
            "datajob" => $datajob,
            'idprofesi'=>$data->idprofesi,
            'idpendidikan'=>$data->idpendidikan,
            'idperawatan'=>$data->idperawatan,
            'ktp'=>$data->ktp,
            'agama'=>$data->agama,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'target1' => $data->target,
            'profesi' => $profesi,
            'pendidikan' => $pendidikan,
            'perawatan' => $perawatan,

        ]);


    }

    public function update(UpdateUserRequest $request, $id)
    {

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');
            $data = User::find($id);
            $data->name = $request->name;
            $data->username = $request->username;
            $data->email = $request->email;
            $data->level = $request->level;
            $data->tempatlahir = $request->tempat;
            $data->tanggal = $request->tanggal;
            $data->gender = $request->gender;
            $data->ktp = $request->ktp;
            $data->agama = $request->agama;
            $data->idprofesi = $request->idprofesi;
            $data->idpendidikan = $request->idpendidikan;
            $data->idperawatan = $request->idperawatan;
            $data->foto = $path;
            $data->Update();
            return redirect('user')->with('msg', 'Update' . $data->name . ' Berhasil diupdate');
        } else {
            $path = '';
            $data = User::find($id);
            $data->name = $request->name;
            $data->username = $request->username;
            $data->email = $request->email;
            $data->level = $request->level;
            $data->tempatlahir = $request->tempat;
            $data->tanggal = $request->tanggal;
            $data->gender = $request->gender;
            $data->ktp = $request->ktp;
            $data->agama = $request->agama;
            $data->idprofesi = $request->idprofesi;
            $data->idpendidikan = $request->idpendidikan;
            $data->idperawatan = $request->idperawatan;
         
            $data->Update();
            return redirect('user')->with('msg', 'Update' . $data->name . ' Berhasil diupdate');

        }



        
       

    }

    public function updateprofil(Request $request)
    {

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');

        } else {
            $path = '';
        }


        $data = User::find($request->id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        // $data->level=$request->level;
        $data->tempatlahir = $request->tempatlahir;
        $data->tanggal = $request->tanggal;
        $data->gender = $request->gender;
        $data->foto = $path;
        // $data->target = $request->target;
        $data->Update();
        return redirect('user')->with('msg', 'Update ' . $data->name . ' Berhasil diupdate');

    }

    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('user')->with('msg', 'Data Berhasil di hapus');
    }

    public function profil()
    {
        $users = User::all();
        $user = Auth::user();
        $datauser = Auth::user();
        $countjob = Job::where([['idUser', $datauser->id], ['status', 'Antrian']])->count();
        $datajob = Job::where('idUser', $datauser->id)->get();


        $data = DB::table('jobs')
            ->join('users', 'users.id', '=', 'jobs.idUser')
            ->select('users.*', 'jobs.*')
            ->where('idUser', Auth::user()->id)
            ->get();
        $datasetting = Setting::first();
        //use App\Models\Setting;
        //  'namaaplikasi'=>$datasetting->namaaplikasi,
        //'
        return view("user.profil")->with([
            "user" => Auth::user(),
            "users" => User::all(),
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'jobs' => $data

        ]);

    }

    public function updatepassword(Request $request)
    {
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->passwordbaru)
        ]);
        // return back()->with("status", "Password changed successfully!");
        return redirect('user/profil')->with('msg', 'Data Berhasil di hapus');

    }

}
