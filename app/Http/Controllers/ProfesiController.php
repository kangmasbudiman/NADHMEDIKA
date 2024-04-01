<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfesiRequest;
use App\Http\Requests\StoreJobsdetailRequest;
use App\Http\Requests\UpdateJobsdetailRequest;
use App\Http\Requests\UpdateProfesiRequest;
use App\Models\Profesi;
use App\Models\Job;
use App\Models\Jobdetail;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use Carbon;
use Illuminate\Http\Request;

class ProfesiController extends Controller
{
        

    public function index()
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,
        $data = DB::table('profesi')
           
            ->get();
          
        $datasetting = Setting::first();

        return view("profesi.index")->with([

            "user" => Auth::user(),
            "profesi" => $data,
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



        return view("profesi.formAdd")->with([
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
    public function store(StoreProfesiRequest $request)
    {
        $validate = $request->validated();
       

        $profesi = new Profesi();
        
        $profesi->namaprofesi = $request->namaprofesi;
      
        $profesi->save();

    

        return redirect('profesi')->with('msg', 'Tambah Profesi Berhasil');

    }


   
   


    /**
     * Display the specified resource.
     */
    public function show(Profesi $profesi, $id)
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
        return view('profesi.formEdit')->with([

            "user" => Auth::user(),
            "id" => $data->id,
            "namaprofesi" => $data->namaprofesi,
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
    public function update(UpdateProfesiRequest $request, $id)
    {
        $data = Profesi::find($id);

        $data->namaprofesi = $request->namaprofesi;
        
        $data->Update();
        return redirect('profesi')->with('msg', 'Update Data ' . $data->namaprofesi . ' Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Profesi::find($id);
        $data->delete();
        return redirect('profesi')->with('msg', 'Data Berhasil di hapus');
    }

    public function delete($id)
    {
        $data = Profesi::find($id);
        $data->delete();
        return redirect('profesi')->with('msg', 'Data Berhasil di hapus');
    }
  

}
