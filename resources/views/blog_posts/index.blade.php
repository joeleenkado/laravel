@extends('layouts.app')

@section('title', 'blog posts')

@section('content')
{{-- @if(count($blog_posts)) --}}

{{-- @each('blog_posts.partials.blog_post', $blog_posts, 'post') --}}

@forelse($blog_posts as $key => $blog_post)
@include('blog_posts.partials.blog_post', [])

@empty
NO POSTS FOUND
@endforelse 

@endsection