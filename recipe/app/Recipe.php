<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable=['title','description','ingredients','user_id'];
    
    public function user() 
    {
		return $this->belongsTo('App\User');
		}
		
	public function ingreds()
	{
		return $this->belongsToMany('App\Ingred','ingred_recipe');
		}
		
	public function getIngredListAttribute()
	{
		return $this->ingreds->lists('id')->all();
		
		}
}
