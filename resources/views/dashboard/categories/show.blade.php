@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Category: {{ $category->name }}</h1>
        <a href="/dashboard-categories" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Back</a>
    </div>

    @if ($posts->count())
        <div class="card mb-4 border-0 shadow-sm overflow-hidden custom-glass-card">
            @if ($posts[0]->image)
                <div style="max-height:400px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" class="img-fluid w-100" alt="{{ $posts[0]->category->name }}">
                </div>
            @else
                <img src="https://picsum.photos/1200/400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
            @endif

            <div class="card-body text-center p-4">
                <h3 class="card-title">{{ $posts[0]->title }}</h3>
                <p>
                    <small class="text-muted">
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ Str::limit(strip_tags($posts[0]->body), 200) }}</p>
                <a href="/dashboard-posts/{{ $posts[0]->slug }}" class="btn btn-primary btn-sm">Read More</a>
            </div>
        </div>

        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm custom-glass-card">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="https://picsum.photos/500/400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                            <p class="card-text">{{ Str::limit(strip_tags($post->body), 100) }}</p>
                            <a href="/dashboard-posts/{{ $post->slug }}" class="btn btn-primary btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center p-5 custom-glass-card rounded-4">
            <p class="fs-4 text-muted">No posts found in this category for you.</p>
        </div>
    @endif
@endsection