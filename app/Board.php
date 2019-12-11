<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    /**
     * Get the checkLists for the board.
     */
    public function checkLists()
    {
        return $this->hasMany('App\CheckList');
    }
}
