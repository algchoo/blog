@extends('layouts.app')

@section('header')
<div class="home-header">
    <nav>
        <ul>
            <li><a href="{{ route('blog.index') }}">Writings</a></li>
            <li><a href="{{ route('author') }}">Author</a></li>
            <li><a href="{{ route('resume') }}" target="_blank">Resume</a></li>
        </ul>
    </nav>
</div>
@endsection

@section('main')
<div class="home-main">
    <h1>dumpster.zip</h1>
    <p>a tech blog</p>
</div>
@endsection
