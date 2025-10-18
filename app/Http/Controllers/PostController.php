<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // ensure authentication required for create/store/edit/update/destroy
        $this->middleware('auth')->except(['index','show']);
        // If you prefer automatic policy mapping use authorizeResource (older versions)
        // $this->authorizeResource(Post::class, 'post');
    }

    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'body'=>'required|string',
        ]);

        $post = auth()->user()->posts()->create($data);

        return redirect()->route('posts.show', $post)->with('success','Post created.');
    }

    public function show(Post $post)
    {
        $post->load('comments.user');
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post); // check policy
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $data = $request->validate([
            'title'=>'required|string|max:255',
            'body'=>'required|string',
        ]);

        $post->update($data);

        return redirect()->route('posts.show', $post)->with('success','Post updated.');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post deleted.');
    }
}
