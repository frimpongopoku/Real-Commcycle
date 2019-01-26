<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Free;
use App\NoPicFree;
use App\Subscribe;
use App\Shop;
use App\NoPicShop;
use App\Message;
use Session;
use Image; 
use App\Lblog;
use App\Ladyb;
use App\Lost;

class UploadController extends Controller
{




	

	public function reqUpload(Request $request){
		if($request->picture =='yes'){
			if($request->hasfile('image')){
				$ext = $request->image->getClientOriginalExtension();
				 if( $ext=='jpeg' || $ext=='jpg' || $ext=='png' || $ext=='bmp' || $ext=='gif'|| $ext=='JPEG' || $ext=='JPG' || $ext=='PNG' || $ext=='BMP' || $ext=='GIF' ){
				 
				 	$fileName = uniqid().'.'.$request->image->getClientOriginalExtension();
				 	$req = new Lost(); 
				 	$req->name = $request->name; 
				 	$req->email = $request->email; 
				 	$req->info = $request->info; 
				 	$req->item = $request->item;
				 	$req->type='R';
				 	$fileName = uniqid().$request->image->getClientOriginalName();
				 	if ($request->image->move('lfImages',$fileName)){
				 		$req->Pics = "lfImages/".$fileName;
				 		if($req->save()){
				 		
				 		//send an email to sender 
				 		
				 			mail(
			                    		$req->email,'SHARE YOUR UPLOAD',
			                    		"You lost ".$req->item.", please do share on facebook, to complete the task.\n \nThanks for using commcycle.",
			                    		"From: Lost-And-Found"
			                    		);
		
				 		//send an email to commcycle
				 		
				 		
				 			mail(
			                    		"frimpong@commcycle.co",$request->name." lost ".$req->item,
			                    		"INFO: \n ".$req->info."\n CHECK IF THE POST HAS NOT BEEN SHARED YET! \n Email: ".$req->email,
			                    		"From: Lost-And-Found"
			                    		);
			                    		mail(
			                    		"soumaya@commcycle.co",$request->name." lost ".$req->item,
			                    		"INFO: \n ".$req->info."\n CHECK IF THE POST HAS NOT BEEN SHARED YET! \n Email: ".$req->email,
			                    		"From: Lost-And-Found"
			                    		);
			                    		mail(
			                    		"leroy@commcycle.co",$request->name." lost ".$req->item,
			                    		"INFO: \n ".$req->info."\n CHECK IF THE POST HAS NOT BEEN SHARED YET! \n Email: ".$req->email,
			                    		"From: Lost-And-Found"
			                    		);
		
						 	$requestPics = Lost::where(['type'=>'R', 'sorted'=>'0'])->orderBy('id','DESC')->paginate(10);
						    	$found = Lost::where(['type'=>'F', 'sorted'=>'0'])->orderBy('id','DESC')->paginate(10);
						    	return redirect()->route('lost',compact('requestPics','found'));					 						 		
				 		}
				 	}
				 }else{//if the picture is not the right format
				 	echo "You did not select any image. You selected a ".$ext." file";
               				 echo " <p class='alert alert-warning'><a href='".Session::get('lastpage')."'>Go back</a></p>";
				 }
			}else{//if the user does not select an image
				
			
			}
		}else{//if upload is a no picture type
		
			$req = new Lost(); 
		 	$req->name = $request->name; 
		 	$req->email = $request->email; 
		 	$req->info = $request->info; 
		 	$req->item = $request->item;
		 	$req->type='R';
		 	$req->Pics='lfImages/blue.jpg';
		 	if($req->save()){
		 	//send an email to sender 
				 		
	 			mail(
	            		$req->email,'SHARE YOUR UPLOAD',
	            		"You lost ".$req->item.", please do share on facebook, to complete the task.\n \nThanks for using commcycle.",
	            		"From: Lost-And-Found"
	            		);
	
	 		//send an email to commcycle
	 		
	 		
	 			mail(
	            		"frimpong@commcycle.co",$request->name." lost ".$req->item,
	            		"INFO: \n ".$req->info."\n CHECK IF THE POST HAS BEEN SHARED! \n Email: ".$req->email,
	            		"From: Lost-And-Found"
	            		);
	            		mail(
	            		"leroy@commcycle.co",$request->name." lost ".$req->item,
	            		"INFO: \n ".$req->info."\n CHECK IF THE POST HAS BEEN SHARED! \n Email: ".$req->email,
	            		"From: Lost-And-Found"
	            		);
	            		mail(
	            		"soumaya@commcycle.co",$request->name." lost ".$req->item,
	            		"INFO: \n ".$req->info."\n CHECK IF THE POST HAS BEEN SHARED! \n Email: ".$req->email,
	            		"From: Lost-And-Found"
	            		);


	
			 	$requestPics = Lost::where(['type'=>'R', 'sorted'=>'0'])->orderBy('id','DESC')->paginate(10);
			    	$found = Lost::where(['type'=>'F', 'sorted'=>'0'])->orderBy('id','DESC')->paginate(10);
			    	return redirect()->route('lost',compact('requestPics','found'));	
	
	
		 	
		 	
		 	}
		}

				 
				
		
		
		
}
	
	public function foundUpload(Request $request){
	
		$adminEmails = 				['frimpong@commcycle.co','leroy@commcycle.co','soumaya@commcycle.co','gibson@commcycle.co','chris@commcycle.co','dennis@commcycle.co'];
		if($request->fpicture =='yes'){
			if($request->hasfile('fimage')){
				$ext = $request->fimage->getClientOriginalExtension();
				 if( $ext=='jpeg' || $ext=='jpg' || $ext=='png' || $ext=='bmp' || $ext=='gif'|| $ext=='JPEG' || $ext=='JPG' || $ext=='PNG' || $ext=='BMP' || $ext=='GIF' ){
				 
				 	$fileName = uniqid().'.'.$request->fimage->getClientOriginalExtension();
				 	$req = new Lost(); 
				 	$req->name = $request->fname; 
				 	$req->email = $request->femail; 
				 	$req->info = $request->finfo; 
				 	$req->item = $request->fitem;
				 	$req->type='F';
				 	$fileName = uniqid().$request->fimage->getClientOriginalName();
				 	if ($request->fimage->move('lfImages',$fileName)){
				 		$req->Pics = "lfImages/".$fileName;
				 		
				 		if($req->save()){
				 		//send an email
				 			//send an email to sender 
				 		
				 			mail(
			                    		$req->email,'Share your upload',
			                    		"You lost ".$req->item.", please do share on facebook, to complete the task.\n \nThanks for using commcycle. \n\n Use: commcycle.co/item-view/".$req->id." to share.",
			                    		"From: Lost And Found"
			                    		);
		
				 		//send an email to commcycle
				 		
				 		foreach($adminEmails as $me){
				 			mail(
			                    		$me,$request->name." found ".$req->item,
			                    		"INFO: \n ".$req->info."\n CHECK IF THE POST HAS NOT BEEN SHARED YET! \n Email: ".$req->email,
			                    		"From: Lost And Found"
			                    		);
				 			
				 		}
				 			
				 		
				 		
				 		
				 			$requestPics = Lost::where(['type'=>'R', 'sorted'=>'0'])->orderBy('id','DESC')->paginate(10);
						    	$found = Lost::where(['type'=>'F', 'sorted'=>'0'])->orderBy('id','DESC')->paginate(10);
						    	return redirect()->route('lost',compact('requestPics','found'));
					 		
				 		}
				 	}
				 }else{//if the picture is not the right format
				 	echo "You did not select any image. You selected a ".$ext." file";
               				 echo " <p class='alert alert-warning'><a href='".Session::get('lastpage')."'>Go back</a></p>";
				 }
			}else{//if the user does not select an image
				
			
			}
		}else{//if upload is a no picture type
		
			$req = new Lost(); 
		 	$req->name = $request->fname; 
		 	$req->email = $request->femail; 
		 	$req->info = $request->finfo; 
		 	$req->item = $request->fitem;
		 	$req->type='F';	
		 	$req->Pics='lfImages/maroon.png';	
		 	if($req->save()){
		 		//send an email to sender 
				 		
				 			mail(
			                    		$req->email,'SHARE YOUR UPLOAD',
			                    		"You lost ".$req->item.", please do share on facebook, to complete the task.\n \nThanks for using commcycle.",
			                    		"From: Lost And Found"
			                    		);
		
				 		//send an email to commcycle
				 		
				 		
				 			mail(
			                    		"frimpong@commcycle.co",$request->name." found ".$req->item,
			                    		"INFO: \n ".$req->info."\n CHECK IF THE POST HAS NOT BEEN SHARED YET! \n Email: ".$req->email,
			                    		"From: Lost And Found"
			                    		);
			                    		mail(
			                    		"leroy@commcycle.co",$request->name." found ".$req->item,
			                    		"INFO: \n ".$req->info."\n CHECK IF THE POST HAS NOT BEEN SHARED YET! \n Email: ".$req->email,
			                    		"From: Lost And Found"
			                    		);
			                    		mail(
			                    		"soumaya@commcycle.co",$request->name." found ".$req->item,
			                    		"INFO: \n ".$req->info."\n CHECK IF THE POST HAS NOT BEEN SHARED YET! \n Email: ".$req->email,
			                    		"From: Lost And Found"
			                    		);

		 	
		 	
		 		$requestPics = Lost::where(['type'=>'R', 'sorted'=>'0'])->orderBy('id','DESC')->paginate(10);
			    	$found = Lost::where(['type'=>'F', 'sorted'=>'0'])->orderBy('id','DESC')->paginate(10);
			    	return redirect()->route('lost',compact('requestPics','found'));

 	
		 		}
		 	
		 	}
	
	
	
	}
public function generateBodyAlternate($name,$email,$itemName,$itemBrand,$itemPrice,$itemCategory,$info){
$message = "


<center>
	<h1 style='color:blue;text-shadow: 0px 3px 6px rgba(0,0,0,0.3);'>New upload</h1> 
		<p><b>$name, uploaded $itemName<hr> </b></p>
	<h5 style='margin-bottom:10px'><span style='border:solid 2px crimson;border-radius:5px; padding:5px;background:black; color:white'>Name: $name</span></h5>
	<h5 style='margin-bottom:10px'><span style='border:solid 2px crimson; border-radius:5px; padding:5px;background:black; color:white'>Email: $email</span></h5>
	<h5 style='margin-bottom:10px'><span style='border:solid 2px black;border-radius:5px; padding:5px;background:white; color:black'>Item-Name: $itemName</span></h5>
	<h5 style='margin-bottom:10px'><span style='border:solid 2px black;border-radius:5px; padding:5px;background:white; color:black'>Item-Category: $itemCategory</span></h5>

	<h5 style='margin-bottom:10px'><span style='border:solid 2px black; margin-bottom:10px;border-radius:5px; padding:5px;background:white; color:black'>Item-Brand: $itemBrand</span></h5>
		<h5 style='margin-bottom:10px'><span style='border:solid 2px black; margin-bottom:10px; border-radius:5px; padding:5px;background:white; color:black'>Price: <span style='color:green'>$itemPrice</span></span></h5>

<hr style='border:dotted 2px black;'>
	<p style='color:red'>No pic section in commcycle</p>

	<br>
	</center>
	<small>Regards,</small>




";

return $message;


}


public function generateBody($name,$email,$itemName,$itemBrand,$itemPrice,$itemCategory,$picName,$info){

$message = "


<center>
	<h1 style='color:blue;text-shadow: 0px 3px 6px rgba(0,0,0,0.3);'>New upload</h1> 
		<p><b>$name, uploaded $itemName<hr> </b></p>
	<h5 style='margin-bottom:10px'><span style='border:solid 2px crimson;border-radius:5px; padding:5px;background:black; color:white'>Name: $name</span></h5>
	<h5 style='margin-bottom:10px'><span style='border:solid 2px crimson; border-radius:5px; padding:5px;background:black; color:white'>Email: $email</span></h5>
	<h5 style='margin-bottom:10px'><span style='border:solid 2px black;border-radius:5px; padding:5px;background:white; color:black'>Item-Name: $itemName</span></h5>
	<h5 style='margin-bottom:10px'><span style='border:solid 2px black;border-radius:5px; padding:5px;background:white; color:black'>Item-Category: $itemCategory</span></h5>

	<h5 style='margin-bottom:10px'><span style='border:solid 2px black; margin-bottom:10px;border-radius:5px; padding:5px;background:white; color:black'>Item-Brand: $itemBrand</span></h5>
		<h5 style='margin-bottom:10px'><span style='border:solid 2px black; margin-bottom:10px; border-radius:5px; padding:5px;background:white; color:black'>Price: <span style='color:green'>$itemPrice</span></span></h5>

<hr style='border:dotted 2px black;'>

<p><b>Uploader's information:</b><br> $info</p><br>
	<p style='color:red'>If there is a need to edit this upload, find this image <h5><span style='border:solid 2px black; border-radius:5px; padding:5px;background:orange; color:black'>$picName</span></h5></p>

	<br>
	</center>
	<small>Regards,</small>




";

return $message;


}
	 public function uploadFree(request $request){
        //save all user inputs temporarily so they can be reloaded if anything goes wrong.
        Session::put('old',['Name'=>$request->name,'Email'=>$request->email,'ItemName'=>$request->itemName,'ItemBrand'=>$request->itemBrand,'Info'=>$request->info,'Price'=>'','Size'=>'']);
    	if ($request->finalise == "finalise" && $request->hasFile('image')){
            $ext = $request->image->getClientOriginalExtension();
            if( $ext=='jpeg' || $ext=='jpg' || $ext=='png' || $ext=='bmp' || $ext=='gif'|| $ext=='JPEG' || $ext=='JPG' || $ext=='PNG' || $ext=='BMP' || $ext=='GIF' ){
        		//upload the image
        		$fileName = uniqid().'.'.$request->image->getClientOriginalExtension();
        			$free = new Free();
        			$free->Name = $request->name;
        			$free->Email = $request->email;
        			$free->Item = $request->itemName;
        			$free->Brand = $request->itemBrand;
        			$free->Category = $request->categoryBox; 
        			$free->info = $request->info;
        			$fileName = uniqid().$request->image->getClientOriginalName();
        			if ($request->image->move('userImages',$fileName)){
	                    $free->Pics ="userImages/".$fileName;
	                    if($free->save()){
	                    	//send an email here
	                    	 $headers = array('From: Commy-Messenger',
            
          			  'Content-Type: text/html; charset=iso-8859-1'); 

	                    	
	                    	//send an email if the image is too large
	                    	if($request->image->getClientSize() >1990000){
	                    		mail(
	                    		"mrfimpong@gmail.com",$request->name."'s huge ass image",
	                    		"This file 'userImages/".$fileName."' is huge.\n Do something!",
	                    		"From: Upload-center"
	                    		);
	                    	}

                                 mail(
                                 "frimpong@commcycle.co",
                                 "New upload by ".$request->name,$this->generateBody($request->name,$request->email,$request->itemName,$request->itemBrand,'Free',$request->categoryBox,$free->Pics,$request->info),
                                 implode("\r\n",$headers)                                 
                                 );
                                  mail(
                                 "soumaya@commcycle.co",
                                 "New upload by ".$request->name,$this->generateBody($request->name,$request->email,$request->itemName,$request->itemBrand,'Free',$request->categoryBox,$free->Pics,$request->info),
                                 implode("\r\n",$headers)                                 );
                                 mail(
                                 "leroy@commcycle.co",
                                 "New upload by ".$request->name,$this->generateBody($request->name,$request->email,$request->itemName,$request->itemBrand,'Free',$request->categoryBox,$free->Pics,$request->info),
                                 implode("\r\n",$headers)                                );


                                 //to the uploader
                                 mail(
	                    		$request->email,"I smell success in the air",
	                    		"Hi ".$request->name.",\n You have successfully uploaded ".$request->itemName.
	                    		".\n You are too kind, keep using commcycle to show your kindness. \n Thank you very much!\nشكرا , Asante, Y3daase.",
	                    		"From: Commcycle-free"
	                    		);
                                 
	                        Session::forget('old');
	                        return redirect(Session::get('lastpage'));
	                    }
	        		}
	
            }else{
                echo "You did not select any image. You selected a ".$ext." file";
                echo " <p class='alert alert-warning'><a href='".Session::get('lastpage')."'>Go back</a></p>";
            }
         //--------------------------------------------------------------------------------------------------------------
    	}else if($request->alternate=='alternate'){
    		$free = new NoPicFree();
    		$free->Name = $request->name;
			$free->Email = $request->email;
			$free->Item = $request->itemName;
			$free->Brand = $request->itemBrand;
			$free->Category = $request->categoryBox; 
			$free->info = $request->info; 
			if ($free->save()){
                	//send an email here
                	$headers = array('From: Commy-Messenger',
            
          			  'Content-Type: text/html; charset=iso-8859-1');
                	mail(
                                 'frimpong@commcycle.co',
                                 "New upload by ".$request->name,$this->generateBodyAlternate($request->name,$request->email,$request->itemName,$request->itemBrand,'Free',$request->categoryBox,$request->info),
                                 implode("\r\n",$headers)                                 
                                 );
                                 mail(
                                  "leroy@commcycle.co",
                                 "New upload by ".$request->name,$this->generateBodyAlternate($request->name,$request->email,$request->itemName,$request->itemBrand,'Free',$request->categoryBox,$request->info),
                                 implode("\r\n",$headers)                                 
                                 );
                                 mail(
                                  "soumaya@commcycle.co",
                                 "New upload by ".$request->name,$this->generateBodyAlternate($request->name,$request->email,$request->itemName,$request->itemBrand,'Free',$request->categoryBox,$request->info),
                                 implode("\r\n",$headers)                                 
                                 );

                                 //to the uploader
                                 mail(
	                    		$request->email,"I smell success in the air",
	                    		"Hi ".$request->name.",\n You have successfully uploaded ".$request->itemName.
	                    		".\n You are too kind, keep using commcycle to show your kindness. \n Thank you very much!\nشكرا , Asante, Y3daase.",
	                    		"From: Commcycle-free-B"
	                    		);
                
                
				return redirect(Session::get('lastpage'));
			}
    	}else{
    		if ($request->finalise=='finalise'){

    			echo "<div class='container'>
    					<p class='alert alert-warning'>You did not select any image <a href='".Session::get('lastpage')."'>Go back</a></p>
					  </div>";
    		}else{
    			return redirect(Session::get('lastpage'));
    		}
    	}
    }
    
   

    public function uploadShop(request $request){
        Session::put('old',['Name'=>$request->name,'Email'=>$request->email,'ItemName'=>$request->itemName,'ItemBrand'=>$request->itemBrand,'Info'=>'','Price'=>$request->price,'Size'=>$request->size]);
        if ($request->finalise == "finalise" && $request->hasFile('image')){
            $ext = $request->image->getClientOriginalExtension();
            //check if selected file is an image
            if( $ext=='jpeg' || $ext=='jpg' || $ext=='png' || $ext=='bmp' || $ext=='gif'|| $ext=='JPEG' || $ext=='JPG' || $ext=='PNG' || $ext=='BMP' || $ext=='GIF' ){
                //upload the image
                $fileName = uniqid().'.'.$request->image->getClientOriginalExtension();
        			$shop = new Shop();
                    $shop->Name = $request->name;
                    $shop->Email = $request->email;
                    $shop->Item = $request->itemName;
                    //check if the item has size and add it to the brand
                    if ($request->size ==""){
                        $shop->Brand = $request->itemBrand;
                    }else{
                         $shop->Brand = $request->itemBrand." [ Size: ".$request->size."]";
                    }
                    $shop->Category = $request->categoryBox; 
                    $shop->Price = $request->price + $request->price * 0.1;
	                if ($request->image->move('userImages',$fileName)){
	                    $shop->Pics = "userImages/".$fileName;
	                    if ($shop->save()){
	                        //send an email if the image is too large
	                    	if($request->image->getClientSize() >1990000){
	                    		mail(
	                    		"mrfimpong@gmail.com",$request->name."'s huge ass image",
	                    		"This file 'userImages/".$fileName."' is huge.\n Do something!",
	                    		"From: Upload-center"
	                    		);
	                    	}

                                 $headers = array('From: Commy-Messenger',
            
          			  'Content-Type: text/html; charset=iso-8859-1');
          			   mail(
                                 "frimpong@commcycle.co",
                                 "New upload by ".$request->name,$this->generateBody($request->name,$request->email,$request->itemName,$request->itemBrand,$shop->Price,$request->categoryBox,$shop->Pics,'Empty'),
                                 implode("\r\n",$headers)                                 
                                 );
                                   mail(
                                 "soumaya@commcycle.co",
                                 "New upload by ".$request->name,$this->generateBody($request->name,$request->email,$request->itemName,$request->itemBrand,$shop->Price,$request->categoryBox,$shop->Pics,'Empty'),
                                 implode("\r\n",$headers)                                 
                                 );

  mail(
                                 "leroy@commcycle.co",
                                 "New upload by ".$request->name,$this->generateBody($request->name,$request->email,$request->itemName,$request->itemBrand,$shop->Price,$request->categoryBox,$shop->Pics,'Empty'),
                                 implode("\r\n",$headers)                                 
                                 );

				
                                 //to the uploader
                                 mail(
	                    		$request->email,"I smell success in the air",
	                    		"Hi ".$request->name.",\n You have successfully uploaded ".$request->itemName.
	                    		".\nKeep using commcycle to sell! \n Thank you very much!\nشكرا , Asante, Y3daase.",
	                    		"From: Commcycle-shop"
	                    		);


	                        Session::forget('old');
	                        return redirect('shop');
	                    }
	                }
	            
            }else{
                 echo "You did not select any image. You selected a ". $ext." file";
                echo " <p class='alert alert-warning'><a href='".Session::get('lastpage')."'>Go back</a></p>";
            }
           //-----------------------------------------------------------------------------------------------------------
        }else if($request->alternate=='alternate'){
            $shop = new NoPicShop();
            $shop->Name = $request->name;
            $shop->Email = $request->email;
            $shop->Item = $request->itemName;
            //check if th time has size and add it to the brand
             if ($request->size ==""){
                    $shop->Brand = $request->itemBrand;
                }else{
                     $shop->Brand = $request->itemBrand." [ Size: ".$request->size."]";
                }            
            $shop->Category = $request->categoryBox; 
            $shop->Price = $request->price + $request->price * 0.1;
            if ($shop->save()){
               //send an email here
                	$headers = array('From: Commy-Messenger',
            
          			  'Content-Type: text/html; charset=iso-8859-1');
                	mail(
                                 "frimpong@commcycle.co",
                                 "New upload by ".$request->name,$this->generateBodyAlternate($request->name,$request->email,$request->itemName,$request->itemBrand,$shop->Price,$request->categoryBox,'Empty'),
                                 implode("\r\n",$headers)                                 
                                 );
                                 
                         mail(
                                 "leroy@commcycle.co",
                                 "New upload by ".$request->name,$this->generateBodyAlternate($request->name,$request->email,$request->itemName,$request->itemBrand,$shop->Price,$request->categoryBox,'Empty'),
                                 implode("\r\n",$headers)                                 
                                 );
                                 
                                 
                                 mail(
                                 "soumaya@commcycle.co",
                                 "New upload by ".$request->name,$this->generateBodyAlternate($request->name,$request->email,$request->itemName,$request->itemBrand,$shop->Price,$request->categoryBox,'Empty'),
                                 implode("\r\n",$headers)                                 
                                 );


                                 //to the uploader
                                 mail(
	                    		$request->email,"I smell success in the air",
	                    		"Hi ".$request->name.",\n You have successfully uploaded ".$request->itemName.
	                    		".\n Keep using commcycle to show your kindness. \n Thank you very much!\nشكرا , Asante, Y3daase.",
	                    		"From: Commcycle-shop-B"
	                    		);                
                return redirect('shop');
            }
        }else{
            if ($request->finalise=='finalise'){
                echo "<div class='container'>
                        <p class='alert alert-warning'>You did not select any image <a href='/shop'>Go back</a></p>
                      </div>";
            }else{
            	return redirect('shop');
            }
        }
    }


    public function ladyBUpload(request $request){
	    $lblog = new Lblog(); 
	  	if($request->hasFile('image')){
	  		$ext = $request->image->getClientOriginalExtension();
	  		if( $ext=='jpeg' || $ext=='jpg' || $ext=='png' || $ext=='bmp' || $ext=='gif'|| $ext=='JPEG' || $ext=='JPG' || $ext=='PNG' || $ext=='BMP' || $ext=='GIF' ){
	  			
			  		$lbItem = new Ladyb(); 
				  	$lbItem->Item = $request->itemName;
				  	$lbItem->Price = $request->itemPrice + $request->itemPrice * 0.1;
				  	$lbItem->Size = $request->itemSize;
				  	$lbItem->Quantity = $request->itemQuantity;
				  	$lbItem->Info = $request->itemInfo;
			  		$fileName = uniqid().$request->image->getClientOriginalName();
			  		if ($request->image->move('ladyB',$fileName)){
		    			$lbItem->Pics ="ladyB/".$fileName;
		    			if($lbItem->save()){
		    				$lblog->happening =  "The upload was successfull, ".explode(':',Session::get('lb-admin'))[0];
			            	$lblog->save();
			            	Session::flash('lb-finished-upload',['alertType'=>'success','ItmName' =>$lbItem->Item,'msg' => 'has been posted succesfully!']);
		    				return redirect('uploadcenter');
		    			}else{
		    				$lblog->happening =  "The upload was successfull but your data could not be saved";
		            		$lblog->save();
		    			}
			  		}else{
			  			$lblog->happening= "Ooops something came up.. the upload couldnt go through.. please refresh and try again";
			        	$lblog->save();
			  		}
			}
		}else{
		  		$lblog->happening =  explode(':',Session::get('lb-admin'))[0].", are you sure you selected any image?";
		  	 	 $lblog->save();
		  	 	 Session::flash('lb-finished-upload',['alertType'=>'danger','ItmName' =>'','msg' => explode(':',Session::get('lb-admin'))[0].' are you sure you chose an image?']);
		  	 	 return redirect('uploadcenter');
		}

		  	// }else{
		  	// 	
	  	//}

  	}








}
