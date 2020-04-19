<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index($id){

        try{
            $post=Post::findOrFail($id);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            // return view('404');
            abort(404,'Page not found');
        }
        return view('post')->with('post',$post);
    }
}
