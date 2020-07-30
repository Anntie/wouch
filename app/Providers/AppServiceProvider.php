<?php

namespace App\Providers;

use App\Contracts\UserCommentsRepositoryInterface;
use App\Services\EloquentUserCommentsRepository;
use App\Services\SqlUserCommentsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserCommentsRepositoryInterface::class, function ($app, $params) {
            $repository = config('repositories.user_comments.' . $params['type'] ?? 'eloquent', EloquentUserCommentsRepository::class);

            return new $repository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
