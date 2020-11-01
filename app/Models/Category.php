<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function frontCategory()
    {

        return $this->hasMany(Category::class, 'parent_id');
    }

    // relation between category and product on Product_Id

    public function Category_id()
    {
        return $this->hasOne(Product::class);
    }
}
