<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{
    protected $table='check_lists';

   /**
     * Get the task that owns the check list.
     */
    public function task()
    {
        return $this->belongsTo('App\Task');
    }

     /* 
    Get all the history lists for checklist
    */

    public function historyList()
    {
        return $this->morphMany('App\HistoryList','history_list');
    }
    
}
