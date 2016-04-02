<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingred extends Model
{
	protected $fillable = ['name'];
	
    public function recipes()
    {
		return $this->belongsToMany('App\Recipe');
		}
}
