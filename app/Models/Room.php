<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    public $timestamps = false;
    public function room_photos(): HasMany
    {
        return $this->hasMany(RoomPhoto::class);
    }
}
