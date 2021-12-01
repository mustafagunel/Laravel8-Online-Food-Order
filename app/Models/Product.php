<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'keywords',
        'description',
        'image',
        'category_id',
        'restaurant_id',
        'detail',
        'price',
        'status' => 0
    ];

    protected $table="product";
}
