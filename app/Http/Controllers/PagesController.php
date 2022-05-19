<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;

class PagesController extends Controller{
    
    public function add_page(PageRequest $req){
        // dd($req->input('page_title'));
        // $validation = $req->validate([
        //     'page_title' => 'required|min:5|max:50'
        // ]);
    }

}
