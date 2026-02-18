@extends('layouts.main')

@section('container')
    <div class="about-wrapper">
        {{-- KIRI : TEXT --}}
        <div class="about-text">
            <h1 class="about-title">FAREL FERDYAWAN</h1>
            <h2 class="about-subtitle">WEB DEVELOPER</h2>
            <p class="about-desc">
                I am a web developer who loves building clean, fast,
                and modern web applications using Laravel and Bootstrap.

                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                anim id est laborum.
            </p>
        </div>

        {{-- KANAN : CARD --}}
        <div class="about-card">
            <div class="card-client">
                <div class="user-picture">
                    <img src="img/{{ $image }}" alt="{{ $name }}" width="200" height="200">
                </div>
                <p class="name-client">
                    {{ $name }}
                    <span>{{ $email }}</span>
                </p>
                <div class="social-media animate">
                    <a href="https://www.tiktok.com/@ferdyzackstar" data-tooltip="@ferdyzackstar">
                        <i class="bi bi-tiktok"></i>
                    </a>
                    <a href="https://www.instagram.com/farel.ferdyawan/" data-tooltip="@farel.ferdyawan">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/@blackbr6766" data-tooltip="@blackbr6766">
                        <i class="bi bi-youtube"></i>
                    </a>
                    <a href="https://github.com/ferdyzackstar-code" data-tooltip="ferdyzackstar-code">
                        <i class="bi bi-github"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
