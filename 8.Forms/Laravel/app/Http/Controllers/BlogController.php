<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Http\Requests\BlogFilterRequest;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    public function create(){
        return view('blog.create');
    }
    
    public function store(CreatePostRequest $request){
        $post = Posts::create($request->validated());
        return redirect()->route('blog.show', ['slug'=>$post->slug, 'post' => $post->id])->with('success', 'article a bien été sauvegardé  ');
    }
    
    public function index(BlogFilterRequest $request): View
    {
        $post = new Posts();
        return view('blog.index', [
            'posts' => $post::paginate(1),
        ]);
    }

    public function show(string $slug, Posts $post): RedirectResponse | View
    {
        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return view('blog.show', [
            'post' => $post
        ]);
    }
}
