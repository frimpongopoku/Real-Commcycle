<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function mother(){
    	return $this->hasOne('App\orderDetails'); 
    }
}
