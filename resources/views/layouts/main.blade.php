<!doctype html>
<html lang="en">

<head>
    <script>
        (function() {
            const savedTheme = localStorage.getItem("theme");
            if (savedTheme) {
                document.documentElement.setAttribute("data-bs-theme", savedTheme);
            }
        })();
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ferdy Blog | {{ $title }}</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    {{-- Global Styles --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Navbar --}}
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

    {{-- About --}}
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">

    {{-- Posts list --}}
    @stack('styles-posts')

    {{-- Single post --}}
    @stack('styles-post')

    {{-- Auth --}}
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

    {{-- Home --}}
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    {{-- Categories --}}
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">

    {{-- Authors --}}
    <link rel="stylesheet" href="{{ asset('css/authors.css') }}">
</head>


<body>

    @include('partials.navbar')

    <div class="container mt-5 pt-5">
        @yield('container')
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const themeToggle = document.getElementById("themeToggle");
        const html = document.documentElement;

        // INIT THEME (tanpa animasi)
        const savedTheme = localStorage.getItem("theme");
        if (savedTheme) {
            html.setAttribute("data-bs-theme", savedTheme);
            themeToggle.textContent = savedTheme === "dark" ? "☀️" : "🌙";
        }

        themeToggle.addEventListener("click", () => {
            // aktifkan animasi
            html.classList.add("theme-transition");

            const currentTheme = html.getAttribute("data-bs-theme") || "light";
            const newTheme = currentTheme === "dark" ? "light" : "dark";

            html.setAttribute("data-bs-theme", newTheme);
            localStorage.setItem("theme", newTheme);
            themeToggle.textContent = newTheme === "dark" ? "☀️" : "🌙";

            // matikan animasi setelah selesai
            setTimeout(() => {
                html.classList.remove("theme-transition");
            }, 400);
        });
    </script>


</body>

</html>
