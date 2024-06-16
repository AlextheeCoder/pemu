<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Appwrite\Client;

class AppwriteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton(Client::class, function ($app) {
            $client = new Client();
            $client
                ->setEndpoint(env('APPWRITE_ENDPOINT'))
                ->setProject(env('APPWRITE_PROJECT'))
                ->setKey(env('APPWRITE_API_KEY'));
            return $client;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}