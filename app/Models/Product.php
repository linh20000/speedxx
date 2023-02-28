<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'subname',
        'thumbnail_1',
        'thumbnail_2',
        'thumbnail_list',
        'category_id',
        'brand',
        'tags',
        'color',
        'size',
        'old_price',
        'off',
        'sale_price',
        'status',
        'description',
        'quantity',
        'seo_title',
        'seo_keyword',
        'seo_description'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }
}
