<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Get the board list that owns the task.
     */
    public function boardlist()
    {
        return $this->belongsTo('App\BoardList');
    }

    /**
     * Get the task for the check list.
     */
    public function checklist()
    {
        return $this->hasMany('App\CheckList');
    }
}
