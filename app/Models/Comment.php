<?php

namespace App\Models;

use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function country()
    {
        //related,through, Foreign key on the through model, Foreign key on the related model, Foreign key on model
        return $this->hasOneThrough(Address::class,User::class,'id','user_id','user_id');
    }
    
    public function commentable()
    {
        return $this->morphTo();
    }
}
