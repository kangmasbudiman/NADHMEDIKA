<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Setting;
use App\Models\Transaksi;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use DB;


class LayoutController extends Controller
{
    public function index()
    {

        $data = Auth::user();
        $countjob = Job::where('idUser', $data->id)->count();
        $datajob = Job::where('idUser', $data->id)->get();
        $datasetting = Setting::first();
        $datauser = User::count();
        $datauser = User::where('level', '2')->count();
        $dataperawat = User::where('level', '3')->count();
        $datacalonperawat = User::where('level', '4')->count();



        $jumlahjob = Transaksi::count();
        $jumlahjobantrian = Transaksi::where('status', 'Antrian')->count();
        $jumlahjobselesai = Transaksi::where('Status', 'Selesai')->count();
        $jumlahjobrequest = Job::where('Status', 'Request')->count();

        //untuk user
        $jumlahjobproses = Transaksi::where([['Status', 'Proses'], ['Status', 'Antrian'], ['idUser', Auth::user()->id]])->count();

        $jumlahjobuser = Job::where([['idUser', Auth::user()->id]])->count();
        $jumlahmyhomecare = Transaksi::where([['iduser', Auth::user()->id]])->count();

        $totalpasien1 = Transaksi::select(DB::raw("COUNT(id) as   totalpasien"))
            ->GroupBy(DB::raw("Month(created_at)"))
            ->pluck('totalpasien');

        $bulan1 = Transaksi::select(DB::raw("MONTHNAME(created_at) as   bulan"))
            ->GroupBy(DB::raw("MONTHNAME(created_at)"))
            ->pluck('bulan');

            return view("layout.home")->with([
            "user" => Auth::user(),
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'jumlah' => $datauser,
            'jumlahperawat' => $dataperawat,
            'jumlahjob' => $jumlahjob,
            'jumlahjobantrian' => $jumlahjobantrian,
            'jumlahjobselesai' => $jumlahjobselesai,
            'jumlahjobrequest' => $jumlahjobrequest,
            'jumlahjobproses' => $jumlahjobproses,
            'jumlahjobuser' => $jumlahjobuser,
            'jumlahmyhomecare' => $jumlahmyhomecare,
            'pasien' => $totalpasien1,
            'bulannya' => $bulan1,
            'calonperawat' => $datacalonperawat,
        ]);
    }

}
