<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTentangRequest;

use App\Http\Requests\UpdateTentangRequest;
use App\Models\Tentang;
use App\Models\Job;
use App\Models\Kategoriblog;
use App\Models\Jobdetail;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use Carbon;
use Illuminate\Http\Request;

class TentangController extends Controller
{


    public function index()
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,
        $data = DB::table('tentang')
            ->get();

        $datasetting = Setting::first();

        return view("tentang.index")->with([

            "user" => Auth::user(),
            "tentang" => $data,
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
      


        return view("tentang.formAdd")->with([
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
    public function store(StoreTentangRequest $request)
    {
        $validate = $request->validated();

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');

        } else {
            $path = '';
        }

        $blog = new Tentang();

      
        $blog->judul = $request->judul;
        $blog->deskripsi = $request->deskripsi;
       
        $blog->foto = $path;
        $blog->save();
        return redirect('tentang')->with('msg', 'Tambah Data Berhasil');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tentang $blog, $id)
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $data = $blog->find($id);
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,
        $datasetting = Setting::first();


        
        
        return view('tentang.formEdit')->with([
            "user" => Auth::user(),
            "id" => $data->id,
           
            "judul" => $data->judul,
            "deskripsi" => $data->deskripsi,
           
            "foto" => $data->foto,
            'namaaplikasi' => $datasetting->namaaplikasi,
            "notif" => $countjob,
            "datajob" => $datajob,
            


        ]);


    }

    public function update(UpdateTentangRequest $request, $id)
    {

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');
            $data = Tentang::find($id);
         
            $data->judul = $request->judul;
            $data->deskripsi = $request->deskripsi;
          
            $data->foto = $path;
            $data->Update();
            return redirect('tentang')->with('msg', 'Update Data ' . $data->judul . ' Berhasil');
        } else {
            $data = Tentang::find($id);
           
            $data->judul = $request->judul;
            $data->deskripsi = $request->deskripsi;
                    $data->Update();
            return redirect('tentang')->with('msg', 'Update Data ' . $data->judul . ' Berhasil');
        }


    }



    public function delete($id)
    {
        $data = TentangController::find($id);
        $data->delete();
        return redirect('tentang')->with('msg', 'Data Berhasil di hapus');
    }


}
