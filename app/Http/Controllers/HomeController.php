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
}
