<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MiniCategory;
class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parent_id',
        'thumbnail',
        'status',
        'seo_title',
        'seo_description',
        'seo_keyword',
    ];
// relation cateogry
    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function child() {
        return $this->hasMany(Category::class, 'parent_id');
    }
    // 
    public function childs()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
