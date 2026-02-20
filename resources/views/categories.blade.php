@extends('layouts.main')

@section('container')
    <div class="container categories-section">
        <h1 class="categories-heading mb-5">Post Categories</h1>
        <div class="row g-4">
            @foreach ($categories as $category)
                <div class="col-lg-4 col-md-6">
                    <a href="/posts?category={{ $category->slug }}" class="text-decoration-none">
                        <div class="category-card-v2">
                            @if ($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                            @else
                                <img src="https://picsum.photos/600/400?{{ $category->name }}" alt="{{ $category->name }}">
                            @endif
                            <div class="category-strip">
                                {{ $category->name }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
