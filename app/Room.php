<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Room extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'user_id', 'room_id'
    // ];
    protected $fillable = [
        'room_id', 'name'
    ];

    public function __construct()
    {
        // $this->room_id = rand(0, 999999);
    }

    public function user()
    {
        // return $this->belongsTo('App\User', 'user_id');
        // return $this->belongsToMany('App\User')
        //             ->using('App\RoomSubscriptions');
        return $this->belongsToMany('App\User', 'room_subscriptions');
    }
    
}
