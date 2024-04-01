<?php

namespace App\Http\Controllers;

use App\Models\Kecepatanlayanan;
use App\Models\Kualitaslayanan;
use App\Models\Petugas;
use App\Models\Responlayanan;
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


class MyhomecareController extends Controller
{


    public function updateselesai(Request $request){
        
        $data=Transaksi::where('kodetransaksi',$request->kodetransaksi)->first();
       $update=Transaksi::find($data->id);

        $update->status=$request->status;
        $update->update();
        return redirect('myhomecare')->with('msg', 'Pelayanan Telah Selesai');

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


    public function perawatcari(Request $request){

        $datauser = Auth::user();
        $idpelayanan = $request->idpelayanan;
        $gender = $request->gender;
        $durasi = $request->durasi;
        $lokasi = $request->lokasi;
        $tanggal = $request->tanggal;
        
        $countjob = Job::where('idUser', $datauser->id)->count();
        $datajob = Job::where('idUser', $datauser->id)->get();
        $data = DB::table('setting')->get();
        $datasetting = Setting::first();
        $pelayanan = Kategoriperawatan::all();
        $datahomecare=Transaksi::where('iduser',$datauser->id)
       ->orderBy('status','Asc')
        ->get();
        $staff = User::where('level', 3)->get();

        return view("homecare.perawatcari")->with([
            "user" => Auth::user(),
            "data" => $data,
            "homecare"=>$datahomecare,
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'pelayanan' => $pelayanan,
            'perawat' => $staff,
            'tanggal'=>$tanggal,
            'idpelayanan'=>$idpelayanan,
            'durasi'=>$durasi,
            'lokasi'=>$lokasi,


        ]);


    }



    public function index()
    {

        $datauser = Auth::user();
       
        
        $countjob = Job::where('idUser', $datauser->id)->count();
        $datajob = Job::where('idUser', $datauser->id)->get();
        $data = DB::table('setting')->get();
        $datasetting = Setting::first();
        $pelayanan = Kategoriperawatan::all();
        $datahomecare=Transaksi::where('iduser',$datauser->id)
        ->orderBy('status','Asc')
        ->get();


        return view("homecare.index")->with([
            "user" => Auth::user(),
            "data" => $data,
            "homecare"=>$datahomecare,
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'pelayanan' => $pelayanan,

        ]);
    }

    public function ulasan(Request $request){


        $idtransaksi=$request->id;
        $kodetransaksi=$request->kodetransaksi;
        $rating1=$request->rating1;
        $lrating1=$request->lrating1;
        $rsrating1=$request->rsrating1;
        $prating1=$request->prating1;

        $data=new Kualitaslayanan();
        $data->idtransaksi=$idtransaksi;
        $data->kodetransaksi=$kodetransaksi;
        $data->nilai=$rating1;
        $data->save();

        $data1=new Kecepatanlayanan();
        $data1->idtransaksi=$idtransaksi;
        $data1->kodetransaksi=$kodetransaksi;
        $data1->nilai=$lrating1;
        $data1->save();
        
        $data2=new Responlayanan();
        $data2->idtransaksi=$idtransaksi;
        $data2->kodetransaksi=$kodetransaksi;
        $data2->nilai=$rsrating1;
        $data2->save();

        $data3= new Petugas();
        $data3->idtransaksi=$idtransaksi;
        $data3->kodetransaksi=$kodetransaksi;
        $data3->nilai=$prating1;
        $data3->save();

        $updatestatusreview=Transaksi::where('kodetransaksi',$kodetransaksi)->first();
        $updatestatusreview->status_review="1";
        $updatestatusreview->update();

        ;

        return redirect('myhomecare')->with('msg', 'Terimakasih Atas Review Anda');


        
    }


   








}
