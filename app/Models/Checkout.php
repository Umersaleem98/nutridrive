<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'checkout';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'product_name',
        'quantity',
        'price',
        'total',
        'status',
    ];

    /**
     * Get the user associated with the checkout record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
