<?php namespace App\Controllers;

use App\Models\AnalysisModel;
use App\Models\ExaminationModel;
use App\Models\CabinetModel;


class EditData extends BaseController
{
	public function exam_data()
	{	
			$examinationsmodel=new ExaminationModel();
			$data['examinations']=$examinationsmodel->get()->getResult();
			echo view('datas/exam_list', $data);
	}
	public function analyses_data()
	{	
			$analysismodel=new AnalysisModel();
			$data['analyses']=$analysismodel->get()->getResult();
			echo view('datas/analysis_list', $data);
	}
	public function edit_analysis($id)
	{
		helper(["form"]);
		$data=[];
		$analysismodel = new AnalysisModel();

		if ($this->request->getMethod() == 'post') 
		{
			// Validation

			if($id==0)
			{
				$rules['analysis']=[
							'rules'=> 'required|is_unique[analysis.analysis_name]',
							'errors'=> [
								'required' =>'Tipe an analysis name',
								'is_unique'=>'This analysis name is allready registered',
								]
					];
			}
			else 
			{
				$rules['analysis']=[
					'rules'=> 'required',
					'errors'=> [
						'required' =>'Tipe an analysis name',
						]
					];
			}

			if (!$this->validate($rules)) 
			{
				$data['validation'] = $this->validator;
			} 
			else 
			{
				$newData=[
					'analysis_name' => $this->request->getPost('analysis'),
					];	
				if($id==0)
				{
					$analysismodel->save($newData);
					session()->setFlashdata('success', 'Analysis Added');
					return redirect()->to('/analyses');
				}
				else 
				{
					$analysismodel->update($id,$newData);
					session()->setFlashdata('success', 'Analysis Updated');
					return redirect()->to('/analyses');
				}
			}
		}
		$data['analysis']=$analysismodel->find($id);
		echo view('datas/add_analysis',$data);
	}
	public function edit_exam($id)
	{
		helper(["form"]);
		$data=[];
		$examinationsmodel = new ExaminationModel();

		if ($this->request->getMethod() == 'post') 
		{
			// Validation
			$rules['price']=[
						'rules'=>'required|numeric',
						'errors'=> [
							'required' =>'Tipe a price for examination',
							'numeric'=>'The price needs to be a numeric value',
							]
						];

			if($id==0)
			{
				$rules['examination']=[
							'rules'=>'required|is_unique[examinations.examination_name]',
							'errors'=> [
								'required' =>'Tipe an examination name',
								'is_unique'=>'This examination name is allready registered',
							]
						];
			}
			else 
			{
				$rules['examination']=[
						'rules'=>'required',
						'errors'=> [
							'required' =>'Tipe an examination name',
							]
						];
			}

			if (!$this->validate($rules)) 
			{
				$data['validation'] = $this->validator;
			} 
			else 
			{
				$newData=[
					'examination_name' => $this->request->getPost('examination'),
					'price' => $this->request->getPost('price'),
				];	
				if($id==0)
				{
					$examinationsmodel->save($newData);
					session()->setFlashdata('success', 'Examinatio Added');
					return redirect()->to('/examinations');
				}
				else 
				{
					$examinationsmodel->update($id,$newData);
					session()->setFlashdata('success', 'Examinatio Updated');
					return redirect()->to('/examinations');
				}
			}
		}
		$data['exam']=$examinationsmodel->find($id);
		echo view('datas/add_exam',$data);
	}
	public function clinic_data()
	{
		helper(["form"]);
		$data=[];
		$cabinetModel = new CabinetModel();

		if ($this->request->getMethod() == 'post') 
		{
			// Validation
			$rules=[
				'name'=>'required',
				'email'	=>	'required',
				'telephone'=>'required',
				'address'=>'required|min_length[3]',
				'tax'=>'required',
				'trn'=>'required',
				'IBAN'=>'required',
			];
			$logo_check = $this->request->getFile('logo');

			if($logo_check != '')
			{
				$rules['logo']= [
					'rules'=>'uploaded[logo]|max_size[logo, 1024]|is_image[logo]',
					'label' => 'Logo'
							];
			}
			if (!$this->validate($rules)) 
			{
				$data['validation'] = $this->validator;
			} 
			else
			{
				$newData=[
					'name' => $this->request->getPost('name'),
					'cab_address' => $this->request->getPost('address'),
					'telephone' => $this->request->getPost('telephone'),
					'cab_email'=>$this->request->getPost('email'),
					'tax_identification_code' => $this->request->getPost('tax'),
					'trade_register_number' => $this->request->getPost('trn'),
					'IBAN'=>$this->request->getPost('IBAN'),
				];
				if($logo_check!='')
				{
					$newData['logo'] = file_get_contents($this->request->getFile('logo'));

				}
				$cabinetModel->update(1,$newData);
				session()->setFlashdata('success', 'Clinic Data Updated');
			}
		}
		$data['clinic']=$cabinetModel->get()->getFirstRow();
		echo view('datas/clinic_data',$data);

	}
	public function delete($option='exam',$id)
	{
		if($option=='analysis')
		{
			$analysismodel = new AnalysisModel();
			$analysismodel->where('id_analysis', $id)->delete($id);
			session()->setFlashdata('success', 'Analysis Deleted');
			return redirect()->to('/analyses');
		}
		else
		{
			$examinationsmodel = new ExaminationModel();
        	$examinationsmodel->where('id_examination', $id)->delete($id);
        	session()->setFlashdata('success', 'Examination Deleted');
        	return redirect()->to('/examinations');
		}
	}
}
