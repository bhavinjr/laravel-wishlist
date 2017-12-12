<?php
namespace Bhavinjr\Wishlist\Providers;

use Illuminate\Support\ServiceProvider;
use Bhavinjr\Wishlist\Wishlist;

class WishlistServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishConfiguration();
        $this->publishMigrations();
    }
    public function register()
    {
        $config = __DIR__ . '/../../config/wishlist.php';
        $this->mergeConfigFrom($config, 'wishlist');
        $this->app->singleton('wishlist', Wishlist::class);
    }
    public function provides()
    {
        return ['Wishlist'];
    }
    public function publishConfiguration()
    {
        $path   =   realpath(__DIR__.'/../../config/wishlist.php');
        $this->publishes([$path => config_path('wishlist.php')], 'config');
    }
    public function publishMigrations()
    {
        $this->publishes([
            __DIR__.'/../../database/migrations/' => database_path('/migrations')
        ], 'migrations');
    }
}
