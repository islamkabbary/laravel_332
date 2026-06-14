<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $table = "hamada";

    // protected $fillable = ['name',"price"];
    protected $guarded = ["name"];
}
