<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'keywords',
        'description',
        'image',
        'type',
        'detail',
        'city',
        'town',
        'district',
        'location',
        'status'
    ];
}