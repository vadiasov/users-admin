<?php

namespace Vadiasov\UsersAdmin;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        require __DIR__ . '/Http/routes.php';
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__ . '/views', 'users-admin');
        $this->publishes([
            __DIR__.'/seeds' => database_path('seeds'),
            __DIR__.'/migrations' => database_path('migrations'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Vadiasov\UsersAdmin\Http\UsersController');
        $this->app->make('Vadiasov\UsersAdmin\Http\UserRequest');
        $this->app->singleton(UsersAdmin::class, function () {
            return new UsersAdmin();
        });
        $this->app->alias(UsersAdmin::class, 'users-admin');
    }
}
