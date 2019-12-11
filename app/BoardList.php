<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardList extends Model
{
    protected $table = 'lists';

    /**
     * Get the board that owns the board list.
     */
    public function board()
    {
        return $this->belongsTo('App\Board');
    }

    /**
     * Get the task for the board list.
     */
    public function task()
    {
        return $this->hasMany('App\Task');
    }
}
