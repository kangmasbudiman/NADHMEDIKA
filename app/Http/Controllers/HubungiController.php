<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHubungiRequest;

use App\Http\Requests\UpdateHubungiRequest;
use App\Models\Hubungi;
use App\Models\Job;

use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use Carbon;
use Illuminate\Http\Request;

class HubungiController extends Controller
{


    public function index()
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,
        $data = DB::table('hubungi')

            ->get();

        $datasetting = Setting::first();

        return view("hubungi.index")->with([

            "user" => Auth::user(),
            "hubungi" => $data,
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
        return view("hubungi.formAdd")->with([
            "user" => Auth::user(),
            "datauser" => $datauserr,
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,


        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHubungiRequest $request)
    {
        $validate = $request->validated();


        $blog = new Hubungi();

        $blog->nama = $request->nama;
        $blog->alamat = $request->alamat;
        $blog->telp = $request->telp;
        $blog->linkmap = $request->linkmap;
        $blog->email = $request->email;

        $blog->save();



        return redirect('hubungi')->with('msg', 'Tambah Hubngi Kami Berhasil');

    }






    /**
     * Display the specified resource.
     */
    public function show(Hubungi $blog, $id)
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $data = $blog->find($id);
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,

        $datasetting = Setting::first();


        $datauserr = User::all();

        return view('hubungi.formEdit')->with([

            "user" => Auth::user(),
            "id" => $data->id,
            "nama" => $data->nama,
            "linkmap" => $data->linkmap,
            "alamat" => $data->alamat,
            "telp" => $data->telp,
            "email" => $data->email,
            'namaaplikasi' => $datasetting->namaaplikasi,
            "notif" => $countjob,
            "datajob" => $datajob,


        ]);


    }


    public function update(UpdateHubungiRequest $request, $id)
    {
        $data = Hubungi::find($id);

        $data->nama = $request->nama;
        $data->linkmap = $request->linkmap;
        $data->alamat = $request->alamat;
        $data->telp = $request->telp;
        $data->email = $request->email;
        $data->Update();
        return redirect('hubungi')->with('msg', 'Update Data  Berhasil');
    }



    public function delete($id)
    {
        $data = Hubungi::find($id);
        $data->delete();
        return redirect('hubungi')->with('msg', 'Data Berhasil di hapus');
    }


}
