<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Free as Free;
use App\NoPicFree;
use App\Subscribe;
use App\Shop;
use App\NoPicShop;
use App\Cart;
use App\Order;
use App\Ladyb; 
use App\Message; 
use App\Log;
use App\Deleted;
use App\User;
use Auth;
use App\lbNews;
use App\Transaction;

class AdminController extends Controller
{





	
	public function viewTransactions(){
		$admins = User::all();
	
		$trans = Transaction::orderBy('id','DESC')->paginate(100); 
		return view('admin-pages.transaction',compact('trans','admins'));
	}


	public function productUpload(Request $request){
	
	$newProd = new Free(); 
	
		if($request->hasFile('image')){
			$ext = $request->image->getClientOriginalExtension();
			$fileName = uniqid().'.'.$request->image->getClientOriginalExtension();
			  if( $ext=='jpeg' || $ext=='jpg' || $ext=='png' || $ext=='bmp' || $ext=='gif'|| $ext=='JPEG' || $ext=='JPG' || $ext=='PNG' || $ext=='BMP' || $ext=='GIF' ){
			  
			  $newProd->Item = $request->item; 
			  $newProd->Email = 'us@commcycle.co'; 
			  $newProd->Name = 'Commcycle'; 
			  $newProd->Brand = $request->options; 
			  $newProd->Category = 'OUR'; 
			  $newProd->Price = $request->price;
			  $newProd->Info ='Offered by commcycle';
			  if ($request->image->move('ourPictures',$fileName)){
		               $newProd->Pics ="ourPictures/".$fileName;
		               $newProd->save();
		               $admins = User::all();
				return view('admin-pages.ourProducts',compact("admins"))->with('Note','A new product is on sale');
	
			  		
			  	
			  }else{
			  	$admins = User::all();
				return view('admin-pages.ourProducts',compact("admins"));
			  }
	
			
		}else{
		
			$admins = User::all();
			return view('admin-pages.ourProducts',compact("admins"))->with('Note','No Image was selected');
		}
	  }
	
	
	
	}
	
	public function showOurProductsPage(){
		$admins = User::all(); 


		return view('admin-pages.ourProducts',compact('admins'));
	}
     public function emailOrderer(Request $request){
     
     	$log = new Log(); 
     	$log->happening = explode(':',Session::get('admin'))[0].' responded to an orderer via email ('.$request->email.')'; 
     	$log->save();
     
	  mail(
	 $request->email,
	 "Order response",$request->theBody,
	 "From: Commcycle-Admin-panel"                               
	 );
                                 
     	
     
     
     }

     public function changePassword(Request $request){
     	$admins = User::all(); 

     	$news = lbNews::find(2);
   	$user = User::where('name',explode(':',Session::get('admin'))[0])->first();
   	
   	   	if($user){
			if($user->password == $request->oldPassword){
				if($request->newPassword == $request->confirmPassword){
					if($user->update(['password' =>$request->confirmPassword])){
					//reset 'the admins' value
						$admins = User::all(); 

						Session::flash('changed ','Your password has been changed '.explode(':',Session::get('admin'))[0]); 
						foreach ($admins as $admin) {
            
					            if ($admin->name ==explode(':',Session::get('admin'))[0] && $admin->password == $request->confirmPassword){
					  
					                Session::put('admin',$admin->name.":".$admin->password);
					               return view('admin-pages.admin-profile',compact('admins','news'));

					            }
					        }
	     						
							
					} 
				}else{
				
				Session::flash('the-password-error','Sorry! '.explode(':',Session::get('admin'))[0].', your passwords do not match'); 
				
     				return view('admin-pages.admin-profile',compact('admins','news'));
	
				}	
			}else{
				Session::flash('the-password-error','Sorry! '.explode(':',Session::get('admin'))[0].', the password you entered does not match your old one.');      	
     				return view('admin-pages.admin-profile',compact('admins','news'));
			
			}
	   	}
     }
     
 	public function showAdminProfile(){
     	$admins = User::all(); 
     	
     	$news = lbNews::find(2); 
     	 if(Session::has('admin')){
        		return view('admin-pages.admin-profile',compact('admins','news'));

        
        }else{
        	return view('admin-pages.signin');

        
        }
    	
     
     }
     public function postNews(Request $request){
     	$news = lbNews::find(2); 
     	if($news){
     		$news->update(['News'=>$request->message]); 
     		$createLog = new Log();
     		$createLog->happening =explode(':',Session::get('admin'))[0].' posted to the news board';
		$createLog->save();
     		
     	}else{
     	
     	}
     	
     
     }
    public function adminAuthentication(request $request){
        $admins = User::all(); 
        $createLog = new Log();
        foreach ($admins as $admin) {
            
            if ($admin->name ==$request->adminName && $admin->password == $request->adminPassword){
                $createLog->happening = $admin->name." signed in!";
                $createLog->save();
                Session::put('admin',$admin->name.":".$admin->password);
                return redirect('admin');
            }
        }
        //if admin is not able to log in 
        Session::flash('therror','Your credentials are invalid. Either your Admin-name or Password is incorrect!');
        return redirect('admin-signin');


    }
    public function adminSignIn(){
    
        return view('admin-pages.signin');
    }
    public function adminLogout(){
        Session::forget('admin'); 
        return redirect('admin-signin');
    }
	
    
	public function communicate(request $request,$admin){
		$createLog = new Log();
		if ($request->allSubscribers=='1'){
			$subscribers = Subscribe::all(); 
			foreach ($subscribers as $subscriber) {
				//send email to all subscribers with title from request
				mail(
				$subscriber->Email,
				$request->title == null ? 'Hello' : $request->title,
	                    		$request->personmessage,
	                    		"From: Commcycle-Newsletter"
	                    		);			
	                    		
	                    		
	                    		}
		$createLog->happening =$admin.' sent a message to all commcycle subscribers.';
		$createLog->save();		
	
		return redirect('subscribers'); 

		}else{
			$email = $request->personemail;

			//send email to single email here 
			mail($email,$request->title == null ? 'Hello' : $request->title,
	                    		$request->personmessage,
	                    		"From: Commy-Messenger"
	                    		);

			$createLog->happening =$admin.' sent a message to '.$email;
			$createLog->save();					
			return redirect('subscribers');
		}
	}
    public function showAdminMain(){
    	//new Messages and Logs object 
    	$msgs = Message::orderBy('id','DESC')->paginate(50); 
    	$logs = Log::orderBy('id','DESC')->paginate(50);
        $admins = User::all();
        if(Session::has('admin')){
        	return view('admin-pages.index',['msgs' => $msgs, 'logs' =>$logs,'admins' =>$admins]);

        
        }else{
        	return view('admin-pages.signin');

        
        }
    	
     }

    public function showSubscribers(){
    	//new subscriber object 
    	$subscribers = Subscribe::orderBy('id','DESC')->paginate(50);
        $admins = User::all();  
    	return view('admin-pages.subscriber',compact('subscribers','admins'));
    }

    public function showOrders(){
    	$orders = Order::orderBy('id','DESC')->paginate(50);
        $admins = User::all(); 
        
        if(Session::has('admin')){
        	return view('admin-pages.orders',compact('orders','admins'));
        
        }else{
        	return view('admin-pages.signin');

        
        }
    	
    }

    public function showAdminCommItems(){
    	$free = Free::orderBy('id','DESC')->paginate(6); 
    	$freeNoPic = NoPicFree::orderBy('id','DESC')->paginate(50);
        $admins = User::all(); 
         if(Session::has('admin')){
        	return view('admin-pages.commcycleitems',['free' =>$free,'freeNoPic' =>$freeNoPic,'admins' =>$admins]);        
        }else{
        	return view('admin-pages.signin');

        
        }

        
    	
    }
    public function showAdminShopItems(){
    	$shop = Shop::orderBy('id','DESC')->paginate(6); 
    	$shopNoPic = NoPicShop::orderBy('id','DESC')->paginate(50);
        $admins = User::all(); 
        
         if(Session::has('admin')){
        	return view('admin-pages.shopitems',[ 'shop' => $shop , 'shopNoPic' => $shopNoPic,'admins' =>$admins ]);
   
        }else{
        	return view('admin-pages.signin');

        
        }
    }
    
    public function recordTransaction($admin,$id){
    	$founditem= Order::find($id); 
     	$createLog = new Log(); 
     	$createLog->happening = $admin.' completed the transaction for '.$founditem->Name."'s order! All necessary data have been recorded."; 
     	$trans = new Transaction();
     	$trans->adminName = $admin; 
     	$trans->shop = 'Commcycle'; 
     	$trans->item =$founditem->Items; 
     	$trans->money= $founditem->Price;
     	if ($createLog->save()){
     		if ($founditem->delete() & $trans->save()){
     			return redirect('admin');
     		}else{
     			$createLog->happening = $admin.' tried to delete '.$founditem->Name."'s order, but was unsuccessfull.";
     			if ($createLog->save()){
     				return redirect('admin');
     			} 
     		}

     	} 
    }

    public function deleteItem(request $request,$admin, $section, $id){
    	if($section =='commcycleB'){
    		$founditem = NoPicFree::find($id);
    	}elseif($section == 'commcycle'){
    		$founditem = Free::find($id);
    	}elseif($section == 'shop'){
    		$founditem = Shop::find($id);
    	}elseif($section == 'shopB'){
    		$founditem = NoPicShop::find($id);
    	}
    	$the_item_name = $founditem->Item;
    	$the_item_price = $founditem->Price;
    	$the_item_uploader=$founditem->Name;
    	$deletedObject = new Deleted();
    	$deletedObject->Name = $founditem->Name;
    	$deletedObject->Email = $founditem->Email;
    	$deletedObject->Item = $founditem->Item;
    	$deletedObject->Brand = $founditem->Brand;
    	$deletedObject->Category = $founditem->Category;
    	$deletedObject->Price = $founditem->Price;
    	$deletedObject->Pics = $founditem->Pics;
    	if ($deletedObject->save()){
    		unset($founditem->Pics);
    		if ($founditem->delete()){
    			$createLog = new Log();
    			$createLog->happening = $admin.' deleted '.$the_item_name.' with price '.$the_item_price.' ZAR uploaded by '.$the_item_uploader;
    			if($createLog->save()){
    				return redirect('admin');
    			}

    		}
    	}
    } 
        
    public function deleteOrder($admin,$id){
     	$founditem= Order::find($id); 
     	$createLog = new Log(); 
     	$createLog->happening = $admin.' deleted '.$founditem->Name."'s order!"; 
     	if ($createLog->save()){
     		if ($founditem->delete()){
     			return redirect('admin');
     		}else{
     			$createLog->happening = $admin.' tried to delete '.$founditem->Name."'s order, but was unsuccessfull.";
     			if ($createLog->save()){
     				return redirect('admin');
     			} 
     		}

     	} 
    	
    }
}
