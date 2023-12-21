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
        dd($request->all());

        return view('blog.index', [
            'posts' => Posts::paginate(1),
        ]);
    }

    public function show(string $slug, string $id): RedirectResponse | View
    {
        $post = new Posts();
        $post = $post::findOrFail($id);
        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return view('blog.show', [
            'post' => $post,
        ]);
    }
}
