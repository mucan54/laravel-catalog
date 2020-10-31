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
        'hero',
        'thumb'
    ];

    protected $allowedFilters = [
        'name',
        'sku'
    ];

    protected $allowedSorts = [
        'name',
        'sku'
    ];

    public function myhero()
    {

        return $this->hasOne(Attachment::class, 'id', 'hero');
    }


    public function mythumb()
    {

        return $this->hasOne(Attachment::class, 'id', 'thumb');
    }


    public function attributevalues()
    {
        return $this->belongsToMany('App\Models\AttributeValue','attributevalue_product','product_id','attributevalue_id');
    }
}
