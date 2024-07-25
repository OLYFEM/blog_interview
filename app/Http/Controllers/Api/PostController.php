<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($blogId)
    {
        return Post::where('blog_id', $blogId)->get();
    }

    public function store(Request $request, $blogId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::create([
            'blog_id' => $blogId,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json($post, 201);
    }

    public function show(Post $post)
    {
        return $post->load(['likes', 'comments']);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);

        $post->update($request->all());
        return response()->json($post, 200);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }
}
