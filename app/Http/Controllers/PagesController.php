<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use App\Models\Pages;

class PagesController extends Controller{
    
    public function add_page(PageRequest $req){
        // dd($req->input('page_title'));
        // $validation = $req->validate([
        //     'page_title' => 'required|min:5|max:50'
        // ]);

        $new_page = new Pages();
        $new_page->title = $req->input('page_title');
        $new_page->content = $req->input('page_content');

        $new_page->save();

        return redirect()->route('darkside-pages')->with('success', 'Страница добавлена!');
    }

    public function output_pages(){
        // $pages = new Pages;
        // $pages = Pages::all();
        // dd($pages);
        // $pages->orderBy('id', 'asc')->skip(1)->take(1)->get()
        // $pages->where('title', '=, <>, <, >, <=, >=', 'something')->get()
        if( count(Pages::all()) > 0 )
            return view('admin/pages/pages', ['pages_data' => Pages::all()]);
        else
            return view('admin/pages/pages', ['pages_data' => false]);
    }

}
