<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutProduct extends Model
{
    use HasFactory;


    public function getProducts()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
