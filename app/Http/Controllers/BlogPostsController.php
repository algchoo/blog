<?php

namespace App\Http\Controllers;

use App\Models\BlogPosts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Markdown;

class BlogPostsController extends Controller
{
    public function index()
    {
        $blogs = BlogPosts::all();
        return view('blog.index', compact('blogs'));
    }  

    public function blogPost(int $id)
    {
        $blog = BlogPosts::findOrFail($id);
        $html = Markdown::convertToHTML($blog->markdown);
        return view('blog.post', ['blog' => $blog, 'html' => $html])
    }
}