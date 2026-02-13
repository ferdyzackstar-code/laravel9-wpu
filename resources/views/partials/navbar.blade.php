<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="/">Ferdy Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'posts' ? 'active' : '' }}" href="/posts">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'categories' ? 'active' : '' }}"
                            href="/categories">Categories</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto ">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Welcome Back, {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window"></i> My
                                        Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item" href="#"><i
                                            class="bi bi-box-arrow-right"></i> Logout</a>
                        </li>
                        </button>
                        </form>
                    </ul>
                    </li>
                    <li class="nav-item mt-1 mx-3">
                        <button id="themeToggle" class="btn btn-outline-light btn-sm ms-2">
                            🌙
                        </button>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ $active === 'login' ? 'active' : '' }}"><i
                                class="bi bi-box-arrow-in-right"></i>
                            Login</a>
                    </li>
                @endauth
                </ul>
            </div>
        </div>
    </nav>
</body>
<script>
    const themeToggle = document.getElementById("themeToggle");
    const html = document.documentElement;

    // cek theme tersimpan
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme) {
        html.setAttribute("data-bs-theme", savedTheme);
        themeToggle.textContent = savedTheme === "dark" ? "☀️" : "🌙";
    }

    themeToggle.addEventListener("click", () => {
        const currentTheme = html.getAttribute("data-bs-theme") || "light";
        const newTheme = currentTheme === "dark" ? "light" : "dark";

        html.setAttribute("data-bs-theme", newTheme);
        localStorage.setItem("theme", newTheme);
        themeToggle.textContent = newTheme === "dark" ? "☀️" : "🌙";
    });
</script>

</html>
