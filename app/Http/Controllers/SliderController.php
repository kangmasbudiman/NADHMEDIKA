<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSliderRequest;

use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use App\Models\Job;
use App\Models\Kategoriblog;
use App\Models\Jobdetail;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use Carbon;
use Illuminate\Http\Request;

class SliderController extends Controller
{


    public function index()
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,
        $data = DB::table('slider')
            ->get();

        $datasetting = Setting::first();

        return view("slider.index")->with([

            "user" => Auth::user(),
            "slider" => $data,
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
      


        return view("slider.formAdd")->with([
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
    public function store(StoreSliderRequest $request)
    {
        $validate = $request->validated();

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');

        } else {
            $path = '';
        }

        $blog = new Slider();

      
        $blog->judul = $request->judul;
        $blog->deskripsi = $request->deskripsi;
       
        $blog->foto = $path;
        $blog->save();
        return redirect('slider')->with('msg', 'Tambah Slider Berhasil');

    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $blog, $id)
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $data = $blog->find($id);
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,
        $datasetting = Setting::first();


        $datauserr = User::all();
        $datakategori = Kategoriblog::all();
        return view('slider.formEdit')->with([
            "user" => Auth::user(),
            "id" => $data->id,
           
            "judul" => $data->judul,
            "deskripsi" => $data->deskripsi,
           
            "foto" => $data->foto,
            'namaaplikasi' => $datasetting->namaaplikasi,
            "notif" => $countjob,
            "datajob" => $datajob,
            'datakategori' => $datakategori,


        ]);


    }

    public function update(UpdateSliderRequest $request, $id)
    {

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');
            $data = Slider::find($id);
         
            $data->judul = $request->judul;
            $data->deskripsi = $request->deskripsi;
          
            $data->foto = $path;
            $data->Update();
            return redirect('slider')->with('msg', 'Update Data ' . $data->judul . ' Berhasil');
        } else {
            $data = Slider::find($id);
           
            $data->judul = $request->judul;
            $data->deskripsi = $request->deskripsi;
                    $data->Update();
            return redirect('blog')->with('msg', 'Update Data ' . $data->judul . ' Berhasil');
        }


    }



    public function delete($id)
    {
        $data = Slider::find($id);
        $data->delete();
        return redirect('slider')->with('msg', 'Data Berhasil di hapus');
    }


}
