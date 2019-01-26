<?php

/*
|-------------------------------| ALL COMMCYCLE LINKS |-----------------------------------------|
| 																								|
| 																								|                     
| 																								|
|  																								|
| 																								|
*/

/*########################### SWITCH DEMO ################################*/

    Route::get('company-name','CommcycleController@showDemo');
/*------------------------------------------------------------------------*/

/* ####################### KENYA SUBDOMAIN ################ */

	Route::get('commy-kenya','KenyaController@home');
	Route::get('request-design','KenyaController@saveRequest');


/* ####################################################### */

/* ################################# SECURITY ################## */ 

Route::get('admin-security','SecurityController@showLostFound')->name('security.main');
Route::get('security-login','SecurityController@login')->name("sec.login");
Route::get('security-logout','SecurityController@logout')->name("sec.logout");
Route::post('security-do-login','SecurityController@doLogin')->name("do.login");
Route::post('security-do-signup','SecurityController@doSignup')->name("do.signup");
Route::get('security-signup','SecurityController@signup')->name("sec.signup");
Route::get('security-lost-and-found','SecurityController@showItems')->name("sec.items");
Route::get('declare','SecurityController@doDeclare')->name("item.declare");
Route::get('message-us','SecurityController@messageUs')->name('message');
Route::get('do-messaging','SecurityController@doMessaging')->name('message.do');

/* ################################# SECURITY ################## */ 






Route::get('staffulty-check',function(){
	Session::put('staffulty','Yes'); 
	return redirect()->back();



});
Route::get('not-staffulty',function(){
	Session::put('staffulty','No'); 
	return redirect()->back();


});


Route::get('refresh-revs',function(){
	$rev = App\Review::orderBy('id','DESC')->paginate(10); 
	return view('commcycle-pages.rev-refresh',['rev'=>$rev]);


});
Route::post('req-upload','UploadController@reqUpload');
Route::post('found-upload','UploadController@foundUpload');
Route::get('see-extras',function(){
	
	$article = App\Article::find(9); 	
	$exList = explode(',', $article->extraPics);
	$arr = array();
	foreach($exList as $p){
		array_push($arr,$p); 	
	}
	
	foreach($exList as $a){
		echo  explode('-->',$a)[1];	
		echo "<br>";	
	}
});

Route::get('create-rev','CommcycleController@createReview');
Route::get('page-number/{paginationNumber}/{idPin}','BlogController@findPosition');
Route::get('comment-notification/{username}','BlogController@notifier');
Route::get('commy-blog','BlogController@index'); 
Route::get('The-bread-Winner/{id}','BlogController@tryout');

Route::get('commy-article/{id}','BlogController@showArticle')->name('article.view');
Route::post('extra-uploads','BlogController@extraUploads')->name('extra.uploads');
Route::get('create-article','BlogController@showCreate')->name('article.create'); 
Route::get('del-ex-img','BlogController@delExtraImages');
Route::post('upload-image', 'BlogController@upload');
Route::get('del-img','BlogController@delImage');
Route::get('save-article','BlogController@saveArticle');
Route::get('temp-save','BlogController@tempSave');
Route::get('edit/{id}','BlogController@editLoad')->name('edit');
Route::get('show-edit','BlogController@showEdit');
Route::get('cancel-edit','BlogController@cancelEdit')->name('edit.cancel');
Route::get('save-edit','BlogController@saveEdits');
Route::get('del-art/{id}','BlogController@delete');
Route::get('publish/{id}','BlogController@publishArticle');
Route::get('unpublish/{id}','BlogController@unpublishArticle');
Route::get('show-side-articles/{id}','BlogController@showSideArticles');
Route::get('make-comment/{id}','BlogController@makeComment'); 
Route::get('load-comments/{id}','BlogController@loadComment'); 

Route::get('commy-opps',function(){
	return view('commcycle-pages.opps');


});


Route::get('k',function(){
$as = Session::get('c');

foreach($as as $l){
print_r($l);
echo "<br>";


foreach($l as $k){
echo $k['Pics'];

}
echo "<br>";

echo "<br>";


}

});


/*
|-------------------------------| ALL COMMCYCLE LINKS |-----------------------------------------|
| 																								
| 																							                																							
  																																									|
*/
Route::get('page-unavailable',function(){
	return view('errors.404');
})->name('page.unavailable');
Route::get('show-sim','CommcycleController@showSim');
Route::get('/', function () {
    return view('commcycle-pages.index');
});

Route::get('edit-lady-B',function($request){

});

Route::get('transactions','AdminController@viewTransactions');

Route::get('record-transaction/{admin}/{id}','AdminController@recordTransaction');
Route::get('item-view/{id}','CommcycleController@lostfoundView');
Route::get('shop-product-view/{id}','CommcycleController@shopProdView');
Route::get('ladyB-product-view/{id}','LadyBController@lbView');
Route::get('commy-product-view/{id}','CommcycleController@commyView');
Route::get('product-view/{id}','CommcycleController@productView');
Route::post('product-upload','AdminController@productUpload');
Route::get('upload-our-products','AdminController@showOurProductsPage');
Route::get('commy-products','CommcycleController@showProducts')->name('create.review');
Route::get('email-orderer','AdminController@emailOrderer');
Route::get('lost-and-found','CommcycleController@showLostFound')->name('lost'); 
Route::get('show-order-pics/{motherIDs}',function($motherIDs){
	$picturesArray =[];
	$nameArray = []; 
	$theList = explode(',',$motherIDs); 
	foreach($theList as $id){
		$number = explode('->',$id)[0];
				
		if(explode('->',$id)[1]== 'commcycle'){
			$item = App\Free::find($number); 
			if($item){
				array_push($picturesArray,$item->Pics);
				array_push($nameArray,$item->Item.' : '. $item->Price);

			
			}else{
			
			}
			
		}
		elseif(explode('->',$id)[1]== 'commcycleB'){
			$item = App\NoPicFree::find($number);
			if($item){
				array_push($picturesArray,$item->Pics);
			
				array_push($nameArray,$item->Item.' : '. $item->Price);

			
			}else{
			
			
			}
					
		
		}
		elseif(explode('->',$id)[1]== 'shop'){
			$item = App\Shop::find($number); 
			if($item){
			
				array_push($picturesArray,$item->Pics);
				array_push($nameArray,$item->Item.' : '. $item->Price);

			}else{
				
			
			
			}
		
		
		
		}
		elseif(explode('->',$id)[1]== 'shopB'){
			$item = App\NoPicShop::find($number); 
			array_push($picturesArray,$item->Pics);
			array_push($nameArray,$item->Item.' : '. $item->Price);
			if($item){
				array_push($picturesArray,$item->Pics);
				array_push($nameArray,$item->Item.' : '. $item->Price);
			
			}else{
			
			}
		}
	}
	

	return view('fragments.details',compact('picturesArray','nameArray'));
	


});

Route::get('remove-admin/{id}',function($id){
	$found = \App\Lbadmin::find($id); 
	if ($found){
		$found->delete();
	}else{
	return 'Admin could not be removed';
	
	}
});
Route::get('commcycle', function(){
	return view('commcycle-pages.index');
});

Route::get('commcycle-books',function(){
	$books = App\Free::where('Brand','Book')->orderBy('id','DESC')->paginate(4);
	return view('commcycle-pages.books',compact('books'));

});
Route::get('gents','CommcycleController@gentsOnly');

Route::get('ladies','CommcycleController@ladiesOnly');

Route::get('others','CommcycleController@othersOnly');

Route::get('not-yet', 'CommcycleController@notYet');


Route::get('admin', 'AdminController@showAdminMain');

Route::get('subscribers', 'AdminController@showSubscribers');

Route::get('orders', 'AdminController@showOrders');

Route::get('admincommcycleitems', 'AdminController@showAdminCommItems');

Route::get('adminshopitems', 'AdminController@showAdminShopItems');

Route::get('admin-deletion/{admin}/{section}/{id}','AdminController@deleteItem');

Route::get('admin-delete-order/{admin}/{id}','AdminController@deleteOrder');

Route::get('admin-communication/{admin}','AdminController@communicate');

Route::get('admin-post-news','AdminController@postNews');

Route::get('admin-profile','AdminController@showAdminProfile');
Route::post('admin-password-change','AdminController@changePassword');

Route::get('admin-signin',['uses'=>'AdminController@adminSignIn','as'=>'admin.signin']);

Route::post('admin-authentication','AdminController@adminAuthentication');

Route::get('admin-log-out',['uses'=>'AdminController@adminLogout','as' => 'admin.logout']);

//-----------------------CART and CHECKOUT ---------------------

Route::get('add-to-cart/{page}/{id}','CartController@trialAddToCart');

Route::get('clearall','CartController@clearSession');

Route::get('checkout','CartController@goToCheckout');

Route::get('docheckout','CartController@checkout');

Route::get('goback','CartController@continueShopping');

Route::get('delete-cart-item/{product_quantity}/{product_price}/{id}','CartController@deleteCartItem');
//----------------------------------------------------------------
	// Route::get('selected-item/shop/{id}','CartController@addToCartShop');

	// Route::get('selected-item/commcycle/{id}','CartController@addToCartCommcycle');

	// Route::get('selected-item/commcycleB/{id}','CartController@addToCartCommcycleB');

	// Route::get('selected-item/shopB/{id}','CartController@addToCartShopB');

Route::get('showcart',['uses'=>'CartController@showCart', 'as' =>'cart.show']);

Route::get('show','CartController@showStuff');

//------------------------------------------------------------------
Route::post('freeupload','UploadController@uploadFree');

Route::post('shopupload','UploadController@uploadShop');
//------------------------------------------------------------------

Route::get('subscribe','CommcycleController@subscribe');

Route::get('commcycleshop','CommcycleController@showCommcycleShop');

Route::get('commcycleshopB','CommcycleController@showNoPicCommcycleShop');

Route::get('shop','CommcycleController@showShop');

Route::get('shopB','CommcycleController@showNoPicShop');

//-------------------LADYB LINKS ---------------------------------

//Route::get('ladyB','LadyBController@index');
Route::get('lb-price-change',"LadyBController@changePrice");
Route::get('ladyB-main','LadyBController@index');

Route::get('ladyB-office','LadyBController@showMainOffice');

Route::get('ladyB-sign-in','LadyBController@showSignIn');

Route::post('ladyB-authentication','LadyBController@adminSignIn');

Route::get('ladyBshop','LadyBController@showShop');

Route::get('uploadcenter','LadyBController@showUploadCenter');

Route::post('ladyB-upload','UploadController@ladyBUpload');

Route::get('ladyB-stock','LadyBController@showStock');

Route::get('ladyB-order','LadyBController@showOrders');

Route::get('ladyB-order-delete/{admin}/{id}','LadyBController@deleteOrder');

Route::get('ladyB-sign-out','LadyBController@signOut');

Route::get('ladyB-profile','LadyBController@getProfile');

Route::get('ladyB-admin-sign-up',['uses'=>'LadyBController@adminSignUp','as'=>'lb.admin.signup']);

Route::get('ladyB-admin-password-change/{id}','LadyBController@adminPasswordChange');

Route::get('ladyB-news-post',['uses'=>'LadyBController@adminNewsPost','as'=>'lb.news.post']);

Route::get('ladyB-message','LadyBController@sendMessage');

Route::get('lb-admin-deletion/{admin}/{id}',['uses'=>'LadyBController@deleteItem','as'=>'lb.admin.delete']);

//------------------------------------------------------------------------------------------------------------------------------------------------------

Route::get('aboutus','CommcycleController@showAbout');
Route::get('aboutus-dev',function(){
	echo "PLEASE TRY AGAIN LATER, THIS PART OF COMMCYCLE IS UNDER CONSTRUCTION";

});
Route::get('sendmessage','CommcycleController@sendMessage');
