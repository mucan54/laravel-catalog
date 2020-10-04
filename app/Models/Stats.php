<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class Stats extends Model
{
    use AsSource, Filterable;

    protected $allowedFilters = [
        'user_name',
        'product_name',
        'product_id',
        'created_at'
    ];

    protected $allowedSorts = [
        'user_name',
        'product_name',
        'product_id',
        'created_at'
    ];
}
