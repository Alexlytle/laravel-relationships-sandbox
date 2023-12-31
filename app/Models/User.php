<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Image;
use App\Models\Comment;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //(related model,foriegn key on related model, foriegn key on model )  
    public function address()
    {
        return $this->hasOne(Address::class,'user_id','id');
    }

    public function comments()
    {
    //(related model,foriegn key on related model, foriegn key on model )  
        return $this->hasMany(Comment::class,'user_id','id');
    }

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }

    public function likedImages()
    {
        return $this->morphedByMany(Image::class,'likeable');
    }

    public function likedRooms()
    {
        return $this->morphedByMany(Room::class,'likeable');
    }
    
}
