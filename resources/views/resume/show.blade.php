@extends('layouts.app')

@section('content')
<iframe src="{{ asset('/ageorgiades-resume-2024.pdf') }}" width="100%" height="600px" style="border: none;"></iframe>
<div class="container">
    <form action="{{ route('resume.rateResume') }}" method="POST">
        @csrf
        <div class="rating-container">
            <star-rating></star-rating>
            <button type="submit">Submit Rating</button>
        </div>
    </form>
</div>
@endsection
