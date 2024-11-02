<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function addedToCard(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'carts');
    }

    public function commented(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'comments');
    }

    public function ordered(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_items');
    }

    public function primaryImage(): HasOne
    {
        return $this->hasOne(ProductImage::class)->oldestOfMany('position');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function  category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
