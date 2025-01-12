@extends('layouts.app')

@section('header')
<div class="home-header">
    <h1>dumpster.zip</h1>
    <p>a tech blog</p>
</div>
@endsection

@section('main')
<div class="home-nav">
    <nav>
        <ul>
            <li><a href="{{ route('blog.index') }}">Writings</a></li>
            <li><a href="{{ route('author') }}">Author</a></li>
            <li><a href="#">Resume</a></li>
        </ul>
    </nav>
</div>
@endsection
