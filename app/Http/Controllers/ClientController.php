<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Models\Jobdetail;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {

   
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
       
        $datajob = Job::where('idUser', $datauser->id)->get();
        
        $idUser = Auth::user()->id;
        $datasetting = Setting::first();
        $client=Client::all();
    


        return view("client.index")->with([
            "user" => Auth::user(),
            "users" => User::all(),
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'client'=>$client,
        ]);



    }

 
    public function create()
    {

        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,
        $datasetting = Setting::first();
   

        return view("client.formAdd")->with([
            "user" => Auth::user(),
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            



        ]);
    }

    public function store(StoreClientRequest $request)
    {
        $validate = $request->validated();
        $user = new Client();
        $user->nama = $request->namaClient;
    
        $user->nohp = $request->nomorClient;
        $user->save();
        return redirect('client')->with('msg', 'Tambah Client Berhasil');

    }

    public function show(Client $job, $id)
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
              $datajob = Job::where('idUser', $datauser->id)->get();
              $data = $job->find($id);
       $datasetting = Setting::first();
       $countjob = Job::where('idUser', $datauser->id)->count();
       $datajob = Job::where('idUser', $datauser->id)->get();
       $datasetting = Setting::first();
        return view('client.formEdit')->with([
            "user" => Auth::user(),
            "id" => $data->id,
            "namaClient" => $data->nama,
            "notif" => $countjob,
            'nomorClient' => $data->nohp,
            'target' => $datasetting->target,
            'target1' => $data->target,
             "datajob"=>$datajob,
             'namaaplikasi' => $datasetting->namaaplikasi,

        ]);


    }

    public function update(UpdateClientRequest $request, $id)
    {


        $data = Client::find($id);
        $data->nama = $request->namaClient;
        $data->nohp = $request->nomorClient;
       
        $data->Update();
        return redirect('client')->with('msg', 'Update' . $data->nama . ' Berhasil diupdate');

    }

 

    public function destroy($id)
    {
        $data = Client::find($id);
        $data->delete();
        return redirect('client')->with('msg', 'Data Berhasil di hapus');
    }


   

}
