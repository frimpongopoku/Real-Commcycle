<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Lbadmin; 
use App\Log;
use Session;
use App\Subscribe;
use App\Ladyb;
use App\LadyBorder;
use App\Lblog;
use App\lbNews;
use App\Lbmsg;
use App\Deleted;

class LadyBController extends Controller
{



	public function lbView($id){
    
    		$found = Ladyb::find($id); 
    	
    	return view('ladyB.ladyB-view',compact('found'));
    }
  public function changePrice(Request $request){
  	$f = LadyB::find($request->id); 
  	$f->update(['Price'=>$request->newPrice + $request->newPrice *0.1]);
  	
  	return redirect('ladyB-stock');

  }
  public function deleteItem($admin,$id){
      $founditem = Ladyb::find($id);
      $the_item_name = $founditem->Item;
      $the_item_price = $founditem->Price;
      $deletedObject = new Deleted();
      $deletedObject->Name = $admin;
      $deletedObject->Email = 'Quantity:'.$founditem->Quantity;
      $deletedObject->Item = $founditem->Item;
      $deletedObject->Brand = 'Size:'.$founditem->Size;
      $deletedObject->Category = 'Info: '.$founditem->Info;
      $deletedObject->Price = $founditem->Price;
      $deletedObject->Pics = $founditem->Pics;
      if ($deletedObject->save()){
        if ($founditem->delete()){
          $createLog = new Lblog();
          $createLog->happening = $admin.' deleted '.$the_item_name.' with price ZAR '.$the_item_price;
          if($createLog->save()){
            return redirect('ladyB-office');
          }

        }
      }
  }
   public function sendMessage(request $request){

        $message = new Lbmsg(); 
        $message->Name = $request->Personname; 
        $message->Number = $request->Personnumber;
        $message->Email = $request->Personemail;
        $message->Message = $request->Personmessage;
        if ($message->save()){
            //send an email to ladyB here 
		mail("ceceburgs@gmail.com",$request->Personname."'s message to Lady-Burgesson",
	                    		$request->Personmessage,
	                    		"From: Commy-Messenger"
	                    		);
	       mail("frimpong@commcycle.co",$request->Personname."'s message to Lady-Burgesson",
	                    		$request->Personmessage,
	                    		"From: Commy-Messenger"
	                    		);
	       mail("soumaya@commcycle.co",$request->Personname."'s message to Lady-Burgesson",
	                    		$request->Personmessage,
	                    		"From: Commy-Messenger"
	                    		);
 		mail("leroy@commcycle.co",$request->Personname."'s message to Lady-Burgesson",
	                    		$request->Personmessage,
	                    		"From: Commy-Messenger"
	                    		);


            //redirect to the about page 
            return redirect('ladyB-main');
        } 

    }
  public function adminNewsPost(request $request){
    $news = lbNews::find(1); 
    $lblog = new Lblog();
    if($news->update(['News'=>$request->news])){
      $lblog->happening = explode(':',Session::get('lb-admin'))[0]." posted unto ladyB's news board";
      $lblog->save();
      return redirect('ladyB-office');
    } 

  }
  public function adminSignUp(request $request){
  
  
    if($request->password == $request->confirmPassword){
    		$log = new Lblog();
    	    $lbadmin = new Lbadmin(); 
	    $lbadmin->Name = $request->name;
	    $lbadmin->Email = $request->email;
	    $lbadmin->Password = $request->password;
	    if($request->superuser){
	      $lbadmin->userType = 'superuser';
	    }else{
	      $lbadmin->userType='';
	    }
	    if($lbadmin->save()){
	    	$log->happening = explode(':',Session::get('lb-admin'))[0].' signed '. $request->name .' up as a ladyB admin.'; 
	    	$log->save();
	      return redirect('ladyB-profile');
	    }else{
	      echo 'New Ladyb admin could not be signed up <a href="ladyB-profile">go back</a>"';
	    }
    
    }else{
    	echo 'Passwords for new Lady-B admin sign up do not match! <a href="ladyB-profile">go back</a>"';
    
    }
    
  }

  public function adminPasswordChange(request $request ,$id){
    $lbadmin = Lbadmin::find($id); 
    if ($lbadmin->Password == $request->oldPassword){
      if($request->newPassword == $request->confirmPassword){
        if($lbadmin->update(['Password' => $request->newPassword])){
          echo 'Your password has been changed';
          Session::put('lb-admin',$lbadmin->Name.":".$lbadmin->Password);
          return redirect('ladyB-profile');
          //show some notification
        }
      }else{
        echo "The new passwords do not match";
      }
    }else{
      echo 'You password does not match your old one.';
    }
  }
  public function getProfile(){
    $admins = Lbadmin::all();
    return view('ladyB.ladyB-adminprofile',compact('admins'));
  }

   public function index(){
   	return view('ladyB.index');

   }

   public function signOut(){
    Session::forget('lb-admin');
    Session::forget('lb-admin-type');
    Session::forget('lb-admin-id');
    return redirect('ladyB-sign-in');
   }
   
   public function showOrders(){
   		$admins = Lbadmin::all(); 
   		$orders = LadyBorder::orderBy('id','DESC')->paginate(50);
   	return view('ladyB.ladyB-orders',compact('admins','orders'));
   }
   public function showShop(){
      $ladybs = Ladyb::orderBy('id','DESC')->paginate(4); 
      $news = lbNews::find(1);    
   	return view('ladyB.ladyBshop',compact('ladybs','news'));
   }

  public function showMainOffice(){
  	$admins = Lbadmin::all();
    $msgs = Lbmsg::orderBy('id','DESC')->paginate(50);
    $logs = Lblog::orderBy('id','DESC')->paginate(50);
  	return view('ladyB.ladyB-admin',compact('admins','logs','msgs'));
  }

  public function showSignIn(){
    Session::forget('lb-admin');
    Session::forget('lb-admin-type');
    Session::forget('lb-admin-id');
  	return view('ladyB.ladyB-signin');
  }

  public function showStock(){
  	$admins = Lbadmin::all(); 
  	$lbs = Ladyb::orderBy('id','DESC')->paginate(6);
  	return view('ladyB.stock',compact('lbs','admins'));
  }
  public function deleteOrder($admin,$id){
    $lborder = LadyBorder::find($id); 
    $lblog = new Lblog();

    if ($lborder->delete()){
      $lblog->happening = $admin." deleted ".$lborder->Name."'s order worth ZAR ".$lborder->Price; 
      $lblog->save();
      return redirect('ladyB-order'); 

    }else{
      //even if it fails still return to that same ladyB-order page
      return redirect('ladyB-order'); 
      
    }

  }

  public function adminSignIn(request $request){
  	$admins = Lbadmin::all(); 
  	//$miniAdmins =Lbadmin::where('userType','!=','superuser');
    $lbmsgs = Lbmsg::orderBy('id','DESC')->paginate(50);
    $createLog = new Log();
    $createLBLog = new Lblog();
    $logs = Lblog::orderBy('id','DESC')->paginate(50);
        foreach ($admins as $admin) {
            if ($admin->Name ==$request->adminName && $admin->Password == $request->adminPassword){
                $createLog->happening = $admin->Name." signed in to ladyB's section!";
                $createLBLog->happening = $admin->Name." signed in to ladyB's admins office!";
                $createLog->save();
                $createLBLog->save();
                Session::put('lb-admin',$admin->Name.":".$admin->Password);
                //Session::put('lb-unsuper-admins',$miniAdmins);
                Session::put('lb-admin-id',$admin->id); 
                Session::put('lb-admin-type',$admin->userType);
                return view('ladyB.ladyB-admin',['logs'=>$logs,'admins'=>$admins,'msgs'=>$lbmsgs]);
            }
        }
        //stay on the sign in page if credentials are not valid
        Session::flash('therror','Your credentials are invalid. Either your Admin-name or Password is incorrect!');
        return redirect('ladyB-sign-in');
  }

  public function showUploadCenter(){
  	$admins = Lbadmin::all(); 
  	$subscribers = Subscribe::all();
  	return view('ladyB.upload-center',compact('admins','subscribers'));

  }

}
