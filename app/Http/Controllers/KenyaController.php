<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Free;
use App\Review;
use App\DesignRequest;

class KenyaController extends Controller{


	public function saveRequest(Request $request){
		$design = new DesignRequest();
		$design->first_name = $request->first_name; 
		$design->last_name = $request->last_name;
		$design->contact_method = $request->contact_pref; 
		$design->phone = $request->phone; 
		$design->email= $request->email; 
		$design->description = $request->description; 
		if($design->save()){
			//send email 
			$headers = array('From: Commcycle-Mailer-Kenya',
            
          			  'Content-Type: text; charset=iso-8859-1');
			mail(
            		$request->email,"Commcycle Custom Designs",
            		"Dear $request->first_name, \nThis email is an indication that you request for a custom design has been sent.\nOur replies come latest by the second business day after sending your request.\nPlease be patient.\nAsante Sana!\n\nThank you for using commcyle.
				",
            		 implode("\r\n",$headers)
            		);
            		
            		
            		mail(
            		"pongofrimi@gmail.com","Request-Commcycle Custom Designs",
            		"$request->first_name needs a commcycle custom design. Communicate with them with this details. \nEmail: $request->email, Phone: $request->phone \nPrefered contact method: $request->contact_pref, \n When to be contacted: \n $request->description",
            		 implode("\r\n",$headers)
            		);
			return back();
		}
	}
	public function home(){
		$Lappy = Free::where(['Category'=>'OUR','Brand'=>'Laptop'])->orderBy('id','DESC')->paginate(4);
	    	$Car = Free::where(['Category'=>'OUR','Brand'=>'Carrier'])->orderBy('id','DESC')->paginate(4);
	    	$rev = Review::orderBy('id','DESC')->paginate(7);
	    	return view('kenya.index',compact('Lappy','Car','rev'));
	}
}