<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Models\Attachment;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;

class Attribute extends Model
{
    use AsSource, Attachable, Filterable;

    protected $table = 'attribute';

    protected $fillable = [
        'name',
        'order'
    ];

    protected $allowedFilters = [
        'name',
        'order'
    ];

    protected $allowedSorts = [
        'name',
        'order'
    ];

    public function attributevalues()
    {
        return $this->hasMany('App\Models\AttributeValue');
    }
}
