<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {

        $posts = Posts::with('tags','categories')->get();
        $tags = Tag::all();
        $categories = Category::all();
        return view('index', compact('posts','categories', 'tags'));
    }
}
