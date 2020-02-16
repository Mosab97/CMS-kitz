<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

            $search = \request()->query('search');

            if($search){
                $posts = Post::where('title','LIKE',"%{$search}%")->simplePaginate(3);
            }else{
                $posts = Post::simplePaginate(3);

            }
        return view('welcome',[
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'posts' => $posts
        ]);
    }
}
