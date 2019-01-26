<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Log;
use Session;
use App\Lbmsg;
use App\Security;
use App\Lost;
use App\Message; 
class SecurityController extends Controller
{
			
			
	public function doMessaging(Request $request){
		$msg = new Message(); 
		$log = new Log();
		$msg->title = "Security: ".$request->title; 
		$msg->Message = $request->personmessage;
		$msg->name = 'Security'; 
		if($msg->save()){
			$log->happening = session::get('security-admin')->name." sent commcycle a message ";
			$log->type = "S"; 
			$log->save(); 
			
			mail('frimpong@commcycle.co',"Security: ".$request->title,
	                    		$request->personmessage,
	                    		"From: Commy-Messenger"
	                    		);

			mail('leroy@commcycle.co',"Security: ".$request->title,
	                    		$request->personmessage,
	                    		"From: Commy-Messenger"
	                    		);
	               mail('soumaya@commcycle.co',"Security: ".$request->title,
	                    		$request->personmessage,
	                    		"From: Commy-Messenger"
	                    		);
			return redirect()->route('security.main');
			
		}
					
	}
	public function messageUs(){
	
		if(session::has('security-admin')){
			return view('admin-pages.security.message');
		}else{
		
			return redirect()->route('sec.login');
		}
		
	}
			
	public function doDeclare(Request $request){
		$log = new Log(); 
		$admin = session::get('security-admin');
		$itemID = $request->itemID; 
		
		$found = Lost::find($itemID); 
			if($found->update(['sorted'=>1,'details'=>$request->details])){
				$log->happening = $admin->name . " sorted '". $found->Item."'"." out." ; 
				$log->type='S';
				$log->save();
				
				return redirect()->route('security.main');
			
			}
		
		
	
	}
	
	
	public function showItems(){
	
		if(session::has('security-admin')){
			
			
			$Lost = Lost::where(['type'=>'R','sorted'=>0])->orderBy('id','DESC')->paginate(4); 
			$found = Lost::where(['type'=>'F','sorted'=>0])->orderBy('id','DESC')->paginate(4); 
			
			return view('admin-pages.security.lostandfound',compact('Lost','found'));
			
			
		}else{
			return redirect()->route("sec.login");
		}
	
	
	}
	
	public function logout(){
	
		session::forget('security-admin'); 
		return redirect()->route('sec.login'); 
		
		
	}
	public function doSignup(Request $request){
		$adminName = $request->adminSecName; 
		$adminNumber = $request->adminSecNumber; 
		$adminEmail = $request->adminSecEmail; 
		$adminPassword = $request->adminSecPassword; 
		$adminConfPassword = $request->adminSecConfirmPassword; 
		
		if($adminPassword !="" && $adminName !="" && $adminEmail !="" && $adminNumber !="" && $adminConfPassword !=""){
			if($adminPassword == $adminConfPassword){
				$newSec = new Security(); 
				$newSec->name = $adminName; 
				$newSec->number = $adminNumber; 
				$newSec->email = $adminEmail; 
				$newSec->password = $adminPassword; 
				if($newSec->save()){
				
					$found = Security::where(['name'=> $adminName, 'password' =>$adminPassword , 'email'=>$adminEmail])->first();
					$logs = Log::where('type','S')->orderBy('id','DESC')->paginate(50); 
					session::put('security-admin',$found); 
					return redirect()->route('security.main',compact('logs'));
				
				}else{
					return redirect()->route('sec.signup')->with('the-error','Sorry, for some reason You were could not be signed up!');				
				}
				
			}else{
				return redirect()->route('sec.signup')->with('the-error','Sorry, your passwords do not match!');
			
			}
		
		
		}else{
		
			return route('sec.signup')->with('the-error','Please make sure you filled all parameters');
		
		}
	
	}
	
	public function signup(){
	
		return view('admin-pages.security.signup');
		
	}
	
	
	public function doLogin(Request $request){
		$log = new Log(); 
		
		$everyone = Security::all(); 
		$found = Security::where(['name'=> $request->adminName, 'password' =>$request->adminPassword  ])->first();
		if ($found){
			$log->happening = $request->adminName." signed in ";
			$log->type="S";
			$log->save();
			$logs = Log::where('type','S')->orderBy('id','DESC')->paginate(50); 
			session::put('security-admin',$found);
			return redirect()->route('security.main', compact('logs'));
			
		}else{
			return back()->with('the-error',"Invalid credentials, please try again!");
		
		}
		
		
		
		
				
	}
	public function login(){
	
		return view('admin-pages.security.login');
	}
	
	public function showLostFound(){
	
		
		if(session::has('security-admin')){
			$logs = Log::where('type','S')->orderBy('id','DESC')->paginate(50); 
			return view('admin-pages.security.index',compact('logs'));
		}else{
			return redirect()->route("sec.login");
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}