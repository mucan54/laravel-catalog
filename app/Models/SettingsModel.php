<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class SettingsModel extends Model
{
    use AsSource;

    protected $table = 'settings';

    protected $fillable = [
        'name',
        'value'
    ];
}
