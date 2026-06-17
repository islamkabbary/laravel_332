<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $table = "hamada";

    protected $fillable = ['name', "price"];
    // protected $guarded = ["name"];


    public function scopeActive(Builder $query)
    {
        return $query->where("active", true);
    }

    public function details()
    {
        return $this->hasOne(ProductDetails::class,"product_2_id",'id');
    }
    // public function category()
    // {
    //     return $this->belongsTo(category::class);
    // }
    public function categories()
    {
        return $this->belongsToMany(category::class,"category_product");
    }
}
