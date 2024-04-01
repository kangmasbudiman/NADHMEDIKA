<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\StoreJobsdetailRequest;
use App\Http\Requests\UpdateJobsdetailRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Job;
use App\Models\Jobdetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use Carbon;
use App\Models\Client;

class TaskController extends Controller
{

    public function timeline($idjob)
    {

        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,
        $data = DB::table('jobs')
            ->join('users', 'users.id', '=', 'jobs.idUser')
            ->select('users.*', 'jobs.*')
            ->get();
        $datasetting = Setting::first();
        $detailjob = Jobdetail::where('idJobs',$idjob)->orderBy('created_at','desc')->get();
        

        return view("task.timeline")->with([

            "user" => Auth::user(),
            "jobs" => $data,
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'detailjob' => $detailjob,

        ]);

    }

    public function update(UpdateTaskRequest $request, $idjob)
    {
        $data = Job::find($idjob);

       // $data->idUser = $request->idUser;
        $data->jobTitle = $request->jobTitle;
        $data->total = $request->total;
        $data->namaClient = $request->namaClient;
        $data->nomorClient = $request->nomorClient;
        $data->Update();
        return redirect('task')->with('msg', 'Update  ' . $data->jobTitle . ' Berhasil diupdate');
    }


    public function show(Job $job, $idjob)
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $data = $job->find($idjob);
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,

        $datasetting = Setting::first();

        $dataclient= Client::all();
        $datauserr = User::all();
        // "datauser" => $datauserr,
        return view('task.formEdit')->with([

            "user" => Auth::user(),
            "idjob" => $data->idjob,
            "jobTitle" => $data->jobTitle,
            "idUser" => $data->idUser,
            "total" => $data->total,
            "notif" => $countjob,
            "datajob" => $datajob,
            "namaClient" => $data->namaClient,
            "nomorClient" => $data->nomorClient,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            "datauser" => $datauserr,
            'dataclient' => $dataclient,

        ]);


    }
    public function requestapprove($idjob)
    {
        $data = Job::find($idjob);
        $data->status = "Request";
        $data->update();
        return redirect('task')->with('msg', 'Permintaan Approval Telah Dikirim');
    }

    public function updateselesai($idJob)
    {
        $data = Job::find($idJob);
        $data->status = "Selesai";
        $data->update();
        return redirect('task')->with('msg', 'Job Selesai');
    }

    public function store(StoreTaskRequest $request)
    {

        $iduser=Auth::user()->id;
      
        $validate = $request->validated();
      
        $dataidterakhir=Job::orderby('idjob','desc')->first();

        if($dataidterakhir){
            $potong_kalimat = substr($dataidterakhir->idjob,-4);
        }else{
            $potong_kalimat ="0001";
        }
      
            
    



        $table_no = $potong_kalimat; // nantinya menggunakan database dan table sungguhan
        $tgl = substr(str_replace('-', '', Carbon\carbon::now()), 0, 8);
        $no = $tgl . $table_no;
        $auto = substr($no, 8);
        $auto = intval($auto) + 1;
        $auto_number = substr($no, 0, 8) . str_repeat(0, (4 - strlen($auto))) . $auto;
        // echo $auto_number;


        $job = new Job();
        $job->idjob = $auto_number;
        $job->idUser = Auth::user()->id;
        $job->jobTitle = $request->jobTitle;
        $job->status = 'Antrian';
        $job->total = $request->total;
        $job->namaClient = $request->namaClient;
        $job->nomorClient = $request->nomorClient;
        $job->save();
        return redirect('task')->with('msg', 'Tambah Job Berhasil');

    }

    public function create()
    {

        $datauserr = User::all();
        // "datauser" => $datauserr,
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,

        $datasetting = Setting::first();
       
        $dataclient= Client::all();


        return view("task.formAdd")->with([
            "user" => Auth::user(),
            "datauser" => $datauserr,
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'dataclient' => $dataclient,
        ]);
    }
    
    public function index()
    {
        $data = Auth::user();
        $countjob = Job::where([['idUser', $data->id], ['status', 'Antrian']])->count();
        $datajob = Job::where('idUser', $data->id)->get();
        $idUser = Auth::user()->id;
        $data = DB::table('jobs')
            ->join('users', 'users.id', '=', 'jobs.idUser')
            ->select('users.*', 'jobs.*')
            ->where('idUser', $idUser)
            ->get();
        $datasetting = Setting::first();
        //use App\Models\Setting;
        //  'namaaplikasi'=>$datasetting->namaaplikasi,
        //'target'=>$datasetting->target,


        return view("task.index")->with([

            "user" => Auth::user(),
            "jobs" => $data,
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,

        ]);

    }


    public function taskdetail($idJob)
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,


        $datasetting = Setting::first();
        //use App\Models\Setting;
        //  'namaaplikasi'=>$datasetting->namaaplikasi,
        //'target'=>$datasetting->target,

        return view("task.formAddjobdetail")->with([
            "user" => Auth::user(),
            "idJob" => $idJob,
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,

        ]);
    }
    public function addjobdetail(StoreJobsdetailRequest $request)
    {

        $validate = $request->validated();

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');

        } else {
            $path = '';
        }


        $ab = Job::find($request->idJob);
        $ab->jobLastUpdate = date("Y-d-m H:i:s");
        //$ab->jobLastUpdate=date('Y-m-d H:i:s',strtotime($request->jobLastUpdate));
        $ab->update();

        $jobsdetail = new Jobdetail();
        $jobsdetail->idJobs = $request->idJob;
        $jobsdetail->deskripsi = $request->deskripsi;
        $jobsdetail->status = $request->status;
        $jobsdetail->file = $path;
        $jobsdetail->save();
        return redirect('job')->with('msg', 'Tambah Job Detail Berhasil');



    }
    public function taskdetailview($idJob)
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,
        $data = Jobdetail::where('idJobs', $idJob)->get();
        $countjob = Job::where([['idUser', $datauser->id], ['status', 'Antrian']])->count();
        $datasetting = Setting::first();
        //use App\Models\Setting;
        //  'namaaplikasi'=>$datasetting->namaaplikasi,
        //'target'=>$datasetting->target,

        return view("task.detailview")->with([
            "user" => Auth::user(),
            "jobs" => $data,
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,

        ]);
    }


    public function taskdetailedit($id)
    {
        $data = Jobdetail::find($id);
        $datauser = Auth::user();
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,

        $datasetting = Setting::first();
        //use App\Models\Setting;
        //  'namaaplikasi'=>$datasetting->namaaplikasi,
        //'target'=>$datasetting->target,
        return view('task.formEditjobdetail')->with([
            "user" => Auth::user(),
            "id" => $data->id,
            "idJobs" => $data->idJobs,
            "deskripsi" => $data->deskripsi,
            "status" => $data->status,
            "file" => $data->file,
            "datajob" => $datajob,
            "notif" => $countjob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,

        ]);

    }

    public function updatejobdetail(UpdateJobsdetailRequest $request)
    {


        $validate = $request->validated();

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');

        } else {
            $path = '';
        }
        $jobsdetail = Jobdetail::find($request->id);
        $pathFoto = $jobsdetail->file;
        if ($pathFoto != null || $pathFoto != '') {
            Storage::delete($pathFoto);
            $updatestatusjob = Job::find($request->idJobs);
            $updatestatusjob->status = "Proses";
            $updatestatusjob->update();
            //--

            $jobsdetail->idJobs = $request->idJobs;
            $jobsdetail->deskripsi = $request->deskripsi;
            $jobsdetail->status = $request->status;
            $jobsdetail->file = $path;
            $jobsdetail->update();
            return redirect('task')->with('msg', 'Update Job Detail Berhasil');
        } else {
            $updatestatusjob = Job::find($request->idJobs);
            $updatestatusjob->status = "Proses";
            $updatestatusjob->update();
            //--

            $jobsdetail->idJobs = $request->idJobs;
            $jobsdetail->deskripsi = $request->deskripsi;
            $jobsdetail->status = $request->status;
            // $jobsdetail->file=$path;
            $jobsdetail->update();
            return redirect('task')->with('msg', 'Update Job Detail Berhasil');
        }

        //mengupdate status job




    }



}
