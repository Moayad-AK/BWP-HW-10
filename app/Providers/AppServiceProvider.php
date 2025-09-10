<?php

namespace App\Providers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;


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
        Paginator::useBootstrapFive();
        
        Gate::define('edit-product', function (User $user, Product $product) {
            return $product->user->is($user);
        });
        Gate::define('create-product', function (User $user) {
            return  $user->admin === 1;
        });
        Gate::define('check-out', function (User  $user) {
            return $user->cartItems === null;
        });
    }
}
