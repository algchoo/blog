<?php

namespace App\Http\Controllers;

use App\Models\BlogPosts;
use Illuminate\Http\Request;
use Parsedown;

class BlogPostsController extends Controller
{
    public function index()
    {
        $blogs = BlogPosts::all();
        return view('blog.index', compact('blogs'));
    }

    public function blogPost(int $id)
    {
        $pd = new Parsedown();
        $blog = BlogPosts::findOrFail($id);
        $html = $pd->text($blog->markdown);
        return view('blog.post', ['blog' => $blog, 'html' => $html]);
    }
}
