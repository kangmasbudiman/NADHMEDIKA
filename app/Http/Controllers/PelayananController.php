<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Kategoriperawatan;
use App\Models\Jobdetail;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
Use Carbon;


class PelayananController extends Controller
{
    public function index()
    {

        $datauser = Auth::user();
       
        
        $countjob = Job::where('idUser', $datauser->id)->count();
        $datajob = Job::where('idUser', $datauser->id)->get();
        $data = DB::table('setting')
            ->get();
        $datasetting = Setting::first();
        $pelayanan = Kategoriperawatan::all();
        return view("pelayanan.index")->with([
            "user" => Auth::user(),
            "data" => $data,
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'pelayanan' => $pelayanan,

        ]);
    }
    public function perawatcari(Request $request)
    {
        $idpelayanan = $request->idpelayanan;
        $gender = $request->gender;
        $durasi = $request->durasi;
        $lokasi = $request->lokasi;
        $tanggal = $request->tanggal;


        $datauser = Auth::user();
        


        $countjob = Job::where('idUser', $datauser->id)->count();
        $datajob = Job::where('idUser', $datauser->id)->get();
        $data = DB::table('setting')
            ->get();
        $datasetting = Setting::first();
        $pelayanan = Kategoriperawatan::all();


        if ($request != null) {
            $staff = User::where([['level', 3], ['gender', $gender], ['idperawatan', $idpelayanan]])->get();
        } else {
            $staff = User::where('level', 3)->get();
        }



        return view("pelayanan.perawatcari")->with([
            "user" => Auth::user(),
            "data" => $data,
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'pelayanan' => $pelayanan,
            'perawat' => $staff,
            'idpelayanan' => $idpelayanan,
            'durasi' => $durasi,
            'lokasi' => $lokasi,
            'tanggal' => $tanggal,
            'iduser'=>$datauser->id,
            'hp'=>$datauser->nowa,


        ]);
    }

    public function inputkunjungan(Request $request){
        $datauser = Auth::user();

        $user=Auth::user();
        $nama=$user->name;
        $hp=$user->nowa;
        
        $dataidterakhir=Transaksi::orderby('kodetransaksi','desc')->first();

        if($dataidterakhir){
            $potong_kalimat = substr($dataidterakhir->kodetransaksi,-4);
        }else{
            $potong_kalimat ="0001";
        }
      
        $table_no = $potong_kalimat; // nantinya menggunakan database dan table sungguhan
        $tgl = substr(str_replace('-', '', Carbon\carbon::now()), 0, 8);

        $no = $tgl . $table_no;
        $auto = substr($no, 8);
        $auto = intval($auto) + 1;
        $auto_number = substr($no, 0, 8) . str_repeat(0, (4 - strlen($auto))) . $auto;
        // echo $auto_number;

        
        $namapasien = $request->nama;
        $hp = $request->hp;
        $tanggal = $request->tanggal;
        $idperawat = $request->idperawat;
        $idpelayanan = $request->idpelayanan;
        $durasi = $request->durasi;
        $lokasi = $request->lokasi;
        $up=User::find($request->idperawat);
        $up->status_job="1";
        $up->update();
        

        $data = new Transaksi();
        $data->idpelayanan = $idpelayanan;
        $data->idperawat = $idperawat;
        $data->durasi = $durasi;
        $data->lokasi = $lokasi;
        $data->tanggal = $tanggal;
        $data->nama = $nama;
        $data->hp = $hp;
        $data->kodetransaksi = $auto_number;
        $data->status="Antrian";
        $data->iduser=$datauser->id;
        $data->hp=$datauser->nowa;
        $data->save();
        return redirect('home')->with('msg', 'Pendaftaran Anda Berhasil');

    }








}
