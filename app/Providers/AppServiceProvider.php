<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $loader = AliasLoader::getInstance();

        Schema::defaultStringLength(191);

        $loader->alias(
            'App\Providers\ImageOptimizeProvider',
            'Orchid\Platform\Http\Controllers\Systems\AttachmentController'
        );
    }
}
