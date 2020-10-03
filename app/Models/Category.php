<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class Category extends Model
{
    use AsSource, Filterable;

    protected $table = 'category';

    protected $fillable = [
        'name',
        'category'
    ];

}
