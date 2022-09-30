<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'date',
        'product_category_id',
        'product_id',
        'user_id',
        'type',
        'quantity',
        'price',
        'amount',
    ];
    
    protected $table = 'transactions';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product_category()
    {
        return $this->belongsTo(Product_category::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}

