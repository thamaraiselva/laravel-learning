<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryList extends Model
{
    protected $table='history_lists';

    /* 
    get the all the models history 
    */

    public function history_list()
    {
        return $this->morphTo();
    }
}
