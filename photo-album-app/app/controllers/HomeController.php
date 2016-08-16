<?php

class HomeController extends BaseController {
	
	public function getindex()
		{		    
			$url = '/';
			BaseController::writeToLog($url);
			return View::make('home.index');
		}
}