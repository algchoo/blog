@extends('layouts.app')

@section('header')
<div class="blog-header">
    <nav>
        <a href="{{ route('home') }}">Home</a>
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
