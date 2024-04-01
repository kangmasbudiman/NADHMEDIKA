<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Jobdetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class SettingController extends Controller
{
    public function index(){
        $datauser=Auth::user();
        $countjob=Job::where('idUser',$datauser->id)->count();
        // "notif"=>$countjob,
        $datajob=Job::where('idUser',$datauser->id)->get();
        // "datajob"=>$datajob,
        $data = DB::table('setting')
        
          
            ->get();

            $datasetting=Setting::first();
            //use App\Models\Setting;
            //  'namaaplikasi'=>$datasetting->namaaplikasi,
            //'target'=>$datasetting->target,
            

        return view("setting.index")->with([

            "user" => Auth::user(),
            "data" => $data,
            "notif"=>$countjob,
            "datajob"=>$datajob,
            'namaaplikasi'=>$datasetting->namaaplikasi,
            'target'=>$datasetting->target,
            

        ]);
    }


    public function edit($id){
        $datauser=Auth::user();
        $countjob=Job::where('idUser',$datauser->id)->count();
        // "notif"=>$countjob,
        $datajob=Job::where('idUser',$datauser->id)->get();
        // "datajob"=>$datajob,
        $data = DB::table('setting')
             ->where('id',$id)
            ->first();
            //dd($data);

            $datasetting=Setting::first();
            //use App\Models\Setting;
            //  'namaaplikasi'=>$datasetting->namaaplikasi,
            //'target'=>$datasetting->target,
            
        return view("setting.formEdit")->with([

            "user" => Auth::user(),
            "data" => $data,
            "notif"=>$countjob,
            "datajob"=>$datajob,
            "id"=>$data->id,
            'namaaplikasi'=>$datasetting->namaaplikasi,
            'target'=>$datasetting->target,
            

        ]);

    }


    public function update(Request $request){
        $data=Setting::find($request->id);
        $data->namaaplikasi=$request->namaaplikasi;
        $data->target=$request->target;
        $data->update();
        return redirect ('setting')->with('msg','Update'.$data->name.' Berhasil diupdate');
    }
}
