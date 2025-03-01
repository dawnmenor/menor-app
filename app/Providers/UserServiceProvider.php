<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserService;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(UserService::class, function ($app) {
            $users = [
                [
                    'id' => 1,
                    'name' => 'John Doe',
                    'gender' => 'Male'
                ],
                [
                    'id' => 2,
                    'name' => 'Jane Doe',
                    'gender' => 'Female'
                ],
                [
                    'id' => 3,
                    'name' => 'Sample Test',
                    'gender' => 'Female'
                ]
            ];

            return new UserService($users); 
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
