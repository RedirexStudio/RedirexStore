<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DarksideController extends Controller{

    public function darkside(){
        return view('layouts/admin/home');
    }

}
