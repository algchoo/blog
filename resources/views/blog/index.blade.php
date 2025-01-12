@extends('layouts.app')

@section('header')
<div class="blog-header">
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
<div class="blog-main">
    <ul>
        @foreach ($blogs as $blog)
            <li class="blog">
                <a class="blog-title" href="{{ route('blog.post', ['id' => $blog->id]) }}">{{ $blog->title }}</a>
                <span class="blog-description">{{ $blog->description }}</span>
            </li>
        @endforeach
    </ul>
</div>
@endsection
