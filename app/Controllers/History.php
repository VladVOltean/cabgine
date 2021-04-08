<?php namespace App\Controllers;

class History extends BaseController
{
	public function index()
	{	
		$data = [];

		//classic Filtering
		if(! session()->get('isLoggedIn')){
          return redirect()->to('/');
        }
        ///////////////////////////////////

		
		echo view('history'.$data);

	}

	//--------------------------------------------------------------------

}
