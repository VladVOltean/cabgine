<?php namespace App\Controllers;

class ModFinanciar extends BaseController
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
		echo view('mod_financiar');
		echo view('templates/footer', $data);
	}

	//--------------------------------------------------------------------

}
