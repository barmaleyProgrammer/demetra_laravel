<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Place extends Model
{
    protected $fillable = [
        'name',
    ];
    protected $table = 'gallery_places';
    public $timestamps = false;

    public function main_photo(): HasOne
    {
        return $this->hasOne(PlacePhoto::class, 'gallery_place_id')->where('is_main', true);
    }

    public function gallery_photos(): HasMany
    {
        return $this->hasMany(PlacePhoto::class);
    }
}
