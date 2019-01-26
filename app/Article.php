<?php 

namespace App; 


use Illuminate\Database\Eloquent\Model; 

class Article extends Model 
{

	protected $fillable = ['Image','tagline','semiTag','Text','published','deleted'];
	
	public function comments(){
		return $this->hasMany('App\Comment');
	
	}


}