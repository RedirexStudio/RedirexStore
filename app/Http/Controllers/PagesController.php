<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use App\Http\Requests\PageMetaRequest;
use App\Models\Pages;
use App\Models\Routing;
use App\Models\PageRelation;
use App\Models\PageTemplates;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller{

    /* DarkSide Controllers */
        public function add_page(){
            $templates = new PageTemplates();
            return view('layouts/admin/pages/add', ['page_templates' => $templates->all()]);
        }
        
        public function add_page_request(PageRequest $req){
            $new_page = new Pages();
            $new_routing = new Routing();
            
            $new_page->title = $req->input('page_title');
            $new_page->template_id = $req->input('page_template');
            $new_page->content = $req->input('page_content');
            $new_page->author = Auth::user()->name;
            
            $new_page->save();

            $new_routing->url = $req->input('page_url');
            $new_routing->post_id = $new_page->id;
            $new_routing->save();
            return redirect()->route('darkside-pages')->with('success', 'Страница добавлена!');
        }

        public function output_darkside_pages(){
            $relations = PageRelation::get()->pluck('page_id')->toArray();
            $pages = collect();

            foreach( Pages::with('route')->get()->whereNotIn('id',$relations) as $page){
                $page_collection = Pages::query()->with('cycles')->find($page->id);
                $pages->push((object)['page' => $page, 'childs' => ($page_collection ? $page_collection->children : false)]);
            }

            return view('layouts/admin/pages/pages', ['pages_data' => $pages]);
        }

        public function pages_output($id, Request $req){
            $pages = Pages::where('id', '!=', $id)->where('title', 'LIKE', '%'.$req->input('parent_page').'%')->get();
            
            return $pages;
        }

        public function edit_page($id){
            $relative = [];
            if( PageRelation::where('page_id', $id)->get()->first() ){
                $relative_id    = PageRelation::where('page_id', $id)->get()->first()->parent_id;
                $relative_title = Pages::find($relative_id)->title;
                $relative       = ['id' => $relative_id, 'title' => $relative_title ];
            }
            
            return view('layouts/admin/pages/edit', [
                                                        'page_data' => Pages::find($id), 
                                                        'routings'  => Routing::where('post_id', $id)->get()->firstOrFail(),
                                                        'relation'  => $relative
                                                    ]);
        }

        public function update_page($id, PageRequest $req){
            $page = Pages::find($id);
            $routing = new Routing();
            $relation = new PageRelation();
            $page->title = $req->input('page_title');
            $page->content = $req->input('page_content');
            $page->author = Auth::user()->name;

            $page->save();

            $current_rout = $routing->where('post_id',$id)->get()->first();
            $rout = $routing->find($current_rout->id);
            
            $rout->url = $req->input('page_url');
            $rout->post_id = $id;
            $rout->save();

            $relation->page_id = $id;
            $relation->parent_id = $req->input('relative_page');
            $relation->save();

            return redirect()->route('edit-page', $id)->with('success', 'Страница обновлена!');
        }

        public function delete_page($id){
            Pages::find($id)->delete();
            Routing::where('post_id',$id)->delete();
            return redirect()->route('darkside-pages')->with('success', 'Страница удалена!');
        }

    /* Front Controllers */
    public function front_pages($path){
        // $page_collection = Pages::with('route')->get();
        $post_id       = Routing::where('url', $path)->get()->first();
        
        if( $post_id ){
            $post          = Pages::find($post_id->post_id);
            $template_id   = Pages::find($post)->firstOrFail()->template_id;
            $template_path = PageTemplates::find($template_id)->path;

            if( $template_path )
                return view('layouts/front/redirex/' . $template_path, ['page_content' => Pages::find($post_id->post_id)]);
            else
                abort(404);
        } else {
            abort(404);
        }
    }


}


/*
*hints
// dd($req->input('page_title'));
// $validation = $req->validate([
//     'page_title' => 'required|min:5|max:50'
// ]);
// $pages = new Pages;
// $pages = Pages::all();
// dd($pages);
// $pages->orderBy('id', 'asc')->skip(1)->take(1)->get()
// $pages->where('title', '=, <>, <, >, <=, >=', 'something')->get()
*/