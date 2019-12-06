<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    		'id',
    		'user_id',
    		'first_name',
    		'last_name',
    		'Gender',
    		'job_title',
    		'city',
    		'country'
	];
	
	public function user()
    {
        return $this->belongsTo(User::class);
    }
}
