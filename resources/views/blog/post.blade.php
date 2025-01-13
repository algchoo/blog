@extends('layouts.app')

@section('header')
<div class="blog-post-header">
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('blog.index') }}">Writings</a></li>
            <li><a href="{{ route('author') }}">Author</a></li>
            <li><a href="{{ route('resume') }}" target="_blank">Resume</a></li>
        </ul>
    </nav>
</div>
@endsection

@section('main')
<div class="blog-post-main">
    <h1>{{ $blog->title }}</h1>
    <h2>{{ $blog->description }}</h2>
    <h3>Austin Georgiades</h3>
    <h4>{{ $blog->created_at->format('Y-m-d') }}</h4>

    {!! $html !!}
</div>
@endsection
