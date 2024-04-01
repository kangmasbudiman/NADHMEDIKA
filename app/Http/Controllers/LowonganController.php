<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLowonganRequest;

use App\Http\Requests\UpdateLowonganRequest;
use App\Models\Lowongan;
use App\Models\Job;

use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use Carbon;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
        

    public function index()
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,
        $data = DB::table('lowongan')
           
            ->get();
          
        $datasetting = Setting::first();

        return view("lowongan.index")->with([

            "user" => Auth::user(),
            "lowongan" => $data,
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
              



        return view("lowongan.formAdd")->with([
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
    public function store(StoreLowonganRequest $request)
    {
        $validate = $request->validated();
       

        $blog = new Lowongan();
        
        $blog->nama = $request->nama;
      
        $blog->save();

    

        return redirect('lowongan')->with('msg', 'Tambah Kategori Blog Berhasil');

    }


   
   


    /**
     * Display the specified resource.
     */
    public function show(Lowongan $blog, $id)
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $data = $blog->find($id);
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,

        $datasetting = Setting::first();


        $datauserr = User::all();
       
        return view('lowongan.formEdit')->with([

            "user" => Auth::user(),
            "id" => $data->id,
            "nama" => $data->nama,
            'namaaplikasi'=> $datasetting->namaaplikasi,
            "notif" => $countjob,
            "datajob" => $datajob,
           

        ]);


    }

  
    public function update(UpdateLowonganRequest $request, $id)
    {
        $data = Lowongan::find($id);

        $data->nama = $request->nama;
       
        $data->Update();
        return redirect('lowongan')->with('msg', 'Update Data ' . !!html_entity_decode($data->nama) . ' Berhasil');
    }

 

    public function delete($id)
    {
        $data = Lowongan::find($id);
        $data->delete();
        return redirect('lowongan')->with('msg', 'Data Berhasil di hapus');
    }
  

}
