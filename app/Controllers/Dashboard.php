<?php namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{	
		$data = [];

		//classic Filtering
		if(! session()->get('isLoggedIn')){
          return redirect()->to('/');
        }
        ///////////////////////////////////

		echo view('templates/header', $data);
		echo view('dashboard');
		echo view('templates/footer', $data);
	}

	//--------------------------------------------------------------------

}
