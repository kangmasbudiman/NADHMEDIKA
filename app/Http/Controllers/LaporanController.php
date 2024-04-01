<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function laporanpendapatan(Request $request)
     {
         $datauser = Auth::user();
         $countjob = Job::where('idUser', $datauser->id)->count();
          $datajob = Job::where('idUser', $datauser->id)->get();
          $tanggal_awal = date('Y-m-d', strtotime($request->tanggal));
         $tanggal_akhir = date('Y-m-d', strtotime($request->tanggal1));
         $data1 = DB::table("transaksi_pendaftaran")
         ->select(DB::raw('*,sum(grandtotal)as totalsemua'))
         ->join('users', 'users.id', '=', 'transaksi_pendaftaran.idperawat')
          ->join('kategori_perawatan', 'kategori_perawatan.id', '=', 'transaksi_pendaftaran.idpelayanan')
         ->whereDate('transaksi_pendaftaran.created_at', '>=', $tanggal_awal)
         ->whereDate('transaksi_pendaftaran.created_at', '<=', $tanggal_akhir)
         ->where('status','Selesai')
         ->groupBy(DB::raw("idUser"))
         ->get();
        




             
                 $datasetting=Setting::first();
      
                 
         return view("laporan.laporanpendapatan")->with([
             "user" => Auth::user(),
             "users" => User::all(),
             "notif" => $countjob,
             "datajob" => $datajob,
             "jobs"=>$data1,
             'namaaplikasi'=>$datasetting->namaaplikasi,
             'target'=>$datasetting->target,
         ]);
 
     }







  

     public function laporanjoblistaksi(Request $request)
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
         $datajob = Job::where('idUser', $datauser->id)->get();
         $tanggal_awal = date('Y-m-d', strtotime($request->tanggal));
        $tanggal_akhir = date('Y-m-d', strtotime($request->tanggal1));
        $data1 = DB::table("transaksi_pendaftaran")
        ->select(DB::raw('*'))
        ->join('users', 'users.id', '=', 'transaksi_pendaftaran.idperawat')
         ->join('kategori_perawatan', 'kategori_perawatan.id', '=', 'transaksi_pendaftaran.idpelayanan')
        ->whereDate('transaksi_pendaftaran.created_at', '>=', $tanggal_awal)
        ->whereDate('transaksi_pendaftaran.created_at', '<=', $tanggal_akhir)
        ->where('status','Selesai')
        ->get();
            

                $datasetting=Setting::first();
     
                
        return view("laporan.laporanjoblistt")->with([
            "user" => Auth::user(),
            "users" => User::all(),
            "notif" => $countjob,
            "datajob" => $datajob,
            "jobs"=>$data1,
            'namaaplikasi'=>$datasetting->namaaplikasi,
            'target'=>$datasetting->target,
        ]);

    }

     public function laporanjoblist()
     {
         $datauser = Auth::user();
         $countjob = Job::where('idUser', $datauser->id)->count();
                $datajob = Job::where('idUser', $datauser->id)->get();
               $idUser = Auth::user()->id;
         $datasetting=Setting::first();
              return view("laporan.laporanpendapatanuser")->with([
             "user" => Auth::user(),
             "users" => User::all(),
             "notif" => $countjob,
             "datajob" => $datajob,
             'namaaplikasi'=>$datasetting->namaaplikasi,
         'target'=>$datasetting->target,
         ]);
     }
    


     public function pendapatanuser()
     {
         $datauser = Auth::user();
         $countjob = Job::where('idUser', $datauser->id)->count();
                $datajob = Job::where('idUser', $datauser->id)->get();
               $idUser = Auth::user()->id;
         $datasetting=Setting::first();
              return view("laporan.laporanpendapatanuser")->with([
             "user" => Auth::user(),
             "users" => User::all(),
             "notif" => $countjob,
             "datajob" => $datajob,
             'namaaplikasi'=>$datasetting->namaaplikasi,
         'target'=>$datasetting->target,
         ]);
     }

    public function laporanuseraksi(Request $request)
    {
        $datauser = Auth::user();
        //$datauser = Auth::user()->id;
       // dd($datauser);
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,

        $tanggal_awal = date('Y-m-d', strtotime($request->tanggal));
        $tanggal_akhir = date('Y-m-d', strtotime($request->tanggal1));

        $data1 = DB::table("transaksi_pendaftaran")
                ->select(DB::raw('*'))
                ->join('users', 'users.id', '=', 'transaksi_pendaftaran.iduser')
                ->whereDate('transaksi_pendaftaran.created_at', '>=', $tanggal_awal)
                ->whereDate('transaksi_pendaftaran.created_at', '<=', $tanggal_akhir)
                ->where('status','Selesai')
                ->get();
               
        
                $datasetting=Setting::first();
              
              
        return view("laporan.laporanuser")->with([
            "user" => Auth::user(),
            "users" => User::all(),
            "notif" => $countjob,
            "datajob" => $datajob,
            "jobs"=>$data1,
            'namaaplikasi'=>$datasetting->namaaplikasi,
            'target'=>$datauser->target,
                
        ]);




    }
    public function index()
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,

        $idUser = Auth::user()->id;



        $datasetting=Setting::first();
        //use App\Models\Setting;
        //  'namaaplikasi'=>$datasetting->namaaplikasi,
        //'target'=>$datasetting->target,
        
        return view("laporan.index")->with([
            "user" => Auth::user(),
            "users" => User::all(),
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi'=>$datasetting->namaaplikasi,
           'target'=>$datasetting->target,

        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
