<?php

namespace App\Observers;

use App\Models\Products;
use Orchid\Attachment\Models\Attachment;

class ProductsObserver
{
    public function deleting(Products $post)
    {
        $post->attachment()->each->delete();
    }

}
