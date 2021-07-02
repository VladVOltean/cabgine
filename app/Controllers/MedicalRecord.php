<?php

namespace App\Controllers;

use App\Models\AnalysisModel;
use App\Models\LetterModel;
use App\Models\CabinetModel;
use App\Models\PatientModel;
use App\Models\ConsultModel;
use App\Models\ConsultAnaModel;
use App\Models\ConsultExamModel;
use App\Models\ExaminationModel;


class MedicalRecord extends BaseController
{

	public function index($id_patient)
	{
		$db = db_connect();
		$modelpacient = new PatientModel($db);
		$modelconsult = new ConsultModel();
		$modelExam = new ExaminationModel();
		$modelAnalysis = new AnalysisModel();

		$data = [
			'patient' => $modelpacient->getPatient($id_patient),
			'examination' => $modelExam->get()->getResult('array'),
			'analysis' => $modelAnalysis->get()->getResult('array'),
		];
		$data['consult'] = $modelconsult->getConsult($id_patient);
		foreach ($data['consult'] as &$consult) 
		{
			$consult['date'] = date('d-m-Y', strtotime($consult['date']));
		}
		$data['last_vizit'] = reset($data['consult']);

		$rules = [
			'antecedents' => ['rules' => 'required', 'label' => ' Medical antecedents'],
			'last_period' => ['rules' => 'required', 'label' => ' Last period date'],
			'menstrual_cycle' => ['rules' => 'required', 'label' => 'Menstrual cycle'],
			'births' => ['rules' => 'required|integer', 'label' => 'Number of births'],
			'abortions' => ['rules' => 'required|integer', 'label' => 'Number of abortios'],
			'consult_reason' => ['rules' => 'required', 'label' => 'Consult reason'],
			'diagnosis' => ['rules' => 'required', 'label' => 'Diagnosis'],
			'observations' => ['rules' => 'required', 'label' => 'Observations'],
			'recommendations' => ['rules' => 'required', 'label' => 'Recommendations'],
			'treatment' => ['rules' => 'required', 'label' => 'Treatmen'],
		];

		if ($this->request->getMethod() == 'post' && $this->validate($rules)) {

			if ((isset($_POST['climax'])) && ($_POST['climax'] = '1')) {
				$data['checkedbox'] = ($_POST['climax']);
			} else {
				$data['checkedbox'] = 0;
			}
			$modelconsult->save([
				'id_user' => session()->get('id'),
				'last_period' => $this->request->getPost('last_period'),
				'id_patient' => $id_patient,
				'climax' => $data['checkedbox'],
				'menstrual_cycle' => $this->request->getPost('menstrual_cycle'),
				'births' => $this->request->getPost('births'),
				'abortions' => $this->request->getPost('abortions'),
				'consult_reason' => $this->request->getPost('consult_reason'),
				'antecedents' => $this->request->getPost('antecedents'),
				'observations' => $this->request->getPost('observations'),
				'diagnosis' => $this->request->getPost('diagnosis'),
				'recommendations' => $this->request->getPost('recommendations'),
				'treatment' => $this->request->getPost('treatment'),

			]);

			$data['consult'] = $modelconsult->getConsult($id_patient);
			$data['last_vizit'] = reset($data['consult']);
			$id_consult = $data['last_vizit']['id_consult'];
			$total = 0;
			if ($this->request->getPost('set_examinations') != []) 
			{
				$exams=$this->request->getPost('set_examinations');
				$total=$this->save_examinations($exams,$id_consult);
			}
			if ($this->request->getPost('set_analysis') != []) 
			{
				$analysis=$this->request->getPost('set_analysis');
				$this->save_analysis($analysis,$id_consult);
			}

				$this->save_letter($id_consult,$id_patient);
				return redirect()->to(base_url() . '/medicalrecord/' . $id_patient)->with('status', ' ' . $total . ' RON');
		}
		echo view('consult_views/medical_report', $data);
	}
	public function history()
		{
			$modelconsult = new ConsultModel();
			$id_consult = $this->request->getPost('id_consult');
			$data['consult'] = $modelconsult->find($id_consult);
			return $this->response->setJSON($data);
		
		}

	public function save_examinations($exams,$id_consult)
		{
			$modelExam = new ExaminationModel();
			$modelConsultExam = new ConsultExamModel();
			$total = 0;
			foreach ($exams  as $newexam) 
			{
				$one_exam = $modelExam->where('id_examination',$newexam)->first();
				$total += $one_exam['price'];
				$modelConsultExam->save([
					'id_examination' => $newexam,
					'id_consult' => $id_consult,
					'price' => $one_exam['price']
				]);
			}
			return $total;
		}

	public function save_letter($idconsult, $idpatient)
		{
			$model = new LetterModel();
			$modelcab = new CabinetModel();
			$data['cabinet']=$modelcab->where('id_cabinet','1')->first();
			$model->save([
				'patients_id' => $idpatient,
				'consults_id' => $idconsult,
				'users_id' => session()->get('id'),
				'cabinet_id' => $data['cabinet']['id_cabinet']
			]);
		}
	public function save_analysis($analysis,$id_consult)
	{
		$modelConsultAnalysis = new ConsultAnaModel();

		foreach ($analysis  as $newana) {
			$modelConsultAnalysis->save([
				'id_analyses' => $newana,
				'id_consult' => $id_consult,
			]);
		}
	}
}
