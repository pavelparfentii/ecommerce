<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_slug',
        'category_icon',
    ];

    public function subcategories(): HasMany
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }

    public function subsubcategories(): HasMany
    {
        return $this->hasMany(SubSubCategory::class, 'category_id', 'id');
    }

}
