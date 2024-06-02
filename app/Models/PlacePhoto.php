<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlacePhoto extends Model
{

    protected $table = 'gallery_photos';

    protected $fillable = [
        'gallery_place_id',
        'image',
        'is_main',
    ];

    protected $casts = [
        'is_main' => 'boolean'
    ];

    public $timestamps = false;
    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }
}
