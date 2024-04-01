<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Carbon;
class LoginController extends Controller
{

    public function register(){


        $datasetting=Setting::first();
        //  'namaaplikasi'=>$datasetting->namaaplikasi,
        //'target'=>$datasetting->target,
      
        if (Auth::user()){
      
          return redirect()->intended("home");

        }


        return view('login.view_register')->with([
            'namaaplikasi'=>$datasetting->namaaplikasi,
            'target'=>$datasetting->target,
        ]);

    }

    public function prosesRegister(Request $request){
        
        $cek=User::where('ktp',$request->ktp)->first();
        if($cek){
            return redirect('register')->with('msg', 'No KTP Sudah Pernah Didaftarkan');
        }else{

            $cekemail=User::where('email',$request->email)->first();
            if($cekemail){
                return redirect('register')->with('msg', 'Email Sudah Pernah Didaftarkan');
            }else{

        $dataidterakhir=User::orderby('no_member','desc')->first();
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
       $request->validate([
            'username'=>'required',
            'password'=>'required',
            'nama'=>'required',
            'nowa'=>'required',
            'alamat'=>'required',
            'gender'=>'required',
            'ktp'=>'required',
        ],
        [
            'username.required'=>"Username tidak boleh kosong",  
            'password.required'=>"Password tidak boleh kosong",
            'nama.required'=>"Nama tidak boleh kosong",
            'nowa.required'=>"No WA/HP tidak boleh kosong",
            'alamat.required'=>"Alamat tidak boleh kosong",
            'gender.required'=>"Jenis Kelamin tidak boleh kosong",
            'email.required'=>"Email tidak boleh kosong",
            'ktp.required'=>"No KTP tidak boleh kosong",
        ]);

        $data=new User();
        $data->name=$request->nama;
        $data->nowa=$request->nowa;
        $data->gender=$request->gender;
        $data->alamat=$request->alamat;
        $data->username=$request->username;
        $data->password=bcrypt($request->password);
        $data->email=$request->email;
        $data->no_member=$auto_number;
        $data->ktp=$request->ktp;
        $data->level="2";
        $data->save();
        return redirect('login')->with('msg', 'Selamat anda telah berhasil terdaftar sebagai member di NADHMEDIKA HomeCare silahkan pilih layanan yang anda inginkan.!)');
       
            }


          
        }
       









       
        
      //  return back()->withErrors([
      //      'username'=>'Maaf Username atau password salah',
      //  ])->onlyInput('username');
    }

        public function index(){


            $datasetting=Setting::first();
            //  'namaaplikasi'=>$datasetting->namaaplikasi,
            //'target'=>$datasetting->target,
          
            if (Auth::user()){
          
              return redirect()->intended("home");

            }


            return view('login.view_login')->with([
                'namaaplikasi'=>$datasetting->namaaplikasi,
                'target'=>$datasetting->target,
            ]);

        }

        public function prosesLogin(Request $request){
        

           
            $request->validate([
                'username'=>'required',
                'password'=>'required',
            ],
            [
                'username.required'=>"Username tidak boleh kosong",  
                'password.required'=>"Password tidak boleh kosong",
            ]);

            $kredensial=$request->only('username','password');
            if(Auth::attempt($kredensial)){
                $request->session()->regenerate();
                $user=Auth::user();

                if($user){
                    return redirect()->intended('home'); 
                }
                return redirect()->intended('/home');
            }
            
            return back()->withErrors([
                'username'=>'Maaf Username atau password salah',
            ])->onlyInput('username');
        }



        public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}

}
