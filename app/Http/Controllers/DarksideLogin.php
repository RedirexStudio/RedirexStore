<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DarksideLogin extends Controller{

    public function darkside_login(){
        if( !Auth::check() )
            return view('admin/pages/login');
        else
            abort(404);
    }

}
