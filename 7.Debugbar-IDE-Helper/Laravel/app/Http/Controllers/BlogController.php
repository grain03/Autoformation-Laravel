<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Http\Requests\BlogFilterRequest;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    public function index(BlogFilterRequest $request): View
    {
        $post = new Posts();
        return view('blog.index', [
            'posts' => $post::paginate(1),
        ]);
    }

    public function show(string $slug, Posts $post): RedirectResponse | View
    {

        $post = Posts::findOrFail($post);
        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return view('blog.show', [
            'post' => $post
        ]);
    }
}
