@extends('layouts.main')

@section('container')
    <div class="home-page">
        <link
            href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400&display=swap"
            rel="stylesheet">

        <header class="hero">
            <div class="hero-content">
                <h1>Ferdy Digital Space</h1>
                <p class="subtitle">CODE • DESIGN • THOUGHTS</p>
                <p class="description">

                    {{-- Versi Indonesia --}}
                    {{-- Selamat datang di jurnal digital saya. Tempat di mana teknologi bertemu kreativitas. Temukan tutorial
                    pemrograman, tips desain UI/UX, dan kisah tentang perjalanan saya melalui dunia teknologi yang terus
                    berkembang. --}}

                    {{-- English Version  --}}
                    Welcome to my digital journal. A place where technology meets creativity. Discover programming
                    tutorials, UI/UX design tips, and stories about my journey through the ever-evolving world of
                    technology.
                </p>
                <a href="#explore-sections" class="btn-outline">START READING</a>
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

                                {{-- Logika Foto Profil --}}
                                @if ($author->image)
                                    <img src="{{ asset('storage/' . $author->image) }}" alt="{{ $author->name }}">
                                @else
                                    <img src="https://i.pravatar.cc/400?u={{ $author->username }}"
                                        alt="{{ $author->name }}">
                                @endif

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
    </div>
@endsection
