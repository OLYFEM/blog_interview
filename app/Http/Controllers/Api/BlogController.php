<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return Blog::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $blog = Blog::create($request->all());
        return response()->json($blog, 201);
    }

    public function show(Blog $blog)
    {
        return $blog->load('posts');
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
        ]);

        $blog->update($request->all());
        return response()->json($blog, 200);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json(null, 204);
    }
}
