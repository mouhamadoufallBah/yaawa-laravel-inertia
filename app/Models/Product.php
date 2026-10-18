<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['name', 'category_id', 'description', 'origin', 'unit', 'image', 'price', 'sale_price', 'stock', 'version', 'active', 'featured'])]
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
}
