<?php namespace App\Controllers;

class DosarPacienti extends BaseController
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
		echo view('dosar_pacienti');
		echo view('templates/footer', $data);
	}

	//--------------------------------------------------------------------

}
