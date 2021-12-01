<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'tittle',
        'keywords',
        'description',
        'company',
        'address',
        'phone',
        'fax',
        'email',
        'smtpserver',
        'smtpemail',
        'smtpport',
        'facebook',
        'instagram',
        'twitter',
        'aboutus',
        'contact',
        'references',
        'company',
        'status'
    ];
    
}
