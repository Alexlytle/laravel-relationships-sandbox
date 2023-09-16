<?php

namespace App\Models;

use App\Models\City;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    public function cities()
    {
        return $this->belongsToMany(City::class,'city_room','room_id','city_id');
        
    }

    public function likes()
    {
        return $this->morphToMany(User::class,'likeable');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}
