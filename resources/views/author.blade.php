@extends('layouts.app')

@section('header')
<div class="author-header">
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('blog.index') }}">Writings</a></li>
        </ul>
    </nav>
</div>
@endsection

@section('main')
<div class="author-main">
    <p>
    I’m Austin Georgiades, a software engineer with a passion for infrastructure and automation. I enjoy video games, cats, camping when it’s shit out, as well as, a variety of other activities.

    This blog is meant for me to write and share my learning/experience with others around a variety of technologies and tools. There will be a focus in the DevOps/SRE skill-set.

    I hope everyone who reads this has a pretty good day, best wishes to you all.
    </p>
</div>
@endsection
