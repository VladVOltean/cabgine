<?php

namespace App\Controllers;

use App\Models\UserModel;


class Users extends BaseController
{
	public function index()
	{
		$data = [];
		helper(['form']);
		if ($this->request->getMethod() == 'post') {
			//Validation
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
			];
			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match'
				]
			];
			if (!$this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			} else {
				$model = new UserModel();

				$user = $model->where('email', $this->request->getVar('email'))
					->first();

				$this->setUserSession($user);
				if( session()->get('is_admin')==1)
				{
					return redirect()->to('users');
				}
				else
				{
				return redirect()->to('patients_list');
				}
			}
		}
		echo view('login_views/login', $data);
	}
	public function users_data()
	{
		$model = new UserModel();
		$data['users']=$model->get()->getResult();
		echo view('login_views/users_list',$data);
	}

	private function setUserSession($user)
	{
		$data = [
			'id' => $user['id'],
			'firstname' => $user['firstname'],
			'lastname' => $user['lastname'],
			'email' => $user['email'],
			'is_admin' => $user['is_admin'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}
	
	public function register_edit($id)
	{

		$data = [];
		helper(['form']);
		$model = new UserModel();

		if ($this->request->getMethod() == 'post') 
		{
			//Validation
			if($id == 0)
			{
				$rules = [
					'firstname' => 'required|min_length[3]|max_length[30]',
					'lastname' => 'required|min_length[3]|max_length[30]',
					'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
					'signature'=>[
							'rules'=>'uploaded[signature]|max_size[signature, 1024]|is_image[signature]',
							'label' => 'Signature'
					],
					'password' => 'required|min_length[8]|max_length[255]',
					'password_confirm' => 'matches[password]',
				];
			}
			else 
			{
				$rules = [
					'firstname' => 'required|min_length[3]|max_length[30]',
					'lastname' => 'required|min_length[3]|max_length[30]',
					'email' => 'required|min_length[6]|max_length[50]|valid_email',
				];
				if ($this->request->getPost('password') != '') {
					$rules['password'] = 'required|min_length[8]|max_length[255]';
					$rules['password_confirm'] = 'matches[password]';
				}
				if ($this->request->getFile('signature') != '') 
				{
					$rules=['signature'=>[
								'rules'=>'uploaded[signature]|max_size[signature, 1024]|is_image[signature]',
								'label' => 'Signature'
										 ]
					];						

				}
			}
			if (!$this->validate($rules)) 
			{
				$data['validation'] = $this->validator;
			} 
			else 
			{
				$newData = [
					'firstname' => $this->request->getPost('firstname'),
					'lastname' => $this->request->getPost('lastname'),
					'email' => $this->request->getPost('email'),
					'title'=>$this->request->getPost('title'),
				];
				if($this->request->getPost('admin')==1)
				{
					$newData['is_admin']=1;
				}
				else
				{
					$newData['is_admin']=0;
				}

				if ($this->request->getPost('password') != '') 
				{
					$newData['password'] = $this->request->getPost('password');
				}
				if ($this->request->getFile('signature') != '') 
				{
						$newData['signature'] = file_get_contents($this->request->getFile('signature'));
				}
				if($id==0)
				{
					$model->save($newData);
					session()->setFlashdata('success', 'Successfuly Added');
					return redirect()->to('/users');
				}
				else
				{
					$model->update($id,$newData);
					session()->setFlashdata('success', 'Successfuly Updated');
					return redirect()->to('/users');
				}
			} 	
		}
		$data['user'] = $model->where('id', $id)->first();
		echo view('login_views/profile', $data);
	}
	function delete($id)
    {
        $model = new UserModel();
        $model->where('id', $id)->delete($id);
        $session = \Config\Services::session();
        $session->setFlashdata('success', 'User Deleted');
        return $this->response->redirect('/users');
    }
	public function logout()
	{
		session()->destroy();
		return redirect()->to('/');
	}




	//--------------------------------------------------------------------
}
