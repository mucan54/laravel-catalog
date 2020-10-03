<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Models\Attachment;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use App\Models\Category;

class Products extends Model
{
    use AsSource, Attachable, Filterable;

    protected $fillable = [
        'name',
        'sku',
        'body',
        'category',
        'hero'
    ];

    protected $allowedFilters = [
        'name',
        'sku',
        'category'
    ];

    public function hero()
    {
        
        return json_decode($this->hasOne(Attachment::class, 'id', 'hero')->withDefault()->get())[0]->url;
    }

    public function cat()
    {
        return $this->hasOne(Category::class, 'id', 'category');
    }
}
