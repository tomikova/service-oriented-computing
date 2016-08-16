<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	
	public static function writeToLog($url)
	{
		$browser_info = get_browser(null, true);
		$browser = $browser_info['browser'];
		File::append('D:\wamp\www\PhotoAlbum\app\storage\logs\dnevnik.txt', "$url $browser\n");
	}

}