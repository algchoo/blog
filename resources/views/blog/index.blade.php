@extends('layouts.app')

@section('header')
<nav class="author-nav">
    <a href="{{ route('home') }}">Home</a>
</nav>
@endsection

@section('main')
<div class="container">
    <ul class="article-list">
        @foreach ($blogs as $blog)
            <li class="article">
                <a class="article-title" href="{{ route('blog.show', ['id' => $article->id]) }}">{{ $blog->title }}</a>
                <span class="article-description">{{ $blog->description }}</span>
            </li>
        @endforeach
    </ul>
</div>
@endsection