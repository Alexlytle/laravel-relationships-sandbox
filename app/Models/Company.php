<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    public function reservations()
    {
        return $this->hasManyThrough(Reservation::class,User::class);
    }

    public function comments()
    {
        return $this->hasManyThrough(Comment::class,User::class);
    }
    
}
