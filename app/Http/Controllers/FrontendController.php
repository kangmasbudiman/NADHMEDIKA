<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Kategoriblog;
use App\Models\Kategoriperawatan;
use App\Models\Kecepatanlayanan;
use App\Models\Kualitaslayanan;
use App\Models\Pendidikan;
use App\Models\Petugas;
use App\Models\Responlayanan;
use App\Models\Syarat;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Tentang;
use App\Models\User;
use App\Models\Hubungi;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

use Carbon;
use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class FrontendController extends Controller
{


    public function inputlowongan(Request $request)
    {
       
    

        if ($request->hasFile('foto')) {
            $pathfoto = $request->file('foto')->store('uploads');

        } else {
            $pathfoto = '';
        }

        if ($request->hasFile('ijazah')) {
            $pathijazah = $request->file('ijazah')->store('uploads');

        } else {
            $pathijazah = '';
        }

        if ($request->hasFile('filektp')) {
            $pathktp = $request->file('filektp')->store('uploads');

        } else {
            $pathktp = '';
        }


        if ($request->hasFile('filestr')) {
            $pathstr = $request->file('filestr')->store('uploads');

        } else {
            $pathstr = '';
        }

        if ($request->hasFile('filesertifikat')) {
            $pathsertifikat = $request->file('filesertifikat')->store('uploads');

        } else {
            $pathsertifikat = '';
        }



        $cek = User::where('ktp', $request->ktp)->first();
        if ($cek) {
            return redirect('register')->with('msg', 'No KTP Sudah Pernah Didaftarkan');
        } else {

            $cekemail = User::where('email', $request->email)->first();
            if ($cekemail) {
                return redirect('register')->with('msg', 'Email Sudah Pernah Didaftarkan');
            } else {

                $dataidterakhir = User::orderby('no_member', 'desc')->first();
                if ($dataidterakhir) {
                    $potong_kalimat = substr($dataidterakhir->no_member, -4);
                } else {
                    $potong_kalimat = "0001";
                }
                $table_no = $potong_kalimat; // nantinya menggunakan database dan table sungguhan
                $tgl = substr(str_replace('-', '', Carbon\carbon::now()), 0, 8);
                $no = $tgl . $table_no;
                $auto = substr($no, 8);
                $auto = intval($auto) + 1;
                $auto_number = substr($no, 0, 8) . str_repeat(0, (4 - strlen($auto))) . $auto;
               

                $data = new User();
                $data->name = $request->nama;
                
                $data->nowa = $request->hp;
                $data->gender = $request->gender;
                $data->alamat = $request->jalan;
                $data->username = $request->nama;
                $data->password = bcrypt("123");
                $data->email = $request->email;
                $data->no_member = $auto_number;
                $data->ktp = $request->ktp;
                $data->level = "4";
                $data->usia = $request->usia;
                $data->tempatlahir = $request->tempatlahir;
                $data->tanggal_lahir = $request->tanggallahir;
                $data->bulan_lahir = $request->bulanlahir;
                $data->tahun_lahir = $request->tahunlahir;
                $data->tinggi_badan = $request->tinggi_badan;
                $data->berat_badan = $request->berat_badan;
                $data->agama = $request->agama;
                $data->status_pernikahan = $request->statuspernikahan;
                $data->sosmed = $request->sosmed;
                $data->email = $request->email;
                $data->deskripsi = $request->deskripsi;
                $data->propinsi = $request->provinsi;
                $data->kabupaten = $request->kabupaten;
                $data->kecamatan = $request->kecamatan;
                $data->desa = $request->desa;
                $data->idpendidikan = $request->idpendidikan;
                $data->nama_sekolah = $request->namasekolah;
                $data->jurusan = $request->jurusan;
                $data->lulus_tahun = $request->lulustahun;
                $data->dapatinfo = $request->dapatinfo;
                $data->pelatihan = $request->pelatihan;
                $data->sertifikat = $request->sertifikat;
                $data->str = $request->str;
                $data->pengalaman = $request->pengalaman;
                $data->riwayat_penyakit = $request->riwayat_penyakit;
                $data->foto_ktp = $pathktp;
                $data->foto_ijazah = $pathijazah;
                $data->foto = $pathfoto;
                $data->foto_str = $pathstr;
                $data->foto_sertifikat = $pathsertifikat;
                                $data->save();
                                return redirect('frontlowongan')->with('msg', 'Selamat anda telah berhasil terdaftar sebagai Calon Perawat  di NADHMEDIKA HomeCare Tunggu Informasi Berikutnya.!)');
       
            }
        }
    }


    public function getkabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kabupaten = Regency::where('province_id', $id_provinsi)->get();
        $option = "<option>Pilih Kabupaten</option>";
        foreach ($kabupaten as $kab) {
            $option .= "<option value='$kab->id'>$kab->name</option>";
        }
        echo $option;

    }
    public function getkecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatan = District::where('regency_id', $id_kabupaten)->get();
        $option = "<option>Pilih Kecamatan</option>";
        foreach ($kecamatan as $kec) {
            $option .= "<option value='$kec->id'>$kec->name</option>";
        }
        echo $option;

    }

    public function getdesa(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;

        $desa = Village::where('district_id', $id_kecamatan)->get();
        $option = "<option>Pilih Desa</option>";
        foreach ($desa as $des) {
            $option .= "<option value='$des->id'>$des->name</option>";
        }
        echo $option;

    }


    public function frontsyarat()
    {

        $datasetting = Setting::first();
        $slider = Slider::all();
        $tentang = Tentang::all();
        $pelayanan = Kategoriperawatan::all();
        $staff = User::where('level', 3)->get();
        $hubungi = Hubungi::all();
        $totalpasienbulanan = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->count();
        $totalpasienharian = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->whereDay('created_at', Carbon\carbon::now()->day)->count();
        $totalratingkecepatanlayanan = Kecepatanlayanan::count();
        $sum = Kecepatanlayanan::sum('nilai');
        $nilaikecepatan_layanan = $sum / $totalratingkecepatanlayanan;
        $kualitas = Kualitaslayanan::count();
        $sumkualitas = Kualitaslayanan::sum('nilai');
        $nilaikua = $sumkualitas / $kualitas;
        $respon = Responlayanan::count();
        $sumrespon = Responlayanan::sum('nilai');
        $nilairespon = $sumrespon / $respon;
        $petugas = Petugas::count();
        $sumpetugas = Petugas::sum('nilai');
        $nilaipetugas = $sumpetugas / $petugas;
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $syarat = Syarat::all();
        return view('frontend.syarat')->with([
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'slider' => $slider,
            'tentang' => $tentang,
            'pelayanan' => $pelayanan,
            'user' => $staff,
            'hubungi' => $hubungi,
            'pasienharian' => $totalpasienharian,
            'pasienbulanan' => $totalpasienbulanan,
            'nilaikecepatanlayanan' => $nilaikecepatan_layanan,
            'nilaikualitas' => $nilaikua,
            'nilairespon' => $nilairespon,
            'nilaipetugas' => $nilaipetugas,
            'provinces' => $provinces,
            'regencies' => $regencies,
            'districts' => $districts,
            'villages' => $villages,
            'syarat' => $syarat,

        ]);

    }


    public function frontlowongan()
    {

        $datasetting = Setting::first();
        $slider = Slider::all();
        $tentang = Tentang::all();
        $pelayanan = Kategoriperawatan::all();
        $staff = User::where('level', 3)->get();
        $hubungi = Hubungi::all();
        $totalpasienbulanan = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->count();
        $totalpasienharian = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->whereDay('created_at', Carbon\carbon::now()->day)->count();
        $totalratingkecepatanlayanan = Kecepatanlayanan::count();
        $sum = Kecepatanlayanan::sum('nilai');
        $nilaikecepatan_layanan = $sum / $totalratingkecepatanlayanan;
        $kualitas = Kualitaslayanan::count();
        $sumkualitas = Kualitaslayanan::sum('nilai');
        $nilaikua = $sumkualitas / $kualitas;
        $respon = Responlayanan::count();
        $sumrespon = Responlayanan::sum('nilai');
        $nilairespon = $sumrespon / $respon;
        $petugas = Petugas::count();
        $sumpetugas = Petugas::sum('nilai');
        $nilaipetugas = $sumpetugas / $petugas;
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $pendidikan = Pendidikan::all();
        return view('frontend.lowongan')->with([
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'slider' => $slider,
            'tentang' => $tentang,
            'pelayanan' => $pelayanan,
            'user' => $staff,
            'hubungi' => $hubungi,
            'pasienharian' => $totalpasienharian,
            'pasienbulanan' => $totalpasienbulanan,
            'nilaikecepatanlayanan' => $nilaikecepatan_layanan,
            'nilaikualitas' => $nilaikua,
            'nilairespon' => $nilairespon,
            'nilaipetugas' => $nilaipetugas,
            'provinces' => $provinces,
            'regencies' => $regencies,
            'districts' => $districts,
            'villages' => $villages,
            'pendidikan' => $pendidikan
        ]);

    }



    public function index()
    {
        $datasetting = Setting::first();
        $slider = Slider::all();
        $tentang = Tentang::all();
        $pelayanan = Kategoriperawatan::all();
        $staff = User::where('level', 3)->get();
        $hubungi = Hubungi::all();

        $totalpasienbulanan = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->count();
        $totalpasienharian = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->whereDay('created_at', Carbon\carbon::now()->day)->count();

        $totalratingkecepatanlayanan = Kecepatanlayanan::count();
        $sum = Kecepatanlayanan::sum('nilai');
        $nilaikecepatan_layanan = $sum / $totalratingkecepatanlayanan;

        $kualitas = Kualitaslayanan::count();
        $sumkualitas = Kualitaslayanan::sum('nilai');
        $nilaikua = $sumkualitas / $kualitas;

        $respon = Responlayanan::count();
        $sumrespon = Responlayanan::sum('nilai');
        $nilairespon = $sumrespon / $respon;


        $petugas = Petugas::count();
        $sumpetugas = Petugas::sum('nilai');
        $nilaipetugas = $sumpetugas / $petugas;






        return view('frontend.home')->with([
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'slider' => $slider,
            'tentang' => $tentang,
            'pelayanan' => $pelayanan,
            'user' => $staff,
            'hubungi' => $hubungi,
            'pasienharian' => $totalpasienharian,
            'pasienbulanan' => $totalpasienbulanan,
            'nilaikecepatanlayanan' => $nilaikecepatan_layanan,
            'nilaikualitas' => $nilaikua,
            'nilairespon' => $nilairespon,
            'nilaipetugas' => $nilaipetugas,


        ]);
    }
    public function perawatcari(Request $request)
    {



        $idpelayanan = $request->idpelayanan;
        $gender = $request->gender;
        $durasi = $request->durasi;
        $lokasi = $request->lokasi;

        $datasetting = Setting::first();
        $slider = Slider::all();
        $tentang = Tentang::all();
        $pelayanan = Kategoriperawatan::all();

        $totalpasienbulanan = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->count();
        $totalpasienharian = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->whereDay('created_at', Carbon\carbon::now()->day)->count();

        $totalratingkecepatanlayanan = Kecepatanlayanan::count();
        $sum = Kecepatanlayanan::sum('nilai');
        $nilaikecepatan_layanan = $sum / $totalratingkecepatanlayanan;

        $kualitas = Kualitaslayanan::count();
        $sumkualitas = Kualitaslayanan::sum('nilai');
        $nilaikua = $sumkualitas / $kualitas;

        $respon = Responlayanan::count();
        $sumrespon = Responlayanan::sum('nilai');
        $nilairespon = $sumrespon / $respon;


        $petugas = Petugas::count();
        $sumpetugas = Petugas::sum('nilai');
        $nilaipetugas = $sumpetugas / $petugas;
        if ($request != null) {
            $staff = User::where([['level', 3], ['gender', $gender], ['idperawatan', $idpelayanan]])->get();
        } else {
            $staff = User::where('level', 3)->get();
        }
        $hubungi = Hubungi::all();
        return view('frontend.listperawat')->with([
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'slider' => $slider,
            'tentang' => $tentang,
            'pelayanan' => $pelayanan,
            'user' => $staff,
            'idpelayanan' => $idpelayanan,
            'durasi' => $durasi,
            'lokasi' => $lokasi,
            'hubungi' => $hubungi,
            'pasienharian' => $totalpasienharian,
            'pasienbulanan' => $totalpasienbulanan,
            'nilaikecepatanlayanan' => $nilaikecepatan_layanan,
            'nilaikualitas' => $nilaikua,
            'nilairespon' => $nilairespon,
            'nilaipetugas' => $nilaipetugas,

        ]);
    }

    public function inputkunjungan(Request $request)
    {

        $idperawat = $request->idperawat;
        $idpelayanan = $request->idpelayanan;
        $durasi = $request->durasi;
        $lokasi = $request->lokasi;
        $datasetting = Setting::first();
        $slider = Slider::all();
        $tentang = Tentang::all();
        $pelayanan = Kategoriperawatan::all();
        $user = User::where('id', $idperawat)->first();

        $hubungi = Hubungi::all();
        return view('frontend.inputkunjungan')->with([
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'slider' => $slider,
            'tentang' => $tentang,
            'pelayanan' => $pelayanan,
            'idpelayanan' => $idpelayanan,
            'idperawat' => $idperawat,
            'durasi' => $durasi,
            'lokasi' => $lokasi,
            'hubungi' => $hubungi,
            'namaperawat' => $user->name,
        ]);
    }

    public function inputkunjungan_aksi(Request $request)
    {

        $dataidterakhir = Transaksi::orderby('kodetransaksi', 'desc')->first();

        if ($dataidterakhir) {
            $potong_kalimat = substr($dataidterakhir->kodetransaksi, -4);
        } else {
            $potong_kalimat = "0001";
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


        $data = new Transaksi();
        $data->idpelayanan = $idpelayanan;
        $data->idperawat = $idperawat;
        $data->durasi = $durasi;
        $data->lokasi = $lokasi;
        $data->tanggal = $tanggal;
        $data->nama = $namapasien;
        $data->hp = $hp;
        $data->kodetransaksi = $auto_number;
        $data->status = "Antrian";
        $data->save();




        return redirect('/pesan')->with('msg', 'Tambah Blog Berhasil');

        /*

                $datasetting = Setting::first();
                $slider = Slider::all();
                $tentang = Tentang::all();
                $pelayanan = Kategoriperawatan::all();
                $user=User::where('id',$idperawat)->first();

                $hubungi = Hubungi::all();
                return view('frontend.pesanberhasil')->with([
                    'namaaplikasi' => $datasetting->namaaplikasi,
                    'target' => $datasetting->target,
                    'slider' => $slider,
                    'tentang' => $tentang,
                    'pelayanan' => $pelayanan,
                    'idpelayanan'=>$idpelayanan,
                    'idperawat'=>$idperawat,
                    'durasi'=>$durasi,
                    'lokasi'=>$lokasi,
                    'hubungi' => $hubungi,
                    'namaperawat'=>$user->name,
                ]);
                */
    }


    public function pesan(Request $request)
    {

        $kodetransaksiterahir = Transaksi::orderby('kodetransaksi', 'desc')->first();

        $idterahir = $kodetransaksiterahir->kodetransaksi;

        $idperawat = $request->idperawat;
        $idpelayanan = $request->idpelayanan;
        $durasi = $request->durasi;
        $lokasi = $request->lokasi;
        $datasetting = Setting::first();
        $slider = Slider::all();
        $tentang = Tentang::all();
        $pelayanan = Kategoriperawatan::all();
        $user = User::where('id', $idperawat)->first();

        $hubungi = Hubungi::all();
        return view('frontend.pesan')->with([
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'slider' => $slider,
            'tentang' => $tentang,
            'idterahir' => $idterahir,
            'hubungi' => $hubungi,
            'pelayanan' => $pelayanan,


        ]);

    }






    public function team()
    {

        $datasetting = Setting::first();
        $slider = Slider::all();
        $tentang = Tentang::all();
        $pelayanan = Kategoriperawatan::all();
        $staff = User::where('level', 3)->get();
        $hubungi = Hubungi::all();
        return view('frontend.listperawat')->with([
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'slider' => $slider,
            'tentang' => $tentang,
            'pelayanan' => $pelayanan,
            'user' => $staff,
            'hubungi' => $hubungi,
        ]);
    }

    public function detailperawat($id)
    {

        $datasetting = Setting::first();
        $slider = Slider::all();
        $tentang = Tentang::all();
        $pelayanan = Kategoriperawatan::all();
        $staff = User::where([['level', 3], ['id', $id]])->get();
        $hubungi = Hubungi::all();
        $totalpasienbulanan = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->count();
        $totalpasienharian = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->whereDay('created_at', Carbon\carbon::now()->day)->count();

        $totalratingkecepatanlayanan = Kecepatanlayanan::count();
        $sum = Kecepatanlayanan::sum('nilai');
        $nilaikecepatan_layanan = $sum / $totalratingkecepatanlayanan;

        $kualitas = Kualitaslayanan::count();
        $sumkualitas = Kualitaslayanan::sum('nilai');
        $nilaikua = $sumkualitas / $kualitas;

        $respon = Responlayanan::count();
        $sumrespon = Responlayanan::sum('nilai');
        $nilairespon = $sumrespon / $respon;


        $petugas = Petugas::count();
        $sumpetugas = Petugas::sum('nilai');
        $nilaipetugas = $sumpetugas / $petugas;
        return view('frontend.detailperawat')->with([
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'slider' => $slider,
            'tentang' => $tentang,
            'pelayanan' => $pelayanan,
            'user' => $staff,
            'hubungi' => $hubungi,
            'pasienharian' => $totalpasienharian,
            'pasienbulanan' => $totalpasienbulanan,
            'nilaikecepatanlayanan' => $nilaikecepatan_layanan,
            'nilaikualitas' => $nilaikua,
            'nilairespon' => $nilairespon,
            'nilaipetugas' => $nilaipetugas,
        ]);
    }


    public function about()
    {
        $datasetting = Setting::first();
        $slider = Slider::all();
        $tentang = Tentang::all();
        $pelayanan = Kategoriperawatan::all();
        $staff = User::where('level', 3)->get();
        $hubungi = Hubungi::all();
        $totalpasienbulanan = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->count();
        $totalpasienharian = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->whereDay('created_at', Carbon\carbon::now()->day)->count();

        $totalratingkecepatanlayanan = Kecepatanlayanan::count();
        $sum = Kecepatanlayanan::sum('nilai');
        $nilaikecepatan_layanan = $sum / $totalratingkecepatanlayanan;

        $kualitas = Kualitaslayanan::count();
        $sumkualitas = Kualitaslayanan::sum('nilai');
        $nilaikua = $sumkualitas / $kualitas;

        $respon = Responlayanan::count();
        $sumrespon = Responlayanan::sum('nilai');
        $nilairespon = $sumrespon / $respon;


        $petugas = Petugas::count();
        $sumpetugas = Petugas::sum('nilai');
        $nilaipetugas = $sumpetugas / $petugas;

        return view('frontend.about')->with([
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'slider' => $slider,
            'tentang' => $tentang,
            'pelayanan' => $pelayanan,
            'user' => $staff,
            'hubungi' => $hubungi,
            'pasienharian' => $totalpasienharian,
            'pasienbulanan' => $totalpasienbulanan,
            'nilaikecepatanlayanan' => $nilaikecepatan_layanan,
            'nilaikualitas' => $nilaikua,
            'nilairespon' => $nilairespon,
            'nilaipetugas' => $nilaipetugas,
        ]);
    }
    public function service()
    {
        $datasetting = Setting::first();
        $slider = Slider::all();
        $tentang = Tentang::all();
        $pelayanan = Kategoriperawatan::all();
        $staff = User::where('level', 3)->get();
        $hubungi = Hubungi::all();


        $totalpasienbulanan = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->count();
        $totalpasienharian = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->whereDay('created_at', Carbon\carbon::now()->day)->count();

        $totalratingkecepatanlayanan = Kecepatanlayanan::count();
        $sum = Kecepatanlayanan::sum('nilai');
        $nilaikecepatan_layanan = $sum / $totalratingkecepatanlayanan;

        $kualitas = Kualitaslayanan::count();
        $sumkualitas = Kualitaslayanan::sum('nilai');
        $nilaikua = $sumkualitas / $kualitas;

        $respon = Responlayanan::count();
        $sumrespon = Responlayanan::sum('nilai');
        $nilairespon = $sumrespon / $respon;


        $petugas = Petugas::count();
        $sumpetugas = Petugas::sum('nilai');
        $nilaipetugas = $sumpetugas / $petugas;



        return view('frontend.service')->with([
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'slider' => $slider,
            'tentang' => $tentang,
            'pelayanan' => $pelayanan,
            'user' => $staff,
            'hubungi' => $hubungi,
            'pasienharian' => $totalpasienharian,
            'pasienbulanan' => $totalpasienbulanan,
            'nilaikecepatanlayanan' => $nilaikecepatan_layanan,
            'nilaikualitas' => $nilaikua,
            'nilairespon' => $nilairespon,
            'nilaipetugas' => $nilaipetugas,
        ]);
    }

    public function pricing()
    {
        $datasetting = Setting::first();
        $slider = Slider::all();
        $tentang = Tentang::all();
        $pelayanan = Kategoriperawatan::all();
        $staff = User::where('level', 3)->get();
        $hubungi = Hubungi::all();

        $totalpasienbulanan = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->count();
        $totalpasienharian = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->whereDay('created_at', Carbon\carbon::now()->day)->count();

        $totalratingkecepatanlayanan = Kecepatanlayanan::count();
        $sum = Kecepatanlayanan::sum('nilai');
        $nilaikecepatan_layanan = $sum / $totalratingkecepatanlayanan;

        $kualitas = Kualitaslayanan::count();
        $sumkualitas = Kualitaslayanan::sum('nilai');
        $nilaikua = $sumkualitas / $kualitas;

        $respon = Responlayanan::count();
        $sumrespon = Responlayanan::sum('nilai');
        $nilairespon = $sumrespon / $respon;


        $petugas = Petugas::count();
        $sumpetugas = Petugas::sum('nilai');
        $nilaipetugas = $sumpetugas / $petugas;



        return view('frontend.pricing')->with([
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'slider' => $slider,
            'tentang' => $tentang,
            'pelayanan' => $pelayanan,
            'user' => $staff,
            'hubungi' => $hubungi,
            'pasienharian' => $totalpasienharian,
            'pasienbulanan' => $totalpasienbulanan,
            'nilaikecepatanlayanan' => $nilaikecepatan_layanan,
            'nilaikualitas' => $nilaikua,
            'nilairespon' => $nilairespon,
            'nilaipetugas' => $nilaipetugas,
        ]);
    }
    public function frontblog()
    {
        $datasetting = Setting::first();
        $slider = Slider::all();
        $tentang = Tentang::all();
        $pelayanan = Kategoriperawatan::all();
        $staff = User::where('level', 3)->get();
        $hubungi = Hubungi::all();
        $blog = Blog::orderBy('created_at', 'desc')->get();
        $kategoriblog = Kategoriblog::all();
        $blogrecent = Blog::orderBy('blog.created_at', 'desc')

            ->limit(5)
            ->get();


        $totalpasienbulanan = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->count();
        $totalpasienharian = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->whereDay('created_at', Carbon\carbon::now()->day)->count();

        $totalratingkecepatanlayanan = Kecepatanlayanan::count();
        $sum = Kecepatanlayanan::sum('nilai');
        $nilaikecepatan_layanan = $sum / $totalratingkecepatanlayanan;

        $kualitas = Kualitaslayanan::count();
        $sumkualitas = Kualitaslayanan::sum('nilai');
        $nilaikua = $sumkualitas / $kualitas;

        $respon = Responlayanan::count();
        $sumrespon = Responlayanan::sum('nilai');
        $nilairespon = $sumrespon / $respon;


        $petugas = Petugas::count();
        $sumpetugas = Petugas::sum('nilai');
        $nilaipetugas = $sumpetugas / $petugas;


        return view('frontend.blog')->with([
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'slider' => $slider,
            'tentang' => $tentang,
            'pelayanan' => $pelayanan,
            'user' => $staff,
            'hubungi' => $hubungi,
            'blog' => $blog,
            'kategoriblog' => $kategoriblog,
            'blogrecent' => $blogrecent,
            'pasienharian' => $totalpasienharian,
            'pasienbulanan' => $totalpasienbulanan,
            'nilaikecepatanlayanan' => $nilaikecepatan_layanan,
            'nilaikualitas' => $nilaikua,
            'nilairespon' => $nilairespon,
            'nilaipetugas' => $nilaipetugas,
        ]);
    }
    public function frontblogdetail($id)
    {


        $datasetting = Setting::first();
        $slider = Slider::all();
        $tentang = Tentang::all();
        $pelayanan = Kategoriperawatan::all();
        $staff = User::where('level', 3)->get();
        $hubungi = Hubungi::all();
        $kategoriblog = Kategoriblog::all();
        $blog = Blog::orderBy('blog.created_at', 'desc')
            ->join('users', 'blog.iduser', '=', 'users.id')
            ->select('users.id', 'users.name', 'users.deskripsi as us', 'blog.*')
            ->where('blog.id', $id)
            ->get();
        $blogrecent = Blog::orderBy('blog.created_at', 'desc')
            ->join('users', 'blog.iduser', '=', 'users.id')
            ->select('users.id', 'users.name', 'users.deskripsi as us', 'blog.*')
            ->where('blog.id', $id)
            ->limit(5)
            ->get();


        $totalpasienbulanan = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->count();
        $totalpasienharian = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->whereDay('created_at', Carbon\carbon::now()->day)->count();

        $totalratingkecepatanlayanan = Kecepatanlayanan::count();
        $sum = Kecepatanlayanan::sum('nilai');
        $nilaikecepatan_layanan = $sum / $totalratingkecepatanlayanan;

        $kualitas = Kualitaslayanan::count();
        $sumkualitas = Kualitaslayanan::sum('nilai');
        $nilaikua = $sumkualitas / $kualitas;

        $respon = Responlayanan::count();
        $sumrespon = Responlayanan::sum('nilai');
        $nilairespon = $sumrespon / $respon;


        $petugas = Petugas::count();
        $sumpetugas = Petugas::sum('nilai');
        $nilaipetugas = $sumpetugas / $petugas;


        return view('frontend.blogdetailnya')->with([
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'slider' => $slider,
            'tentang' => $tentang,
            'pelayanan' => $pelayanan,
            'user' => $staff,
            'hubungi' => $hubungi,
            'blog' => $blog,
            'blogrecent' => $blogrecent,
            'kategoriblog' => $kategoriblog,
            'pasienharian' => $totalpasienharian,
            'pasienbulanan' => $totalpasienbulanan,
            'nilaikecepatanlayanan' => $nilaikecepatan_layanan,
            'nilaikualitas' => $nilaikua,
            'nilairespon' => $nilairespon,
            'nilaipetugas' => $nilaipetugas,
        ]);
    }

    public function frontcontack()
    {


        $datasetting = Setting::first();
        $slider = Slider::all();
        $tentang = Tentang::all();
        $pelayanan = Kategoriperawatan::all();
        $staff = User::where('level', 3)->get();
        $hubungi = Hubungi::all();
        $kategoriblog = Kategoriblog::all();
        $contack = Hubungi::all();

        $totalpasienbulanan = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->count();
        $totalpasienharian = Transaksi::whereYear('created_at', Carbon\carbon::now()->year)->whereMonth('created_at', Carbon\carbon::now()->month)->whereDay('created_at', Carbon\carbon::now()->day)->count();

        $totalratingkecepatanlayanan = Kecepatanlayanan::count();
        $sum = Kecepatanlayanan::sum('nilai');
        $nilaikecepatan_layanan = $sum / $totalratingkecepatanlayanan;

        $kualitas = Kualitaslayanan::count();
        $sumkualitas = Kualitaslayanan::sum('nilai');
        $nilaikua = $sumkualitas / $kualitas;

        $respon = Responlayanan::count();
        $sumrespon = Responlayanan::sum('nilai');
        $nilairespon = $sumrespon / $respon;


        $petugas = Petugas::count();
        $sumpetugas = Petugas::sum('nilai');
        $nilaipetugas = $sumpetugas / $petugas;


        return view('frontend.contack')->with([
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'slider' => $slider,
            'tentang' => $tentang,
            'pelayanan' => $pelayanan,
            'user' => $staff,
            'hubungi' => $hubungi,
            'contack' => $contack,
            'kategoriblog' => $kategoriblog,
            'pasienharian' => $totalpasienharian,
            'pasienbulanan' => $totalpasienbulanan,
            'nilaikecepatanlayanan' => $nilaikecepatan_layanan,
            'nilaikualitas' => $nilaikua,
            'nilairespon' => $nilairespon,
            'nilaipetugas' => $nilaipetugas,
        ]);
    }




    public function prosesLogin(Request $request)
    {



        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => "Username tidak boleh kosong",
                'password.required' => "Password tidak boleh kosong",
            ]
        );

        $kredensial = $request->only('username', 'password');
        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user) {
                return redirect()->intended('home');
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'Maaf Username atau password salah',
        ])->onlyInput('username');
    }



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
