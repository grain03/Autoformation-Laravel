<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Http\Requests\BlogFilterRequest;
use App\Http\Requests\FormPostRequest;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    public function create(){
        $post = new Posts();
        $post->title = 'Bonjoure';
 
        return view('blog.create', [
            'post' => $post
        ]);
    }
    
    public function store(FormPostRequest $request){
        $post = Posts::create($request->validated());
        return redirect()->route('blog.show', ['slug'=>$post->slug, 'post' => $post->id])->with('success', 'article a bien été sauvegardé  ');
    }
    
    public function edit(Posts $post){
        return view('blog.edit', [
            'post'=> $post
        ]);
    }
    public function update(Posts $post,FormPostRequest $request){
        $post->update($request->validated());
        return redirect()->route('blog.show', ['slug'=>$post->slug, 'post' => $post->id])->with('success', 'article a bien été modifié  ');
    }
    public function index(): View
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
