<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    
    protected $fillable = [
        'product_category_id',
        'product',
        'vendor_price',
        'sale_price',
        'description',
        'active',
    ];
    public function product_category()
    {
        return $this->belongsTo(Product_category::class);
    }
}
