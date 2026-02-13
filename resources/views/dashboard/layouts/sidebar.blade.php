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
        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('dashboard-categories*') ? 'active' : ' ' }}"
                    href="{{ route('dashboard-categories.index') }}">

                    <i class="bi bi-columns-gap"></i>
                    Post Categories
                </a>
            </li>
        </ul>
        @endcan
    </div>
</nav>
