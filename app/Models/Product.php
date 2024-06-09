<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'description',
        'price',
        'photo',
        'expiration_date',
        'sku',
        'stock'
    ];


    public function movements()
    {
        return $this->hasMany(ProductMovement::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
