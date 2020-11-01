<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Altter_product extends Model
{
    use HasFactory;
    public function Altter_id()
    {
        return $this->belongsTo(Product::class, 'altter_id');
    }
}
