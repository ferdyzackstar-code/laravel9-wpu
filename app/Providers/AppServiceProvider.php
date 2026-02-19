<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 1. Agar pagination Laravel menggunakan styling Bootstrap
        Paginator::useBootstrap();

        // 2. Gate untuk otorisasi Admin
        Gate::define('admin', function (User $user) {
            return $user->is_admin;
            // Pastikan di tabel users kamu sudah ada kolom 'is_admin' (boolean)
        });
    }
}
