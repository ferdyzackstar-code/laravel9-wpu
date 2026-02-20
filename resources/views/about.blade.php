@extends('layouts.main')

@section('container')
    <div class="about-wrapper">
        {{-- KIRI : TEXT --}}
        <div class="about-text">
            <h1 class="about-title">FAREL FERDYAWAN</h1>
            <h2 class="about-subtitle">WEB DEVELOPER</h2>
            <p class="about-desc">

                {{-- Versi Indonesia --}}
                {{-- Saya seorang pelajar yang ingin menjadi web developer. Saya sangat senang dengan desain, kode, dan logika
                pemrograman. Menggunakan Laravel dan Bootstrap, saya dapat membuat website dengan kreativitas saya.

                Saat ini, saya fokus mendalami ekosistem Back-End sambil terus mengasah kemampuan Front-End agar bisa
                membangun aplikasi web yang utuh. Bagi saya, setiap baris kode adalah kesempatan untuk belajar hal baru.
                Saya bercita-cita untuk terus berinovasi dan berkontribusi dalam proyek-proyek digital yang bermanfaat bagi
                orang banyak. --}}

                {{-- English Version --}}
                I'm a student aspiring to become a web developer. I'm passionate about design, code, and programming logic.
                Using Laravel and Bootstrap, I can create websites with my creativity.

                Currently, I'm focused on exploring the back-end ecosystem while continuing to hone my front-end skills to
                build comprehensive web applications. For me, every line of code is an opportunity to learn something new. I
                aspire to continue innovating and contributing to digital projects that benefit many people.
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

    {{-- SECTION SEKOLAH --}}
    <section class="school-section">
        <div class="school-card">
            <img src="{{ asset('img/tarunabangsa.jpg') }}" alt="Sekolah Saya" class="school-img">

            <div class="school-overlay">
                <div class="school-content">
                    <span class="badge-education">EDUCATION</span>
                    <h2 class="school-name">SMK TARUNA BANGSA</h2> 
                    <p class="school-desc">
                        Di sinilah tempat saya menimba ilmu dan mengasah kemampuan di bidang Rekayasa Perangkat Lunak.
                        Lingkungan yang mendukung dan fasilitas yang memadai membantu saya mengeksplorasi dunia
                        web development lebih jauh, mulai dari logika dasar hingga framework modern.
                    </p>
                    <div class="school-location">
                        <i class="bi bi-geo-alt-fill"></i> Bekasi Utara, Indonesia
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
