<?php namespace App\Controllers;

use App\Models\PatientModel;
use App\Models\CityModel;


class PatientsList extends BaseController
{
	public function index()
	{	
		$patientModel = new PatientModel();

		$data['patients'] = $patientModel->getAllPatients();

		return view('patients_views/patients_list', $data);

	}	
	public function add_edit($id_patient)
	{
		$data=[];
		helper(['form']);
		$db = db_connect();
		$patientModel = new PatientModel();
		$cityModel = new CityModel($db);
		
		if ($this->request->getMethod() == 'post') 
		{
			// Validation
			$rules=[
				'first_name'	=>	'required|min_length[3]',
				'last_name'	=>	'required|min_length[3]',
				'identification_number'	=>	'required|min_length[12]',
				'date_of_birth'=>	'required',
				'county'=>'required',
				'city'=>'required',
				'address'=>'required|min_length[3]',
				'telephone'=>'required|min_length[10]',
			];
			if($id_patient == 0)
			{
				$rules['email']='required|min_length[6]|max_length[50]|valid_email|is_unique[patients.email]';
			}
			else
			{
				$rules['email']='required|min_length[6]|max_length[50]|valid_email';
			}
			if (!$this->validate($rules)) 
			{
				$data['validation'] = $this->validator;
			} 
			else
			{
				$newData = [
					'first_name' => $this->request->getPost('first_name'),
					'last_name' => $this->request->getPost('last_name'),
					'identification_number' => $this->request->getPost('identification_number'),
					'date_of_birth' => $this->request->getPost('date_of_birth'),
					'id_county'=> $this->request->getPost('county'),
					'id_city'=> $this->request->getPost('city'),
					'telephone' =>$this->request->getPost('telephone'),
					'address'=> $this->request->getPost('address'),
					'email' => $this->request->getPost('email'),
					'civil_status' => $this->request->getPost('civil_status'),
				];
				if($this->request->getPost('civil_status')==1)
				{
					$newData['civil_status']=1;
				}
				else
				{
					$newData['civil_status']=0;
				}
				if($this->request->getPost('ocuppation')!='')
				{
					$newData['ocupation']=$this->request->getPost('ocuppation');
				}
				if($this->request->getPost('job')!= '')
				{
					$newData['job']=$this->request->getPost('job');
				}
				if($id_patient == 0)
				{
					$patientModel->save($newData);
					session()->setFlashdata('success', 'Patient Added');
					$consult=$this->request->getPost('consult');
					if(isset($consult))
					{
						$last_patient=$patientModel->get()->getLastRow();
						return redirect()->to('/medicalrecord/'.$last_patient->id_patient);
					}
					else 
					{
						return redirect()->to('/patients_list');	
					}
				}
				else
				{
					$patientModel->update($id_patient,$newData);
					session()->setFlashdata('success', 'Patient data updated');
					$consult=$this->request->getPost('consult');
					if(isset($consult))
					{
						$last_patient=$patientModel->get()->getLastRow();
						return redirect()->to('/medicalrecord/'.$id_patient);
					}
					else 
					{
						return redirect()->to('/patients_list');
					}
				}
			}
		}
		$data['countys'] = $cityModel->countys();
		$data['patient'] = $patientModel->getPatient($id_patient);
		echo view('patients_views/edit_patient', $data);
	}
	public function city()
	{
		$data=[];
		$db = db_connect();
		$cityModel = new CityModel($db);
		if($this->request->getPost('id_county')!= '')
		{
			$data['citys']= $cityModel->city($this->request->getPost('id_county'));
		}
        return $this->response->setJSON($data);
	}

    function delete($id)
    {
        $patientModel = new PatientModel();

        $patientModel->where('id_patient', $id)->delete($id);

        $session = \Config\Services::session();

        $session->setFlashdata('success', 'Pacient Deleted');

        return $this->response->redirect(site_url('/patients_list'));
    }
}
