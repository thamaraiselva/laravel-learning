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

    /* 
    Get the history lists for board 
    */

    public function historyList()
    {
        return $this->morphMany('App\HistoryList','history_list');
    }

}
