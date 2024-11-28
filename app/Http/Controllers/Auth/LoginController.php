<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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

    /**
     * Handle the authenticated user after login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // Check user role and redirect accordingly
        switch ($user->role) {
            case 'Admin':
                return redirect('/home')->with('success', 'Login berhasil sebagai Admin.');
            case 'Instructor':
                return redirect('/home')->with('success', 'Login berhasil ' . $user->name . '.');
            case 'Customer':
                return redirect('/')->with('success', 'Selamat Datang Di IdeaThings ' . $user->name . '.');
            default:
                Auth::logout();
                return redirect('/')->route('welcome')->with('error', 'Akses Ditolak.');
        }
    }
}
