@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
    </div>

    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <div class="card custom-glass-card h-100 p-3 border-0 shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="badge bg-primary p-3 me-3 rounded-3">
                        <i class="bi bi-file-earmark-post fs-4"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 text-muted">Total Posts</h6>
                        <h3 class="fw-bold mb-0">{{ auth()->user()->posts->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card custom-glass-card h-100 p-3 border-0 shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="badge bg-success p-3 me-3 rounded-3">
                        <i class="bi bi-tags fs-4"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 text-muted">Categories Used</h6>
                        <h3 class="fw-bold mb-0">{{ auth()->user()->posts->groupBy('category_id')->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card custom-glass-card h-100 p-3 border-0 shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="badge bg-warning p-3 me-3 rounded-3 text-dark">
                        <i class="bi bi-clock-history fs-4"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 text-muted">Last Activity</h6>
                        <h4 class="fw-bold mb-0" style="font-size: 1.1rem;">
                            {{ auth()->user()->posts->sortByDesc('created_at')->first()?->created_at->diffForHumans() ?? 'No activity' }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 p-4 rounded-4 custom-glass-card border-0 shadow-sm">
        <h5>Quick Actions</h5>
        <div class="d-flex gap-2 mt-3">
            <a href="/dashboard-posts/create" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> New Post
            </a>
            <a href="/" class="btn btn-outline-info">
                <i class="bi bi-eye me-1"></i> View Live Site
            </a>
        </div>
    </div>
@endsection
