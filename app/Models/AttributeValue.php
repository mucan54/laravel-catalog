<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Models\Attachment;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;

class AttributeValue extends Model
{
    use AsSource, Attachable, Filterable;

    protected $table = 'attributevalue';

    protected $fillable = [
        'name',
        'attribute_id'
    ];

    protected $allowedFilters = [
        'name',
        'attribute_id'
    ];

    protected $allowedSorts = [
        'name',
        'attribute_id'
    ];


    public function products(){
        return $this->belongsToMany('App\Models\Products','attributevalue_product','attributevalue_id','product_id');
    }

    public function attribute(){
        return $this->belongsTo('App\Models\Attribute');
    }

    public function scopeParent($query,$filter){
        return $query->where('attribute_id', (int)$filter);
    }
}
