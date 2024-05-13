<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newone extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable = [
        'title',
        'body',
        'publish_date',
        'is_active',
    ];

    protected $attributes = [
        'is_active' => true,
    ];

    protected $casts = [
        'is_active' => 'bool',
    ];
}
