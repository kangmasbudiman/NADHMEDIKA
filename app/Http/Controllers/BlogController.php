<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;

use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
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

class BlogController extends Controller
{


    public function index()
    {
        $datauser = Auth::user();
        $countjob = Job::where('idUser', $datauser->id)->count();
        // "notif"=>$countjob,
        $datajob = Job::where('idUser', $datauser->id)->get();
        // "datajob"=>$datajob,
        $data = DB::table('blog')
            ->join('kategori_blog', 'kategori_blog.id', '=', 'blog.idkategori')
            ->select('kategori_blog.*', 'blog.*')
            ->orderBy('blog.created_at','desc')
            ->get();

        $datasetting = Setting::first();

        return view("blog.index")->with([

            "user" => Auth::user(),
            "blog" => $data,
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
        $datakategori = Kategoriblog::all();


        return view("blog.formAdd")->with([
            "user" => Auth::user(),
            "datauser" => $datauserr,
            "notif" => $countjob,
            "datajob" => $datajob,
            'namaaplikasi' => $datasetting->namaaplikasi,
            'target' => $datasetting->target,
            'datakategori' => $datakategori,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $validate = $request->validated();

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');

        } else {
            $path = '';
        }

        $blog = new Blog();

        $blog->idkategori = $request->idkategori;
        $blog->judul = $request->judul;
        $blog->deskripsi = $request->deskripsi;
        $blog->statustrending = $request->statustrending;
        $blog->penulis = $request->penulis;
        $blog->iduser = $request->iduser;
        $blog->thumbanil = $path;
        $blog->save();
        return redirect('blog')->with('msg', 'Tambah Blog Berhasil');

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog, $id)
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
        return view('blog.formEdit')->with([
            "user" => Auth::user(),
            "id" => $data->id,
            "idkategori" => $data->idkategori,
            "judul" => $data->judul,
            "deskripsi" => $data->deskripsi,
            "statustrending" => $data->statustrending,
            "penulis" => $data->penulis,
            "thumbanil" => $data->thumbanil,
            'namaaplikasi' => $datasetting->namaaplikasi,
            "notif" => $countjob,
            "datajob" => $datajob,
            "iduser" => $data->iduser,
            'datakategori' => $datakategori,


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
    public function update(UpdateBlogRequest $request, $id)
    {

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');
            $data = Blog::find($id);
            $data->idkategori = $request->idkategori;
            $data->judul = $request->judul;
            $data->deskripsi = $request->deskripsi;
            $data->statustrending = $request->statustrending;
            $data->penulis = $request->penulis;
            $data->thumbanil = $path;
            $data->iduser = $request->iduser;
            $data->Update();
            return redirect('blog')->with('msg', 'Update Data ' . $data->namaprofesi . ' Berhasil');
        } else {
            $data = Blog::find($id);
            $data->idkategori = $request->idkategori;
            $data->judul = $request->judul;
            $data->deskripsi = $request->deskripsi;
            $data->statustrending = $request->statustrending;
            $data->penulis = $request->penulis;
            $data->iduser = $request->iduser;
            $data->Update();
            return redirect('blog')->with('msg', 'Update Data ' . $data->namaprofesi . ' Berhasil');
        }


    }



    public function delete($id)
    {
        $data = Blog::find($id);
        $data->delete();
        return redirect('blog')->with('msg', 'Data Berhasil di hapus');
    }


}
