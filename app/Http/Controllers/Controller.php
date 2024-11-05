<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function welcome()
    {
        // Fetch all teachers from the database
        $teachers = DB::table('instructors')
        ->join('users', 'instructors.user_id', '=', 'users.id')
        ->select('instructors.bio', 'users.name', 'users.foto')
        ->get();
        
        // Return the welcome view with the teachers data
        return view('welcome', compact('teachers')); // Assuming your welcome view is named 'welcome.blade.php'
    }
}
