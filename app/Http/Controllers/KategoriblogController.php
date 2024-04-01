<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategoriblogRequest;

use App\Http\Requests\UpdateKategoriblogRequest;
use App\Models\Kategoriblog;
use App\Models\Job;

use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use Carbon;
use Illuminate\Http\Request;

class KategoriblogController extends Controller
{
        

    public function index()
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,
        $data = DB::table('kategori_blog')
           
            ->get();
          
        $datasetting = Setting::first();

        return view("kategoriblog.index")->with([

            "user" => Auth::user(),
            "kategoriblog" => $data,
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
               $dataclient= Client::all();



        return view("kategoriblog.formAdd")->with([
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
    public function store(StoreKategoriblogRequest $request)
    {
        $validate = $request->validated();
       

        $blog = new Kategoriblog();
        
        $blog->nama = $request->nama;
      
        $blog->save();

    

        return redirect('kategoriblog')->with('msg', 'Tambah Kategori Blog Berhasil');

    }


   
   


    /**
     * Display the specified resource.
     */
    public function show(Kategoriblog $blog, $id)
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $data = $blog->find($id);
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,

        $datasetting = Setting::first();


        $datauserr = User::all();
        $dataclient= Client::all();
        return view('kategoriblog.formEdit')->with([

            "user" => Auth::user(),
            "id" => $data->id,
            "nama" => $data->nama,
            'namaaplikasi'=> $datasetting->namaaplikasi,
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
    public function update(UpdateKategoriblogRequest $request, $id)
    {
        $data = Kategoriblog::find($id);

        $data->nama = $request->nama;
        
        $data->Update();
        return redirect('kategoriblog')->with('msg', 'Update Data ' . $data->nama . ' Berhasil');
    }

 

    public function delete($id)
    {
        $data = Kategoriblog::find($id);
        $data->delete();
        return redirect('kategoriblog')->with('msg', 'Data Berhasil di hapus');
    }
  

}
