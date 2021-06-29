@extends('layouts.sticky-navbar', [
    'namePage' => 'post',
    'activePage' => 'post',
])
@section('title')
    <title>search</title>
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('js/share.js') }}"></script>
@section('content')
    @if($galadana->isNotEmpty())
        @foreach ($galadana as $post)
            <div class="post-list">
                <p>{{ $post->judul }}</p>
            </div>
        @endforeach
    @else 
        <div>
            <h2>No posts found</h2>
        </div>
    @endif
@endsection