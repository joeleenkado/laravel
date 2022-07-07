@extends('layouts.app')

@section('title', $blog_post['title'])

@section('content')
@if($blog_post['is_new'])
<div>a new blog post! using if</div>
@elseif(!$blog_post['is_new'])
<div>blog post is old! using elseif</div>
@endif

@unless($blog_post['is_new'])
<div>it is an old post using unless</div>
@endunless


<h1>{{ $blog_post['title'] }}</h1>
<p>{{ $blog_post['content'] }}</p>
@isset($blog_post['has_comments'])
<div>the post has some commnets using isset</div>
    
@endisset
    
{{-- @endunless --}}
@endsection