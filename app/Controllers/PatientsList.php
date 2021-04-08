<?php namespace App\Controllers;

use App\Models\PatientModel;

class PatientsList extends BaseController
{
	public function index()
	{	
		$patientModel = new PatientModel();

		$data['user_data'] = $patientModel->orderBy('id_patient', 'DESC')->paginate(10);

		$data['pagination_link'] = $patientModel->pager;

		return view('patients_list', $data);

	}	

	public function add()
	{

		$data = [];

		return view('add_patient',$data);

	}




	public function add_validation()
	{
		helper(['form', 'url']);

		$error = $this->validate([
			'first_name'	=>	'required|min_length[3]',
			'last_name'	=>	'required|min_length[3]',
			'identification_number'	=>	'required|min_length[12]',
			'date_of_birth'=>	'required'
		]);

		if(!$error)
		{
			echo view('add_patient', [
				'error' 	=> $this->validator
			]);
		}
		else
		{
			$patientModel = new PatientModel();

			$patientModel->save([
				'first_name'	=>	$this->request->getVar('first_name'),
				'last_name'	=>	$this->request->getVar('last_name'),
				'identification_number'=>	$this->request->getVar('identification_number'),
				'date_of_birth'	=>	date('Y-m-d',strtotime($this->request->getVar('date_of_birth')))
			]);

			$session = \Config\Services::session();

			$session->setFlashdata('success', 'User Data Added');

			return $this->response->redirect(site_url('/patients_list'));
		}
	}

	

	// show single user
    function fetch_single_data($id = null)
    {
        $patientModel = new PatientModel();

        $data['user_data'] = $patientModel->where('id_patient', $id)->first();

	
		return view('edit_patient', $data);
        
    }

    function edit_validation()
    {
    	helper(['form', 'url']);
        
        $error = $this->validate([
            'first_name'	=>	'required|min_length[3]',
			'last_name'	=>	'required|min_length[3]',
			'identification_number'	=>	'required|min_length[12]',
			'date_of_birth'=>	'required'
        ]);

        $patientModel = new PatientModel();

        $id = $this->request->getVar('id_patient');
		
        if(!$error)
        {
        	$data['user_data'] = $patientModel->where('id_patient', $id)->first();
        	$data['error'] = $this->validator;
        	echo view('edit_patient', $data);
        } 
        else 
        {
	        $data = [
	            'first_name'	=>	$this->request->getVar('first_name'),
				'last_name'	=>	$this->request->getVar('last_name'),
				'identification_number'=>	$this->request->getVar('identification_number'),
				'date_of_birth'	=>	$this->request->getVar('date_of_birth')
	        ];

        	$patientModel->update($id, $data);

        	$session = \Config\Services::session();

            $session->setFlashdata('success', 'User Data Updated');

        	return $this->response->redirect(site_url('/patients_list'));
        }
    }

    function delete($id)
    {
        $patientModel = new PatientModel();

        $patientModel->where('id_patient', $id)->delete($id);

        $session = \Config\Services::session();

        $session->setFlashdata('success', 'User Data Deleted');

        return $this->response->redirect(site_url('/patients_list'));
    }
}
