<?php

namespace App\Http\Controllers\Blog;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('Blog.show', [
            'post' => $post

        ]);
    }

    public function category(Category $category)
    {
        $search = \request()->query('search');
        if ($search) {
            $posts = $category->posts()->where('title', 'LIKE', "%{$search}%")->simplePaginate(2);
        } else {
            $posts = $category->posts()->simplePaginate(2);
        }
        return view('blog.category', [
            'category' => $category,
            'posts' => $posts,
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function tag(Tag $tag)
    {

        $search = \request()->query('search');
        if ($search) {
            $posts = $tag->posts()->where('title', 'LIKE', "%{$search}%")->simplePaginate(2);
        } else {
            $posts = $tag->posts()->simplePaginate(2);
        }


        return view('blog.tag', [
            'tag' => $tag,
            'posts' => $posts,
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }
}
