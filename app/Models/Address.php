<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['number','street','user_id','country'];

    public function user()
    {                   
        //(related model,foriegn key on model, owner key on related model)       
        return $this->belongsTo(User::class,'user_id','id');
    }
}
