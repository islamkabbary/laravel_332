<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // protected $table = "hamada";

    protected $fillable = ['name', "price", "created_by", "active"];
    // protected $guarded = ["name"];


    public function scopeActive(Builder $query)
    {
        return $query->where("active", true);
    }

    public function details()
    {
        return $this->hasOne(ProductDetails::class, "product_2_id", 'id');
    }
    // public function category()
    // {
    //     return $this->belongsTo(category::class);
    // }
    public function categories()
    {
        return $this->belongsToMany(category::class, "category_product", "product_id", 'category_id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, "created_by", 'id');
    }
}