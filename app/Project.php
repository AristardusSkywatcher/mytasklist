<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_id', 'body', 'name'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function participants()
    {
        return $this->belongsToMany(User::class, 'project_participants');
    }
}
