<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Free;
use App\NoPicFree;
use Illuminate\Support\Facades\Storage;
use App\Subscribe;
use App\Shop;
use App\NoPicShop;
use App\Message;
use Session;
use App\lbNews;
Use App\Review;
Use App\Lost;

class CommcycleController extends Controller
{
    
    
    public function showDemo(){
        return view('commcycle-pages.demo-page');
    }
    public function showSim(){
         $path = '/home/leesoumaya/commcycle/public/assets/userImages';
       if(is_dir($path)){
          return $path.'exists';
              
        }else{
      		$path.' does not exist' ;
        }

    }
    
    
    public function createReview(Request $request){
    	$rev = new Review(); 
    	$rev->name = $request->name; 
    	$rev->text = $request->text;
    	$rev->rating = $request->rating;
    	
    	if($rev->save()){
    		$Lappy = Free::where(['Category'=>'OUR','Brand'=>'Laptop'])->orderBy('id','DESC')->paginate(4);
	    	$Car = Free::where(['Category'=>'OUR','Brand'=>'Carrier'])->orderBy('id','DESC')->paginate(4);
	    	$rev = Review::orderBy('id','DESC')->paginate(7);

    	return redirect()->route('create.review',compact('Lappy','Car','rev'));
}
    
    }
    
     public function lostfoundView($id){
    
    	$found = Lost::find($id); 
    	
    	return view('commcycle-pages.lost-view',compact('found'));
    }

    public function commyView($id){
    
    	$found = Free::find($id); 
    	
    	return view('commcycle-pages.commcycleproductview',compact('found'));
    }
     public function shopProdView($id){
    
    	$found = Shop::find($id); 
    	
    	return view('commcycle-pages.shop-product-view',compact('found'));
    }
    public function productView($id){
    
    	$found = Free::find($id); 
    	
    	return view('commcycle-pages.productView',compact('found'));
    }
    public function showProducts(){
    	$Lappy = Free::where(['Category'=>'OUR','Brand'=>'Laptop'])->orderBy('id','DESC')->paginate(4);
    	$Car = Free::where(['Category'=>'OUR','Brand'=>'Carrier'])->orderBy('id','DESC')->paginate(4);
    	$rev = Review::orderBy('id','DESC')->paginate(7);

    	return view('commcycle-pages.commyProducts',compact('Lappy','Car','rev'));
    
    }
    public function showLostFound(){
    
    	$requestPics = Lost::where(['type'=>'R', 'sorted'=>'0'])->orderBy('id','DESC')->paginate(4);
    	$found = Lost::where(['type'=>'F', 'sorted'=>'0'])->orderBy('id','DESC')->paginate(4);
    	return view('commcycle-pages.lostfound',compact('requestPics','found')); 
    
    
    }
     public function othersOnly(){
    	$others = Free::where('Category','Other')->orderBy('id','DESC')->paginate(4);
    	$free_items = Free::orderBy('id','DESC')->paginate(4);
        $news = lbNews::find(2);
        Session::put('category-chosen','Other');
        return view('commcycle-pages.commcycle',compact('free_items','news','others'));
    }

    public function gentsOnly(){
    	$gents = Free::where('Category','Gents')->orderBy('id','DESC')->paginate(4);
    	$free_items = Free::orderBy('id','DESC')->paginate(4);
        $news = lbNews::find(2);
      
        Session::put('category-chosen','Gents');
        return view('commcycle-pages.commcycle',compact('free_items','news','gents'));
    }
     public function ladiesOnly(){
    	$ladies = Free::where('Category','Ladies')->orderBy('id','DESC')->paginate(4);
    	$free_items = Free::orderBy('id','DESC')->paginate(4);
        $news = lbNews::find(2);
        
        Session::put('category-chosen','Ladies');
        return view('commcycle-pages.commcycle',compact('free_items','news','ladies'));
    }

    public function notYet(){
    	return view('not-yet');
    }


    public function sendMessage(request $request){

        $message = new Message(); 
        $message->Name = $request->Personname; 
        $message->Number = $request->Personnumber;
        $message->Email = $request->Personemail;
        $message->Message = $request->Personmessage;
        if ($message->save()){
            //send an email to admins here mail(
            
            $headers = array('From: Commy-Messenger',
            
            'Content-Type: text/html; charset=iso-8859-1'); 
            
           	                    mail("frimpong@commcycle.co",$request->Personname."'s message to commcycle",
	                    		$this->generateBody($request->Personmessage),
	                    		implode("\r\n",$headers)
	                    		);
	                    		mail("soumaya@commcycle.co",$request->Personname."'s message to commcycle",
	                    		$this->generateBody($request->Personmessage),
	                    		implode("\r\n",$headers)
	                    		);
	                    		mail("leroy@commcycle.co",$request->Personname."'s message to commcycle",
	                    		$this->generateBody($request->Personmessage),
	                    		implode("\r\n",$headers)
	                    		);
	                    		
	                    		


            //redirect to the about page 
            return redirect('aboutus');
        } 

    }
   
   public function generateBody($msg){
   
   	$message = '
   	<h1 style="text-shadow: 0px 2px 4px rgba(0,0,0,0.4);"><span style="color:deeppink">Dear</span> <span style="color:orange">Comm</span><span style="color:cyan">cycle<span>,</h1> 
            <hr>
	<p>'.$msg.'</p>
	<br> 
	<a  style="background:black; border:solid 1px orange; color:orange;text-decoration:none; border-radius:5px;padding:10px;">Admin</a>
		<br><br><br><br>
	<small>Regards,</small>';
   	
   	return $message;
   
   
   }
   
   
    public function showAbout(){
        return view('commcycle-pages.about');
    }

    public function subscribe(request $request){
    		$subscriber = new Subscribe();
    		//save subscriber email to the subscribe table 
    		$subscriber->Email = $request->subscribe;
    		$subscriber->save();
            return redirect('commcycle');
    }

    public function showNoPicShop(){
        $no_pic_items = NoPicShop::orderBy('id','DESC')->paginate(4); 
        return view('commcycle-pages.shopB',compact('no_pic_items'));
    }

    public function showShop(){
        $shop_items = Shop::orderBy('id','DESC')->paginate(4);
         $news = lbNews::find(2);
        return view('commcycle-pages.shop',compact('shop_items','news'));
    }

    public function showCommcycleShop(){
        $free_items = Free::where('Category','!=','OUR')->orderBy('id','DESC')->paginate(4);
        $news = lbNews::find(2);
        if(Session::has('category-chosen')){
        	Session::forget('category-chosen');
        
        }
        return view('commcycle-pages.commcycle',compact('free_items','news'));
    }

    public function showNoPicCommcycleShop(){
        $no_pic_items = NoPicFree::orderBy('id','DESC')->paginate(4); 
        return view('commcycle-pages.commcycleshopB',compact('no_pic_items'));
    }

}
