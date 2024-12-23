@extends('layouts.app')

@section('header')
<h1>dumpster.zip</h1>
<p>a tech blog</p>
@endsection

@section('main')
<nav class="home-nav">
    <ul>
        <li><a href="{{ route('blog.index') }}">Writings</a></li>
        <li><a href="{{ route('author') }}">Author</a></li>
        <li><a href="#">Resume</a></li>
    </ul>
</nav>
@endsection
