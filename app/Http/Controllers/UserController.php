<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'pembeli' => DB::table('users')
                ->get(),
        );
        return view('admin.user.index', $data);
    }
}
