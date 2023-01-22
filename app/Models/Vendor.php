<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    public function vendor_payment()
    {
        return $this->hasMany(givenAmountToVenor::class, 'vendor_id');
    }
    
}
