<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomPhoto extends Model
{

    protected $table = 'room_photos';

    protected $fillable = [
        'room_id',
        'image',
    ];
    public $timestamps = false;
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
