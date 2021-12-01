<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'parent_id',
        'title',
        'keywords',
        'description',
        'image',
        'status' => 0
    ];

    protected $table = 'category';
}
