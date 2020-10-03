<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Http\Controllers\Systems\AttachmentController;

class ImageOptimizeProvider extends AttachmentController
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function upload(Request $request)
    {
        return false;
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
