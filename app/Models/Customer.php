<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class Customer extends Model
{
    use AsSource, Filterable;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'username',
        'email',
        'password'
    ];

    protected $allowedFilters = [
        'name',
        'username',
        'email',
        'password'
    ];

    protected $allowedSorts = [
        'name',
        'username',
        'email',
        'password'
    ];
}
