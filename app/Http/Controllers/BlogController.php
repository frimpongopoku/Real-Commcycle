<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Free;
use App\NoPicFree;
use App\User;
use Auth;
use App\lbNews;
use App\Article;
use App\Shop;
use App\Ladyb;
use App\Comment;
class BlogController extends Controller

{	


	public function extraUploads(Request $request){
		$admins = User::all(); 
		$articles = Article::where(['type'=>'commy','deleted'=>'0'])->orderBy('id','DESC')->paginate(10);
		//IMAGE EXTENSION CHECK
		if($request->hasFile('image')){
			foreach($request->image as $image){
				$ext = $image->getClientOriginalExtension();
				if( $ext=='jpeg' || $ext=='jpg' || $ext=='png' || $ext=='bmp' || $ext=='gif'|| $ext=='JPEG' || $ext=='JPG' || $ext=='PNG' || $ext=='BMP' || $ext=='GIF' ){
				
				}else{
					
					return redirect()->route('article.create',compact('admins','articles'))->with('extra-note','One or more of the pictures you selected is not accepted');
				}
			
			}
		//IF EXTENSION IS TRUE === UPLOAD
		Session::put('article-extra-img-link',[]);
		$theList = array();
		foreach($request->image as $theImage){
			$fileName = uniqid().$theImage->getClientOriginalName();
			if ($theImage->move('blogImages',$fileName)){
				Session::put('article-extra-img-link-status','Boom Zambezi! $fileName');
				array_push($theList,'blogImages/'.$fileName);
												
			}
		}
		
		//AFTER UPLOADS 

		Session::put('article-extra-img-link',$theList);
		return redirect()->route('article.create',compact('admins','articles'));		

			
			
	  }

}
	
	
	
	public function findPosition($paginationNumber,$idPin){
		$table = shop::all(); 
		$num = 0 ; 
		$page = 1; 
		
		foreach($table as $ids){
			$num ++; 
			if($num == $paginationNumber){
				$page ++; 
				$num = 0; 	
			}

			if( $ids->id == $idPin ){
				return $page; 
			} 
			
					
		}
			
	
	
	
	}
	public function notifier($username){
	
		$user = User::where('name',$username)->first(); 
		
		$user->update(['notifications'=>1]);
	
	
	
	}

	public function makeComment(Request $request, $id){
		$comment = new Comment(); 
		
		$comment->name = $request->name; 
		$comment->comment = $request->com; 
		$comment->article_id = $id; 
		$comment->save();	
	}
	
	public function showSideArticles($id){
		$articles = Article::where(['deleted'=> '0','published'=>'1'])->orderBy('id','DESC')->paginate(30);
		return view('fragments.side-articles',compact('articles'));
	}
	public function loadComment($id){
		$article = Article::find($id); 
		
		return view('fragments.loadComment',compact('article'));
	
	}

	public function finder($tableName,$id){
		//this function takes the name of a table and the id of an existent item 
		if($tableName == 'Free'){
			return Free::find($id); 
		}else if($tableName =='Shop'){
		
			return Shop::find($id);
		
		}
		else if($tableName =='LB'){
			return Ladyb::find($id);
		}
	}
	public function aller($tableName){
	//this function takes a table name and returns all the rows in that table
		if($tableName =='Free'){
			return Free::all();
		
		}else if ($tableName =='Shop'){
		
			return Shop::all();
		
		}else if ($tableName =='LB'){
			return Ladyb::all();
		}

	
	
	}
	public function createAd($num,$tableName){
		$comItems = $this->aller($tableName); 	
		$commList =[]; 
		$indexList =[];
		
		$commAddSet=[];
		foreach($comItems as $com) {
		
			array_push($commList,$com->id);
	
		}
		$idsLength = count($commList); 
		for($x=0; $x < $num; $x++){
		
			$randomIndex = rand(0, $idsLength-1);
			array_push($indexList,$randomIndex) ;
		
		}
		foreach($indexList as $ind){
		
			array_push($commAddSet, $this->finder($tableName,$comItems[$ind]));
		}
		//change commAddset to real values  
		
		$realAds = [];
		foreach($commAddSet as $row){
			array_push($realAds, $row);
		} 
		return $realAds;
	}
	public function index(){
		$commAddSet = $this->createAd(10,'Free');
		$lbAddSet1 = $this->createAd(3,'LB');
		$lbAddSet2 = $this->createAd(3,'LB');
		$shopAddSet = $this->createAd(5,'Shop');
		$articles = Article::where(['deleted'=>'0','published'=>1])->orderBy('id','DESC')->paginate(4);
		$art = Article::find(6);
		
		return view('blog.index',compact('articles','commAddSet','lbAddSet1','lbAddSet2','shopAddSet','art'));
	}
	
	public function publishArticle($id){
	
		$art = Article::find($id); 
		
		$art->update(['published'=>'1']);
			
	
	}
	
	public function unpublishArticle($id){
	
		$art = Article::find($id); 
		
		$art->update(['published'=>'0']);
			
	
	}
	

	
	public function delete($id){
		$art = Article::find($id); 
		
		$art->update(['deleted'=>'1']);
	
	}
	public function cancelEdit(){
		Session::forget('edit-basket'); 
		Session::forget('article-img-status'); 
		Session::forget('article-img-link');
		$articles = Article::where(['type'=>'commy','deleted'=>'0'])->orderBy('id','DESC')->paginate(10);
	$admins = User::all(); 
		return redirect()->route('article.create',['admins'=>$admins,'articles'=>$articles]);

	
	}
	public function saveEdits(Request $request){
		$art = Article::find(Session::get('edit-basket')['ID']); 				
		if($art->update(['Image'=>$request->image, 'Text'=>$request->articleText,'semiTag'=>$request->miniTagLine,'tagline'=>$request->tagLine])){
			Session::forget('edit-basket'); 
			Session::forget('article-img-status'); 
			Session::forget('article-img-link');
			$articles = Article::where(['type'=>'commy','deleted'=>'0'])->orderBy('id','DESC')->paginate(10);
	$admins = User::all(); 
		return view('admin-pages.blog.create_article',compact('admins','articles'));		}
	}
	
	public function showEdit(){
	
		$articles = Article::where(['type'=>'commy','deleted'=>'0'])->orderBy('id','DESC')->paginate(10);
	$admins = User::all(); 
		return view('admin-pages.blog.create_article',compact('admins','articles'));
	
	}
	public function editLoad($id){
		$art = Article::find($id);
		Session::put('edit-basket',[
		'ID'=>$id,
		'Image'=>$art->Image, 
		'TagLine'=>$art->tagline, 
		'SemiTagLine'=>$art->semiTag, 
		'Text'=>$art->Text

		]);
	
		Session::put('article-img-status','Boom');
		Session::put("article-img-link",$art->Image); 
		$articles = Article::where(['type'=>'commy','deleted'=>'0'])->orderBy('id','DESC')->paginate(10);
	$admins = User::all(); 
		return redirect()->route('article.create',['admins'=>$admins,'articles'=>$articles]);
	
	}
	public function tempSave(Request $request){
	
	
		Session::put('article-basket',[
		'tagLine'=>$request->tagLine,
		'minTagLine'=>$request->miniTagLine,
		'articleText'=>$request->articleText
		]);
	
	
	
	}
	public function saveArticle(Request $request){
	
	$articles = Article::where(['type'=>'commy','deleted'=>'0'])->orderBy('id','DESC')->paginate(10);
	$admins = User::all();
	$newArt =  new Article(); 
	$newArt->tagline = $request->tagLine; 
	$newArt->semiTag = $request->miniTagLine; 
	$newArt->Text = $request->articleText; 
	$newArt->Image = $request->image; 
	$newArt->admin = explode(':',Session::get('admin'))[0] ; 
	if(Session::has('article-extra-img-link')){
		$extra = ''; 
		foreach(Session::get('article-extra-img-link') as $index => $path){
			if($extra ==''){
				//$extra = $index.'-->'.$path;
				$extra = $path;

			}else{
				//$extra = $extra.','.$index.'-->'.$path;
				$extra = $extra.','.$path;

			
			}
		
		}
	$newArt->extraPics = $extra; 
	$newArt->extras =1;	
	}
		
	if($newArt->save()){
		Session::forget('article-img-link'); 
		Session::forget('article-img-status');
		Session::forget('article-extra-img-link');
		Session::forget('article-extra-img-link-status');
		return redirect()->route('article.create',compact('admins','articles'));
		
	}
					
	
	
	}
	
	
	public function delExtraImages(Request $request){
		foreach(Session::get('article-extra-img-link') as $path){
			unLink($path);
		}
		Session::forget('article-extra-img-link');
		Session::forget('article-extra-img-link-status');
	}
	

	public function delImage(Request $request){
		if(unLink($request->imgLink)){
			Session::forget('article-img-status');
		} 
			
	}

	public function tryout($id){
	
		return view('blog.try');
	}
	
	
	public function showArticle($id){
		$commAddSet = $this->createAd(10,'Free');
		$lbAddSet1 = $this->createAd(3,'LB');
		$lbAddSet2 = $this->createAd(3,'LB');
		$shopAddSet = $this->createAd(5,'Shop');
		$art = Article::find($id);
		$articles = Article::where(['deleted'=> '0','published'=>'1'])->orderBy('id','DESC')->paginate(10);
		
		return view('blog.fb-share',compact('id','art','commAddSet','lbAddSet1','lbAddSet2','shopAddSet','articles'));
	}
	

	public function showCreate(){
	
	$articles = Article::where(['type'=>'commy','deleted'=>'0'])->orderBy('id','DESC')->paginate(10);
	$admins = User::all(); 
		return view('admin-pages.blog.create_article',compact('admins','articles'));
	
	}
	
	
	public function upload(Request $request){
		
		$admins = User::all(); 
		$articles = Article::where(['type'=>'commy','deleted'=>'0'])->orderBy('id','DESC')->paginate(10);
		if($request->hasFile('image')){
	  		$ext = $request->image->getClientOriginalExtension();
	  		if( $ext=='jpeg' || $ext=='jpg' || $ext=='png' || $ext=='bmp' || $ext=='gif'|| $ext=='JPEG' || $ext=='JPG' || $ext=='PNG' || $ext=='BMP' || $ext=='GIF' ){
	
	
	
	
		//save the image 
		$fileName = uniqid().$request->image->getClientOriginalName();
		if($request->image->getClientSize() >1990000){
	                    		mail(
	                    		"mrfimpong@gmail.com"," There is a huge ass image",
	                    		"This file 'userImages/".$fileName."' is huge.\n Do something!",
	                    		"From: Article-Upload-center"
	                    		);
	                    	}
		
				if ($request->image->move('blogImages',$fileName)){
					Session::put('article-img-status','Boom Zambezi! $fileName');
					Session::put('article-img-link','blogImages/'.$fileName);
					
					return redirect()->route('article.create',compact('admins','articles'));				
				}else{
				
						
					return view('admin-pages.blog.create_article',compact('admins','articles'));
				
				}
		
		
		
		}
	  }else{
	  
	  	return view('admin-pages.blog.create_article',compact('admins','articles'));
	  
	  }

		
	
	}



}