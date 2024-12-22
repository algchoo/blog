@extends('layouts.app')

@section('header')
<h1>{{ $blog->title }}</h1>
<h2>{{ $blog->description }}</h2>
<h3>Austin Georgiades</h3>
<h4>{{ $blog->created_at->format('Y-m-d') }}</h4>
@endsection

@section('main')
{!! $html !!}
@endsection
