<?php

class PhotoController extends BaseController {
	
	public function getIndex()
		{
			$url = '/photos';
			BaseController::writeToLog($url);
			
			$query = Photo::all();
           
			$count = $query->count();
			
			return View::make('photos.index', array ('photos' => $query, 'count' => $count));
		}
	
	public function getView($id)
		{
			$url = '/users/'.$id.'/photos';
			BaseController::writeToLog($url);
			
			$query = Photo::where('id', '=', $id)->get();
					
			$count = $query->count();
			
			return View::make('photos.index', array ('photos' => $query, 'count'=>$count));
		}
		
	public function getUploadView()
		{
			$url = '/upload';
			BaseController::writeToLog($url);
			
			return View::make('users.upload');
		}
		
	public function postUpload()
		{
		    $picName = Input::get('picName');
			$user = $_SESSION["userId"];
			
			if (!empty($picName))
			{
				$num = DB::table('pictures')->where('id', '=', $user)->max('picNo');
				
				if (is_numeric($num)) { $num += 1; }
				else { $num = 1; }
				
				$details = Input::get('details');
				$today = date("Y-m-d H:i:s");
				
				Photo::create(array(
					'id'=>$user,
					'picNo'=>$num,
					'name'=>$picName,
					'date'=>$today,
					'description'=>$details
					));
					
				$image = "$num.jpg";
				$filename = "../app/storage/images/$user";
				
				if (!file_exists($filename)) 
				{
					mkdir($filename, 0777);
				}
				move_uploaded_file($_FILES['fileField']['tmp_name'],"../app/storage/images/$user/$image");
				return Redirect::route('home');
			}
			else
			{
				return Redirect::route('upload');
			}
		}
		
		public function getEdit($id,$num)
		{   
		    $url = '/users/'.$id.'/'.$num.'/edit';
			BaseController::writeToLog($url);
			$query = Photo::whereRaw('id = ? and picNo = ?', array($id,$num))->first();
			return View::make('photos.edit')->with('photo', $query);
		}
		
		public function postEdit()
		{
			$picName = Input::get('picName');
			$user = $_SESSION["userId"];
			$num = Input::get('hiddenID');
			
			if (!empty($picName))
			{		
				$details = Input::get('details');
				$today = date("Y-m-d H:i:s");
				
				Photo::whereRaw('id = ? and picNo = ?', array($user,$num))->update(array(
					'name'=>$picName,
					'date'=>$today,
					'description'=>$details
					));
				
				if($_FILES['fileField']['tmp_name'] != "")
				{
					$image = "$num.jpg";
					move_uploaded_file($_FILES['fileField']['tmp_name'],"../app/storage/images/$user/$image");
				}			
				return Redirect::route('photos');
			}
			else
			{
			    $url = 'http://localhost/PhotoAlbum/public/users/'.$user.'/'.$num.'/edit';
				return Redirect::to($url);			
			}
		}
		
		public function deletePhoto($id,$num)
		{
			$url = '/users/'.$id.'/'.$num.'/delete';
			BaseController::writeToLog($url);
			Photo::whereRaw('id = ? and picNo = ?', array($id,$num))->delete();
			unlink ("../app/storage/images/$id/$num.jpg");
			return Redirect::route('photos');
		}
}