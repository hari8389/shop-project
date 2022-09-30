<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    use HasFactory;
    protected $table = 'product_categories';
    protected $fillable = [
        'id',
        'productname',
        'description',
        'active',
    ];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
