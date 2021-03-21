<?php

namespace App\Controllers;

use App\Models\AnalysisModel;
use CodeIgniter\I18n\Time;
use App\Models\LetterModel;
use App\Models\CabinetModel;
use App\Models\UserModel;
use App\Models\PatientModel;
use App\Models\ConsultModel;
use App\Models\ConsultAnaModel;
use App\Models\ConsultExamModel;
use App\Models\ExaminationModel;




class MedicalRecord extends BaseController
{

	public function index($id_pacient)
	{
		$db = db_connect();
		$modelpacient = new PatientModel($db);
		$modelcab = new CabinetModel();
		$modelconsult = new ConsultModel();
		$modelExam = new ExaminationModel();
		$modelAnalysis = new AnalysisModel();
		$modelConsultExam = new ConsultExamModel();
		$modelConsultAnalysis = new ConsultAnaModel();
		$model = new LetterModel();

		$data = [
			'cabinet' => $modelcab->getCabinet('Gine3'),
			'patient' => $modelpacient->getPatient($id_pacient),
			'examination' => $modelExam->getAllExam(),
			'analysis' => $modelAnalysis->getAllAnalysis(),
		];
		$data['consult'] = $modelconsult->getConsult($data['patient']['id_patient']);
		$data['last_vizit'] = end($data['consult']);
		foreach ($data['consult'] as &$consult) {
			$consult['date'] = date('d-m-Y', strtotime($consult['date']));
		}
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
				'id_patient' => $data['patient']['id_patient'],
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

			$data['consult'] = $modelconsult->getConsult($data['patient']['id_patient']);
			$data['last_vizit'] = end($data['consult']);
			$id_consult = $data['last_vizit']['id_consult'];
			$total = 0;
			if ($this->request->getPost('set_examinations') != []) {
				foreach ($this->request->getPost('set_examinations')  as $newexam) {
					$one_exam = $modelExam->getExam($newexam);
					$total += $one_exam['price'];
					$modelConsultExam->save([
						'id_examination' => $newexam,
						'id_consult' => $id_consult,
						'price' => $one_exam['price']
					]);
				}
			}
			if ($this->request->getPost('set_analysis') != []) {
				foreach ($this->request->getPost('set_analysis')  as $newana) {
					$modelConsultAnalysis->save([
						'id_analyses' => $newana,
						'id_consult' => $id_consult,
					]);
				}
			}
			$save_print = $this->request->getPost('save');
			if (isset($save_print)) {
				$model->save([
					'id_patient' => $id_pacient,
					'id_consult' => $id_consult,
					'id_user' => session()->get('id'),
					'id_cabinet' => $data['cabinet']['id_cabinet']
				]);

				return redirect()->to(base_url() . '/medicalrecord/' . $id_pacient)->with('status', ' ' . $total . ' $');
			} else {
				return redirect()->to(base_url() . '/medicalletter/' . $id_pacient . '/' . $data['last_vizit']['id_consult'])->with('status', ' ' . $total . ' $');
			}
		}
		echo view('templates/header');
		echo view('medical_report', $data);
		echo view('templates/footer');
	}
}
