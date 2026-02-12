<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('dashboard.index') ? 'active' : '' }}"
                    href="{{ route('dashboard.index') }}">
                    <i class="bi bi-house-fill"></i>
                    <span data-feather="fs fs-home"></span>
                    Dashboard
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('dashboard-posts*') ? 'active' : ' ' }}"
                    href="{{ route('dashboard-posts.index') }}">

                    <i class="bi bi-file-earmark-text-fill"></i>
                    Posts
                </a>
            </li>
        </ul>
    </div>
</nav>
