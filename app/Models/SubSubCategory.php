<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubSubCategory extends Model
{
    use HasFactory;

     protected $fillable = [
        'category_id',
        'subcategory_id',
        'subsubcategory_name',
        'subsubcategory_slug',
    ];

    public function category(): BelongsTo
    {
    	return $this->belongsTo(Category::class,'category_id','id');
    }


	public function subcategory(): BelongsTo
    {
    	return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }



}
