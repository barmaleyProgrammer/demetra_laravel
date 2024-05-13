<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhotoHomePage extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'image',
    ];

    protected $attributes = [
        'position' => 0,
        'is_active' => true,
    ];

    protected $casts = [
        'is_active' => 'bool',
    ];
}
