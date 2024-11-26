<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','subitile', 'category_id', 'price', 'sale_price', 'status', 'stock', 'description', 'images'
    ];

    public function category()
{
    return $this->belongsTo(Category::class);
}

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    
}
