@extends('layouts.main')

@section('container')
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400&display=swap"
        rel="stylesheet">

    <header class="hero">
        <div class="hero-content">
            <h1>Explore Posts</h1>
            <p class="subtitle">ENJOY THE LIVE</p>
            <p class="description">Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae
                pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna
                tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia
                integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia
                nostra inceptos himenaeos.</p>
            <a href="#" class="btn-outline">OUR OFFERS</a>
        </div>
    </header>

    <section class="categories">
        <h2>EXPLORE POSTS</h2>
        <div class="grid-container">
            @foreach ($categories as $category)
                <div class="card">
                    <div class="category-badge">
                        <a href="/posts?category={{ $category->slug }}" class="text-white text-decoration-none">
                            {{ $category->name }}
                        </a>
                    </div>

                    @if ($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                    @else
                        <img src="https://picsum.photos/500/400?{{ $category->name }}" alt="{{ $category->name }}">
                    @endif

                    <div class="card-content">
                        <h3>{{ $category->name }}</h3>
                        <p class="text-white-50 small">Explore various posts about {{ $category->name }}</p>
                        <a href="/posts?category={{ $category->slug }}" class="btn-small">
                            EXPLORE {{ strtoupper($category->name) }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="categories py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">MEET OUR AUTHORS</h2>
            <div class="row justify-content-center">
                @foreach ($authors as $author)
                    <div class="col-md-4 mb-4">
                        <div class="card author-card h-100 border-0 shadow-sm overflow-hidden">
                            <div class="category-badge">
                                <a href="/posts?author={{ $author->username }}">
                                    Writer
                                </a>
                            </div>

                            <img src="https://i.pravatar.cc/400?u={{ $author->username }}" class="card-img-top"
                                alt="{{ $author->name }}" style="height: 400px; object-fit: cover;">

                            <div class="card-content">
                                <h3 class="fw-bold">{{ $author->name }}</h3>
                                <p class="small">
                                    <i class="bi bi-journal-richtext"></i> {{ $author->posts_count }} Posts Published
                                </p>
                                <a href="/posts?author={{ $author->username }}" class="btn-small">
                                    VIEW PROFILE
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
