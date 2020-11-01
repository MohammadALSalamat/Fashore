<?php

namespace App\Models;

use App\Models\Altter_product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    // relation ship between products and altrenative products
    public function Category_id()
    {
        return $this->belongsTo(Category::class, 'product_id');
    }

    public function Altter_id()
    {
        return $this->hasMany(Altter_product::class, 'altter_id');
    }
}
