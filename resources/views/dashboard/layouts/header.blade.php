<header class="navbar navbar-expand-md navbar-glass sticky-top px-3">
    <a class="navbar-brand fw-bold" href="/">Ferdy Blog</a>

    <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="ms-auto d-flex align-items-center gap-3">

        <!-- Toggle Theme -->
        <button id="themeToggle" class="btn btn-sm btn-toggle-theme">
            <i class="bi bi-moon-stars-fill"></i>
        </button>

        <!-- Logout -->
        <form action="{{ url('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btn-logout">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>

    </div>
</header>
