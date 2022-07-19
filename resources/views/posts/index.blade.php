@extends('layouts.app')

@section('title', 'blog posts')

@section('content')
{{-- @if(count($blog_posts)) --}}

{{-- @each('blog_posts.partials.blog_post', $blog_posts, 'post') --}}

@forelse($posts as $key => $post)
@include('posts.partials.post', [])

@empty
NO POSTS FOUND
@endforelse 

@endsection