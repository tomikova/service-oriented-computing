<?php

class UsersController extends BaseController {
	
	public function getIndex()
		{
			$url = '/users';
			BaseController::writeToLog($url);
			
			return View::make('users.index')->with('users', User::orderBy('id')->get());
		}
	
	public function getView($id)
		{
			$url = '/users/'.$id.'';
			BaseController::writeToLog($url);
			
			return View::make('users.index')->with('users', User::find($id)->get());
		}
		
	public function getRegistrationView()
		{
			$url = '/registration';
			BaseController::writeToLog($url);
			
			return View::make('users.registration');
		}
	
	public function getLoginView()
		{
			$url = '/login';
			BaseController::writeToLog($url);
			
			return View::make('users.login');
		}
		
	public function postCreate()
		{
			$url = '/users/create';
			BaseController::writeToLog($url);
			
		 	$id1 = DB::table('users')->max('id');
			$email = Input::get('email');
			$username = Input::get('username');
			$password = Input::get('password');
			
		    User::create(array(
			'email'=>$email,
			'username'=>$username,
			'password'=>$password
			));
			
			$id2 = DB::table('users')->max('id');
			
			if($id1 != $id2)
			{	$_SESSION["userId"] = $id2;
     			$_SESSION["user"] = $username; 
				$_SESSION["userPassword"] = $password;
				
				mkdir("../app/storage/images/$id2", 0700);
			}
		    return Redirect::route('home');			
		}
		
	public function postLogin()
		{
		    $username = Input::get('username');
			$password = Input::get('password');
			
			$query = DB::table('users')->where('username', '=', $username)->where('password', '=', $password)->first()->id;
		
			$_SESSION["userId"] = $query;
     		$_SESSION["user"] = $username; 
			$_SESSION["userPassword"] = $password;
			
			return Redirect::route('home');
		}
}