<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    public function rooms()
    {
        return $this->belongsToMany(Room::class,'city_room','city_id','room_id');
    }

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }
}
