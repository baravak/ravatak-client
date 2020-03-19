<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $this->data->posts = Post::apiIndex($request->all(['order', 'sort', 'status']));
        return $this->view($request, 'dashboard.posts.index');
    }

    public function create(Request $request)
    {
        return $this->view($request, 'dashboard.posts.create');
    }

    public function store(Request $request)
    {
        return Post::apiStore($request->except('_method'))->response()->json([
            'redirect' => route('dashboard.posts.create')
        ]);
    }

    public function edit(Request $request, Post $post)
    {
        return $this->view($request, 'dashboard.posts.create', ['post' => $post]);
    }

    public function update(Request $request, $post)
    {
        return Post::apiUpdate($post, $request->except('_method'))->response()->json(['redirect' => route('dashboard.posts.edit', ['post' => $post])]);
    }

    public function show(Request $request, Post $post)
    {
        return $this->view($request, 'dashboard.posts.show', ['post' => $post]);
    }
}
