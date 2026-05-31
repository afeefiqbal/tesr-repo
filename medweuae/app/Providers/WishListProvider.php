<?php

namespace App\Providers;

use Darryldecode\Cart\Cart;
use Illuminate\Support\ServiceProvider;
use App\Models\DatabaseStorage;

class WishListProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('wishlist', function($app)
        {
            $storage = new DatabaseStorage;//$app['session'];
            $events = $app['events'];
            $instanceName = 'wishlist';
            $session_key = 'wishlist_'.session('session_key');

            return new Cart(
                $storage,
                $events,
                $instanceName,
                $session_key,
                config('shopping_cart')
            );
        });
    }
}
