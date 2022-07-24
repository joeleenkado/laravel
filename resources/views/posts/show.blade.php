@extends('layouts.app')

@section('title', $post->title)

@section('content')
{{-- @if($post['is_new'])
<div>a new blog post! using if</div>
@elseif(!$post['is_new'])
<div>blog post is old! using elseif</div>
@endif

@unless($post['is_new'])
<div>it is an old post using unless</div>
@endunless --}}


<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>
<p>Added {{$post->created_at->diffForHumans() }}</p>

@if (now()->diffInMinutes($post->created_at) < 5)
<div class='alert alert-info'>*NEW*</div>
    
@endif
{{-- @isset($post['has_comments'])
<div>the post has some commnets using isset</div>
    
@endisset --}}
    
{{-- @endunless --}}
@endsection