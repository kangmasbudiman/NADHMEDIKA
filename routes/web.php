<?php

use App\Http\Controllers\JobController;
use App\Models\Tentang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskdetailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfesiController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\KategoriperawatanController;
use App\Http\Controllers\KategoriblogController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\HubungiController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\MyhomecareController;

use App\Models\Client;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('login',[LoginController::class,'index'])->name('login');


Route::get("/",[FrontendController::class,'index']);
Route::post("/perawatcari",[FrontendController::class,'perawatcari']);
Route::get("/about",[FrontendController::class,'about']);
Route::get("/service",[FrontendController::class,'service']);
Route::get("/pricing",[FrontendController::class,'pricing']);
Route::get("/frontblog",[FrontendController::class,'frontblog']);
Route::get("/frontcontack",[FrontendController::class,'frontcontack']);
Route::get("/frontlowongan",[FrontendController::class,'frontlowongan']);
Route::post("/getkabupaten",[FrontendController::class,'getkabupaten']);
Route::post("/getkecamatan",[FrontendController::class,'getkecamatan']);
Route::post("/getdesa",[FrontendController::class,'getdesa']);
Route::post("/inputlowongan",[FrontendController::class,'inputlowongan']);
Route::get("/frontsyarat",[FrontendController::class,'frontsyarat']);


Route::get("/team",[FrontendController::class,'team']);
Route::get("/frontblogdetail/{id}",[FrontendController::class,'frontblogdetail']);
Route::get("/detailperawat/{id}",[FrontendController::class,'detailperawat']);
Route::post("/inputkunjungan",[FrontendController::class,'inputkunjungan']);
Route::post("/inputkunjungan_aksi",[FrontendController::class,'inputkunjungan_aksi']);
Route::get("/pesan",[FrontendController::class,'pesan']);



Route::get("/login",[LayoutController::class,'index'])->middleware('auth');
Route::get("/home",[LayoutController::class,'index'])->middleware('auth');


Route::controller(LoginController::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::get('register','register')->name('register');
    Route::post('login/prosesLogin','prosesLogin');
    Route::post('login/prosesRegister','prosesRegister');
    Route::get('logout','logout');

});



Route::controller(UserController::class)->group(function(){
    Route::get('user','index')->name('user');
    Route::post('user/prosesSimpan','prosesSimpan');
    Route::get('user/add','create');
    Route::get('user/profil','profil');
    Route::post('user/updateprofil','updateprofil');
    Route::post('user/updatepassword','updatepassword');
    Route::get('user/listjob/{id}','listjob');
    Route::get('user/lamaranperawat','lamaranperawat');
    Route::get('user/detaillamaran/{id}','detaillamaranperawat');
    Route::post('user/updateanggota','updateanggota');
});

Route::controller(ClientController::class)->group(function(){
    Route::get('client','index')->name('client');
    Route::post('client/prosesSimpan','prosesSimpan');
    Route::get('client/add','create');
    Route::get('client/profil','profil');
    Route::post('client/updateprofil','updateprofil');
    Route::post('client/updatepassword','updatepassword');
    
});

Route::controller(SettingController::class)->group(function(){
    Route::get('setting','index')->name('setting');
    Route::get('setting/{id}','edit');
    Route::post('settingupdate/','update');
   
});




Route::controller(TentangController::class)->group(function(){
    Route::get('tentang','index')->name('tentang');
    Route::get('tentang/add','create');
    Route::get('tentang/{id}','show');
    Route::get('tentang/delete/{id}','delete');
});


Route::controller(TransaksiController::class)->group(function(){
    Route::get('transaksi','index')->name('transaksi');
    Route::get('transaksi/add','create');
    Route::get('transaksi/{id}','show');
    Route::post('transaksi/requestselesai','updateselesai');
    Route::get('transaksi/delete/{id}','delete');
});



Route::controller(LaporanController::class)->group(function(){
    Route::get('laporanuser','index')->name('laporanuser');
    Route::post('laporanuser/aksi','laporanuseraksi');
    Route::post('laporanpendapatanuser/aksi','laporanpendapatan');
    Route::post('laporanjoblist/aksi','laporanjoblistaksi');
    Route::get('laporanjoblist','laporanjoblist');
    Route::get('testtest','testtest');
    Route::get('laporanpendapatanuser','pendapatanuser');


});

Route::controller(JobController::class)->group(function(){
    Route::get('job','index')->name('job');
    Route::get('job/add','create');
    Route::get('job/{idjob}','show');
    Route::get('job/detail/{idjob}','jobdetail');
    Route::get('job/detailview/{idjob}','jobdetailview');
    Route::get('job/detailedit/{id}','jobdetailedit');
    Route::post('job/deletedetail/{id}','detaildelete');
    Route::post('job/addjobdetail','addjobdetail');
    Route::post('job/updatejobdetail','updatejobdetail');
    Route::get('job/timelineview/{idjob}','timeline');
    Route::post('user/prosesSimpan','prosesSimpan');
    Route::get('job/requestapprove/{idjob}','requestapprove');
    Route::get('job/autocompleteSearch','autocompleteSearch');
});
Route::controller(ProfesiController::class)->group(function(){
    Route::get('profesi','index')->name('profesi');
    Route::get('profesi/add','create');
    Route::get('profesi/{id}','show');
    Route::get('profesi/delete/{id}','delete');
    
});

Route::controller(PendidikanController::class)->group(function(){
    Route::get('pendidikan','index')->name('pendidikan');
    Route::get('pendidikan/add','create');
    Route::get('pendidikan/{id}','show');
    Route::get('pendidikan/delete/{id}','delete');
    
});


Route::controller(KategoriblogController::class)->group(function(){
    Route::get('kategoriblog','index')->name('kategoriblog');
    Route::get('kategoriblog/add','create');
    Route::get('kategoriblog/{id}','show');
    Route::get('kategoriblog/delete/{id}','delete');
    
});

Route::controller(KategoriperawatanController::class)->group(function(){
    Route::get('kategoriperawatan','index')->name('kategoriperawatan');
    Route::get('kategoriperawatan/add','create');
    Route::get('kategoriperawatan/{id}','show');
    Route::get('kategoriperawatan/delete/{id}','delete');
});

Route::controller(BlogController::class)->group(function(){
    Route::get('blog','index')->name('blog');
    Route::get('blog/add','create');
    Route::get('blog/{id}','show');
    Route::get('blog/delete/{id}','delete');
});

Route::controller(SliderController::class)->group(function(){
    Route::get('slider','index')->name('slider');
    Route::get('slider/add','create');
    Route::get('slider/{id}','show');
    Route::get('slider/delete/{id}','delete');
});

Route::controller(LowonganController::class)->group(function(){
    Route::get('lowongan','index')->name('lowongan');
    Route::get('lowongan/add','create');
    Route::get('lowongan/{id}','show');
    Route::get('lowongan/delete/{id}','delete');
});

Route::controller(HubungiController::class)->group(function(){
    Route::get('hubungi','index')->name('hubungi');
    Route::get('hubungi/add','create');
    Route::get('hubungi/{id}','show');
    Route::get('hubungi/delete/{id}','delete');
});


Route::controller(TaskController::class)->group(function(){
    Route::get('task','index')->name('task');
    Route::get('task/add','create');
    Route::get('task/{idjob}','show');
    Route::get('task/updateselesai/{idjob}','updateselesai');
    Route::get('task/detail/{idjob}','taskdetail');
    Route::get('task/detailview/{idjob}','taskdetailview');
    Route::get('task/detailedit/{id}','taskdetailedit');
    Route::post('task/deletedetail/{id}','detaildelete');
    Route::post('task/addjobdetail','addjobdetail');
    Route::post('task/updatejobdetail','updatejobdetail');
    Route::post('task/prosesSimpan','prosesSimpan');
    Route::get('task/timelineview/{idjob}','timeline');
    Route::get('task/requestapprove/{idjob}','requestapprove');
   

});

Route::controller(PelayananController::class)->group(function(){
    Route::get('pelayanan','index')->name('pelayanan');
    Route::post('pelayanan/perawatcari','perawatcari');
    Route::post('pelayanan/inputkunjungan','inputkunjungan');
    Route::post('settingupdate/','update');
   
});


Route::controller(MyhomecareController::class)->group(function(){
    Route::get('myhomecare','index')->name('myhomecare');
    Route::POST('myhomecare/ulasan','ulasan')->name('ulasan');
    Route::post('myhomecare/requestselesai','updateselesai');
    Route::post('pelayanan/perawatcari','perawatcari');
    Route::post('myhomecare/inputkunjungan','inputkunjungan');
    Route::post('settingupdate/','update');

   
});



//membatasi akses
Route::group(['middleware'=>['auth']],function(){
    Route::group(['middleware'=>['cekUserLogin:1']],function(){
        Route::resource('beranda',BerandaController::class);
        Route::resource('user',UserController::class);
        Route::resource('job',JobController::class);
        Route::resource('laporanuser',LaporanController::class);
        Route::resource('setting',SettingController::class);
        Route::resource('client',ClientController::class);
        Route::resource('profesi',ProfesiController::class);
        Route::resource('pendidikan',PendidikanController::class);
        Route::resource('kategoriperawatan',KategoriperawatanController::class);
        Route::resource('kategoriblog',KategoriblogController::class);
        Route::resource('blog',BlogController::class);
        Route::resource('lowongan',LowonganController::class);
        Route::resource('hubungi',HubungiController::class);
        Route::resource('slider',SliderController::class);
        Route::resource('tentang',TentangController::class);

    });


    Route::group(['middleware'=>['cekUserLogin:2']],function(){
        Route::resource('staff',StaffController::class);
        Route::resource('task',TaskController::class);
        Route::resource('client',ClientController::class);
        Route::resource('pelayanan',PelayananController::class);

    });



});



