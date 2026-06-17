<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    protected $fillable = ["dec"];
    public function product()
    {
        return $this->belongsTo(Product::class,"product_2_id","id");
    }
}
