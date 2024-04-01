<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePendidikanRequest;

use App\Http\Requests\UpdatePendidikanRequest;
use App\Models\Pendidikan;
use App\Models\Job;

use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use Carbon;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{


    public function index()
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,
        $data = DB::table('pendidikan')->get();

        $datasetting = Setting::first();

        return view("pendidikan.index")->with([

            "user" => Auth::user(),
            "pendidikan" => $data,
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,

        ]);

    }






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $datauserr = User::all();
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        $datajob = Job::where('idUser', $datauser->id)->get();
        $datasetting = Setting::first();
        $dataclient = Client::all();



        return view("pendidikan.formAdd")->with([
            "user" => Auth::user(),
            "datauser" => $datauserr,
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'dataclient' => $dataclient,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePendidikanRequest $request)
    {
        $validate = $request->validated();
        $pendidikan = new Pendidikan();
        $pendidikan->namapendidikan = $request->namapendidikan;
        $pendidikan->save();



        return redirect('pendidikan')->with('msg', 'Tambah Data Pendidikan Berhasil');

    }






    /**
     * Display the specified resource.
     */
    public function show(Pendidikan $pendidikan, $id)
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $data = $pendidikan->find($id);
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,

        $datasetting = Setting::first();


        $datauserr = User::all();
        $dataclient = Client::all();
        return view('pendidikan.formEdit')->with([

            "user" => Auth::user(),
            "id" => $data->id,
            "namapendidikan" => $data->namapendidikan,
            'namaaplikasi' => $datasetting->namaaplikasi,
            "notif" => $countjob,
            "datajob" => $datajob,


        ]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePendidikanRequest $request, $id)
    {
        $data = Pendidikan::find($id);

        $data->namapendidikan = $request->namapendidikan;

        $data->Update();
        return redirect('pendidikan')->with('msg', 'Update Data ' . $data->namapendidikan . ' Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
   

    public function delete($id)
    {
        $data = Pendidikan::find($id);
        $data->delete();
        return redirect('pendidikan')->with('msg', 'Data Berhasil di hapus');
    }


}
