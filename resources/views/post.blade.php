@extends('layouts.main')

@push('styles-post')
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endpush

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="single-post col-md-8">
                <h1 class="mb-3"> {{ $post->title }} </h1>
                <p class="post-meta">
                    By
                    <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                    in
                    <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                </p>

                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid " alt="{{ $post->category->name }}">
                @else
                    <img src="https://picsum.photos/500/400?{{ $post->category->name }}" class="card-img-top"
                        alt="{{ $post->category->name }}">
                @endif

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                <a href="/posts" class="back-posts">← Back to Posts</a>
            </div>
        </div>
    </div>
@endsection
