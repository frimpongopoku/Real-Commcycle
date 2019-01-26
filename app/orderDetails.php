<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderDetails extends Model
{
 	protected $table = 'orderDetails'; 
 	   
 	   
 	   public function children(){
 	   
 	   	return $this->belongsTo('App\Order');
 	   
 	   }
}
