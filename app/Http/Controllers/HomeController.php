<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class HomeController extends Controller
{
    public function index(){
        $posts = Post::paginate(2);
        return view('pages.index',['posts' =>$posts]);
    }
    public function show($slug){
        // $posts = Post::paginate(2);
        // return view('pages.index',['posts' =>$posts]);
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('pages.show', compact('post'));
    }
}