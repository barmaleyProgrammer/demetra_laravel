<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public $timestamps = false;
    public function room_photos(): HasMany
    {
        return $this->hasMany(RoomPhoto::class);
    }
}
