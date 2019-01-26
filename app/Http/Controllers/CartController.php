<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Free;
use App\NoPicFree;
use App\Subscribe;
use App\Shop;
use App\NoPicShop;
use App\Cart;
use App\Order;
use App\LadyBorder;
use App\Ladyb;
use App\orderDetails;

class CartController extends Controller
{



	public function generateAdminOrder($name,$email,$number,$totalCost,$items,$address,$info){
	$message = "
			<h1 style='text-shadow: 0px 3px 6px rgba(0,0,0,0.6);'><span style='color:cyan;'>Gre</span><span style='color:deeppink'>eti</span><span style='color:orange'>ngs</span> Admin,</h1>

	<h4>This is to inform you that there is a new order. <span style='color:green'><br><br>Here is the card</span></h4>

	<div style='border:solid 5px black;border-left-color:deeppink; border-right-color:orange; border-bottom-color:cyan; padding:10px;border-radius:10px;box-shadow:0 3px 4px rgba(0,0,0,0.8);'> 
		<h3 style='color:white; background: black; padding:5px;box-shadow:0 3px 4px rgba(0,0,0,0.2);border:solid 1px crimson;'>Order details</h3>

		<p style='border:solid 2px black; border-width:0px; border-bottom-width:2px;width:45%'><b>Name: $name</b></p>
		<p style='border:solid 2px black; border-width:0px; border-bottom-width:2px;width:45%'><b>Email: $email</b></p>
	   	<p style='border:solid 2px black; border-width:0px; border-bottom-width:2px;width:45%'><b>Number: $number</b></p>
	   <p style='border:solid 2px black; border-width:0px; border-bottom-width:2px;width:45%'><b>Address: $address</b></p>
	   	   	   <p style='border:solid 2px black; border-width:0px; border-bottom-width:2px;'><b>Items: $items</b></p>

	   <p style=''><b>Information:</b></p>
	  <p> $info</p>
	   <hr>
	   <small><b>Total cost (in rands)</b></small>
	   <button style='background: green; color:white; text-shadow: 0px 3px 6px rgba(0,0,0,0.6); border-radius: 5px;'> $totalCost </button>


	</div>
	<p>Please answer this as soon as you can.</p>
	<br> 
	<br> 
	
	<small>Regards,</small>

		
		
		
		
		
		
		
		";
		
		return $message;
	
	
	
	}
	public function generateOrderCard($name,$email,$number,$totalCost,$items,$address,$info){
				$message = "
			<h1 style='text-shadow: 0px 3px 6px rgba(0,0,0,0.6);'><span style='color:cyan;'>Gre</span><span style='color:deeppink'>eti</span><span style='color:orange'>ngs</span> $name,</h1>

	<h4>This is to inform you that your order has been placed. <span style='color:green'><br><br>Here is your card</span></h4>

	<div style='border:solid 5px black;border-left-color:deeppink; border-right-color:orange; border-bottom-color:cyan; padding:10px;border-radius:10px;box-shadow:0 3px 4px rgba(0,0,0,0.8);'> 
		<h3 style='color:white; background: black; padding:5px;box-shadow:0 3px 4px rgba(0,0,0,0.2);border:solid 1px crimson;'>Order details</h3>

		<p style='border:solid 2px black; border-width:0px; border-bottom-width:2px;width:45%'><b>Your name: $name</b></p>
		<p style='border:solid 2px black; border-width:0px; border-bottom-width:2px;width:45%'><b>Email: $email</b></p>
	   	<p style='border:solid 2px black; border-width:0px; border-bottom-width:2px;width:45%'><b>Number: $number</b></p>
	   <p style='border:solid 2px black; border-width:0px; border-bottom-width:2px;width:45%'><b>Address: $address</b></p>
	   	   	   <p style='border:solid 2px black; border-width:0px; border-bottom-width:2px;'><b>Items: $items</b></p>

	   <p style=''><b>Information:</b></p>
	  <p> $info</p>
	   <hr>
	   <small><b>Total cost (in rands)</b></small>
	   <button style='background: green; color:white; text-shadow: 0px 3px 6px rgba(0,0,0,0.6); border-radius: 5px;'> $totalCost </button>


	</div>
	<p>Please be patient, we will get back to you soon. Thank you for using commcycle.</p>
	<br> 
	<br> 
	<br>
	
	<small>Regards,</small>

		
		
		
		
		
		
		
		";
		
		return $message;
	
	
	
	}
	public function trialAddToCart(request $request,$page, $id){
		if($page == 'shop'){
			$foundItem = Shop::find($id); 
		}elseif($page == 'shopB'){
			$foundItem =NoPicShop::find($id);			
		}elseif($page == 'commcycle'){
			$foundItem =Free::find($id);			
		}elseif($page == 'commcycleB'){
			$foundItem =NoPicFree::find($id);			
		}elseif($page == 'ladyB'){
			$foundItem =Ladyb::find($id);			
		}

		$oldCart = Session::has('cart') ? Session::get('cart') : null; 
		$cart = new Cart($oldCart); 
		$cart->add($foundItem,$page, $id); 
		$request->session()->put('cart',$cart);
		Session::forget('msg');
		return back();	
	}

	public function goToCheckout(){
		$cart = Session::get('cart'); 
		return view('cart.checkout',['products' =>$cart->items]);
	}

	public function deleteCartItem($product_quantity ,$product_price,$id){

		$cart = Session::get('cart');
		unset($cart->items[$id]);
		$cart->quantity = $cart->quantity - $product_quantity;
		$cart->price = $cart->price - $product_price;
		if ($cart->quantity ==0){
			Session::forget('cart');
			return redirect('shop');
		}else{
			return redirect('showcart');
		}
	}

	public function checkout(request $request){
		$newOrder = new Order(); 
		$newSubscriber = new Subscribe();
		$newSubscriber->Email = $request->email; 
		$present = 0; 
		$oldSub = Subscribe::all(); 
		foreach($oldSub as $old){
			if($request->email == $old)
			{
				//do nothing 
				$present = 1;  
				break;
			}
		
		
		}
		if ($present == 0){
			$newSubscriber->save();
		}
		//$motherValues = new orderDetails();
		$cart = Session::get('cart');
		$newOrder->Name = $request->name;
		$newOrder->Email = $request->email;		
		$newOrder->Number = $request->number;
		$newOrder->reason = $request->reason;
		$newOrder->Items = "";
		$lborder = new LadyBorder(); 
		$lborder->Name = $request->name; 
		$lborder->Number = $request->number; 
		$lborder->Email = $request->email; 
		$lborder->Items = "";
		$lborder->Price = 0; 
		//save the ids of all the items that have been selected 
		$any_string ='';
		
		foreach($cart->items as $key =>$value){
			if(explode('->',$key)[1] !='ladyB'){
				if($any_string ==''){
					$any_string = $key;
				
				}else{

					$any_string .= ','.$key;
				
				
				}
			
			
			
			}		
		
		}
		
		$newOrder->itemIDs = $any_string; 
		
		foreach ($cart->items as $products) {
			$newOrder->Items = $newOrder->Items." , ".$products["Item"]["Item"]." - ".$products["Quantity"]." - ".$products["Item"]["Price"];
		}
		//look for ladyB items and send them to ladyB 
		foreach ($cart->items as $prod) {
			if($prod['shop']=='ladyB'){
				$lborder->Items = $lborder->Items." , ".$prod["Item"]["Item"]." - ".$prod["Quantity"]." - ".$prod["Item"]["Price"];
				$lborder->Price = $lborder->Price + $prod["Item"]["Price"];
			}
		}
		$lborder->Items = substr($lborder->Items,3); 
		$lborder->Address = $request->address; 

		
				//remove the first comma that my loop adds
		$newOrder->Items = substr($newOrder->Items,3);
		$newOrder->Address = $request->address;
		$newOrder->Price = $cart->price; 
		
		
		$headers = array('From: Commy-Messenger',
            
          			  'Content-Type: text/html; charset=iso-8859-1');
          			  
		if ($newOrder->save()){
			//$justSaved = Order::where(['Name'=>$newOrder->Name,'Items'=>$newOrder->Items,'Number'=>$newOrder->Number])->first();
			//$motherValues->order_id = $justSaved->id; 
			//$motherValues->save(); 
			
			foreach($cart->items as $prod){
				//verify that there is an order for lady B
				if($prod['shop'] =='ladyB'){
					$lborder->save(); 
					
					//email to ladyB 
                                  mail(
                                 'ceceburgs@gmail.com',
                                 "Your card ",$this->generateAdminOrder($request->name,$request->email,$request->number,$lborder->Price,$lborder->Items,$request->address,'Not for Lady-B'),
                                 implode("\r\n",$headers)                                 
                                 );
				break;
				}
				
				
			}
			
			
          			  
          			  //send email to admins 
          			  
          			  mail(
                                 'frimpong@commcycle.co',
                                 "New Order Card ",$this->generateAdminOrder($request->name,$request->email,$request->number,$cart->price,$newOrder->Items,$request->address,$request->reason),
                                 implode("\r\n",$headers)                                 
                                 );
                                  mail(
                                 'leroy@commcycle.co',
                                 "New Order Card ",$this->generateAdminOrder($request->name,$request->email,$request->number,$cart->price,$newOrder->Items,$request->address,$request->reason),
                                 implode("\r\n",$headers)                                 
                                 );
                                  mail(
                                 'soumaya@commcycle.co',
                                 "New Order Card",$this->generateAdminOrder($request->name,$request->email,$request->number,$cart->price,$newOrder->Items,$request->address,$request->reason),
                                 implode("\r\n",$headers)                                 
                                 );
                                  mail(
                                 'dennis@commcycle.co',
                                 "New Order Card ",$this->generateAdminOrder($request->name,$request->email,$request->number,$cart->price,$newOrder->Items,$request->address,$request->reason),
                                 implode("\r\n",$headers)                                 
                                 );
                                  mail(
                                 'gibson@commcycle.co',
                                 "New Order Card ",$this->generateAdminOrder($request->name,$request->email,$request->number,$cart->price,$newOrder->Items,$request->address,$request->reason),
                                 implode("\r\n",$headers)                                 
                                 );
                                  mail(
                                 'chris@commcycle.co',
                                 "New Order Card",$this->generateAdminOrder($request->name,$request->email,$request->number,$cart->price,$newOrder->Items,$request->address,$request->reason),
                                 implode("\r\n",$headers)                                 
                                 );
                                 
                                 
                                 
                                

                                 


                           
          			  
          			  
          			  //send email to orderer
                	mail(
                                 $request->email,
                                 "Your card ",$this->generateOrderCard($request->name,$request->email,$request->number,$cart->price,$newOrder->Items,$request->address,$request->reason),
                                 implode("\r\n",$headers)                                 
                                 );

						
			Session::forget('cart'); 
			Session::put('msg','You order has been placed!. You will here from us soon, keep calm and checkout other merchandise');
			return redirect('shop');
			//send email to ladyB here 
			
			//send email to admins to inform them of the order 

		}else{
			echo 'OOps your order could not be placed please try again';
		}			

	}



	public function continueShopping(){
		return redirect(Session::get('lastpage'));
	}

//-------------------------------------------------------------------------------------------------------------------------

	public function clearSession(){
		Session::flush();
	}

	
    public function showStuff(){

    	$ss = Session::get('cart'); 
       	foreach ($ss->items as $value) {
    		echo $value['shop'];
    		echo "<br>";
    	}

    	//print_r($request->session()->all());
    }

	 public function showCart(){
	 	$oldCart = Session::get('cart'); 
		$cart = new Cart($oldCart); 
		return view('cart.cart',['products'=>$cart->items , 'totalprice' =>$cart->price]);
	}
 //    public function addToCartShop(request $request,$id){
 //    	$request->session()->flush();
	// 	//create a shop object
	// 	$selectedItem = Shop::find($id); 
	// 	if ($request->session()->has($selectedItem->Item)){
 //    		$request->session()->put($selectedItem->Item.':'.'shop'.':'.$selectedItem->Price,0);
	// 			return redirect('show');
	// 	}else{
 //    		//save item details to session 
 //    		$request->session()->put($selectedItem->Item.':'.'shop'.':'.$selectedItem->Price,0);
	// 			return redirect('show');
 //    	}
	// }

	// public function addToCartShopB(request $request, $id){
	// 	$selectedItem = NoPicShop::find($id); 
	// 	if ($request->session()->has($selectedItem->Item)){
	// 			$request->session()->put($selectedItem->Item,Array('Page'=> 'shopB','Quantity'=>1,'Price'=>$selectedItem->Price));
	// 			return redirect('show');
	// 	}else{
 //    		//save item details to session 
 //    		$request->session()->put($selectedItem->Item,Array('Page'=>'shopB','Quantity'=>1,'Price'=>$selectedItem->Price));
 //    		return redirect('show');
 //    	}

	// }
	// public function addToCartCommcycleB(request $request, $id){
	// 		$selectedItem = NoPicFree::find($id); 
	// 		if ($request->session()->has($selectedItem->Item)){
	// 				$request->session()->put($selectedItem->Item,Array('Page'=> 'commcycleB','Quantity'=>1,'Price'=>0));
	// 				return redirect('show');
	// 		}else{
	//     		//save item details to session 
	//     		$request->session()->put($selectedItem->Item,Array('Page'=>'commcycleB','Quantity'=>1,'Price'=>0));
	//     		return redirect('show');
	//     	}

	// 	}	

	// public function addToCartCommcycle(request $request, $id){
	// 		$selectedItem = Free::find($id); 
	// 		if ($request->session()->has($selectedItem->Item)){
	// 				$request->session()->put($selectedItem->Item,Array('Page'=> 'commcycle','Quantity'=>1,'Price'=>0));
	// 				return redirect('show');
	// 		}else{
	//     		//save item details to session 
	//     		$request->session()->put($selectedItem->Item,Array('Page'=>'commcycle','Quantity'=>1,'Price'=>0));
	//     		return redirect('show');
	//     	}

	// 	}	

}
