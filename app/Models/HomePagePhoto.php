<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomePagePhoto extends Model
{
    use HasFactory;
    protected $table = 'home_page_photos';
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
