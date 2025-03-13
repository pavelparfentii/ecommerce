<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCategory extends Model
{
    use HasFactory;

       protected $fillable = [
        'category_id',
        'subcategory_name',
        'subcategory_slug',
    ];

    public function category(): BelongsTo
    {
    	return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subsubcategories(): HasMany
    {
        return $this->hasMany(SubSubCategory::class, 'subcategory_id');
    }


}
