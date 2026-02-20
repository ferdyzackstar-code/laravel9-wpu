@extends('layouts.main')

@section('container')
    <h1 class="mb-5 text-center">{{ $title }}</h1>

    <div class="container">
        <div class="row">
            @foreach ($authors as $author)
                <div class="col-md-4 mb-3">
                    <div class="card author-card h-100 border-0 shadow-sm overflow-hidden"
                        style="background: #1f2933; color: white; border-radius: 15px;">

                        {{-- Logika Foto Profil --}}
                        @if ($author->image)
                            <img src="{{ asset('storage/' . $author->image) }}" class="card-img-top" alt="{{ $author->name }}"
                                style="height: 350px; object-fit: cover;">
                        @else
                            {{-- Kalau belum ada foto, pakai UI Avatars agar terlihat profesional --}}
                            <img src="https://i.pravatar.cc/400?u={{ $author->username }}"
                                class="card-img-top" alt="{{ $author->name }}" style="height: 350px; object-fit: cover;">
                        @endif

                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $author->name }}</h5>
                            <p class="text-muted">
                                <i class="bi bi-journal-richtext"></i> {{ $author->posts->count() }} Posts Published
                            </p>
                            <p class="text-muted small">{{ $author->email }}</p>
                            <a href="/posts?author={{ $author->username }}" class="btn btn-primary"
                                style="background: #38bdf8; border: none; border-radius: 50px;">
                                View All Posts
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
