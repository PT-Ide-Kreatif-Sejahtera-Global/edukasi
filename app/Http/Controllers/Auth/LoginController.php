<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function authenticated(Request $request, $user){
        if($user -> role == 'Admin' ){
            return redirect('/home')->with('success','Login berhasil sebagai Admin.');
        } else if($user -> role == 'Instructor' ){
            return redirect('/home')->with('success','Login berhasil '. $user->name . '.');
        } else if($user -> role == 'Customer' ){
            return redirect('/')->with('success','Selamat Datang Di IdeaThings '. $user->name . '.');
        }
        
        // else if($user -> level == 2 && $user->status == "Tidak Aktif"){
        //     // Auth::logout();
        //     $request->session()->flush();
        //     // Session::flush();
        //     return redirect('/')->with('error','Akses Ditolak, hubungi Superuser Admin.');
        // }
    // else{
    //     Auth::logout();
    //     return redirect('/')->route('welcome')->with('error','Anda telah keluar.');
    // }
    }
}
