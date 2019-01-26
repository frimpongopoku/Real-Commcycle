<?php

namespace App;
use Session;

class Cart 
{
	public $items = null; 
	public $quantity=0; 
	public $price = 0 ; 

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items; 
			$this->quantity = $oldCart->quantity;
			$this->price = $oldCart->price;
		}
	}
	public function add($item, $page , $id){
		$selectedItem = ['Quantity' => 0 , 'Price' => $item->Price,'shop'=>$page, 'Item' =>$item];
		if($this->items){
			if(array_key_exists($id.'->'.$page, $this->items)){
				$selectedItem = $this->items[$id.'->'.$page];
			}
		}
		$selectedItem['Quantity']++; 
		//check if a staff member is the one buying
		if(Session::get('staffulty') =='Yes' && $item->Category =='OUR'){
			$selectedItem['Price'] = ($item->Price + 100) * $selectedItem['Quantity']; 
		}
		else{
			$selectedItem['Price'] = $item->Price * $selectedItem['Quantity']; 
		}
		
		$this->items[$id.'->'.$page] = $selectedItem;
		$this->quantity ++; 
		//check if a staff member is the one buying
		if(Session::get('staffulty') =='Yes' && $item->Category =='OUR'){
				$this->price += ($item->Price + 100) * $selectedItem['Quantity']; 
		}else{
			$this->price += $item->Price;
		}
	}



}
