<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomSubscriptions extends Model
{
    protected $fillable = [
        'room_id', 'user_id'
    ];

}
