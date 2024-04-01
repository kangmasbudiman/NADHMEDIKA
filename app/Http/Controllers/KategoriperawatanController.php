<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategoriperawatanRequest;

use App\Http\Requests\UpdateKategoriperawatanRequest;
use App\Models\Kategoriperawatan;
use App\Models\Job;

use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use Carbon;
use Illuminate\Http\Request;

class KategoriperawatanController extends Controller
{
        

    public function index()
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,
        $data = DB::table('kategori_perawatan')
           
            ->get();
          
        $datasetting = Setting::first();

        return view("kategoriperawatan.index")->with([

            "user" => Auth::user(),
            "kategoriperawatan" => $data,
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



        return view("kategoriperawatan.formAdd")->with([
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
    public function store(StoreKategoriperawatanRequest $request)
    {
        $validate = $request->validated();
       

        $profesi = new Kategoriperawatan();
        
        $profesi->namaperawatan = $request->namaperawatan;
        $profesi->deskripsi = $request->deskripsi;
        $profesi->tarif = $request->tarif;
        $profesi->durasi = $request->durasi;
      
        $profesi->save();

    

        return redirect('kategoriperawatan')->with('msg', 'Tambah Kategori perawatan Berhasil');

    }


   
   


    /**
     * Display the specified resource.
     */
    public function show(Kategoriperawatan $profesi, $id)
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $data = $profesi->find($id);
        
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,

        $datasetting = Setting::first();


        $datauserr = User::all();
        $dataclient= Client::all();
        return view('kategoriperawatan.formEdit')->with([

            "user" => Auth::user(),
            "id" => $data->id,
            "namaperawatan" => $data->namaperawatan,
            "deskripsi" => $data->deskripsi,
            "tarif" => $data->tarif,
            "durasi" => $data->durasi,
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
    public function update(UpdateKategoriperawatanRequest $request, $id)
    {
        $data = Kategoriperawatan::find($id);

        $data->namaperawatan = $request->namaperawatan;
        $data->deskripsi = $request->deskripsi;
        $data->tarif = $request->tarif;
        $data->durasi = $request->durasi;
        
        $data->Update();
        return redirect('kategoriperawatan')->with('msg', 'Update Data ' . $data->namaperawatan . ' Berhasil');
    }

 

    public function delete($id)
    {
        $data = Kategoriperawatan::find($id);
        $data->delete();
        return redirect('kategoriperawatan')->with('msg', 'Data Berhasil di hapus');
    }
  

}
