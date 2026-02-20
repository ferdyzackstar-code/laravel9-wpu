@extends('layouts.main')

@section('container')
    <div class="author-page">
        <h1 class="mb-5 text-center text-white fw-bold">{{ $title }}</h1>

        <div class="container">
            <div class="row justify-content-center">
                @foreach ($authors as $author)
                    <div class="col-md-4 mb-4">
                        <div class="card author-card border-0 shadow-sm overflow-hidden">

                            {{-- Logika Foto Profil --}}
                            @if ($author->image)
                                <img src="{{ asset('storage/' . $author->image) }}" alt="{{ $author->name }}">
                            @else
                                <img src="https://i.pravatar.cc/400?u={{ $author->username }}" alt="{{ $author->name }}">
                            @endif

                            {{-- Ganti card-body dengan card-content biar teksnya melayang --}}
                            <div class="card-content">
                                <h3 class="fw-bold">{{ $author->name }}</h3>
                                <p class="small text-white-50">
                                    <i class="bi bi-journal-richtext"></i> {{ $author->posts->count() }} Posts Published
                                </p>
                                <p class="small text-white-50 mb-3">{{ $author->email }}</p>

                                <a href="/posts?author={{ $author->username }}" class="btn-small">
                                    VIEW ALL POSTS
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
