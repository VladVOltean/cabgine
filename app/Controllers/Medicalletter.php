<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\LetterModel;
use App\Models\CabinetModel;
use App\Models\UserModel;
use App\Models\PatientModel;
use App\Models\CountyModel;
use App\Models\CityModel;
use App\Models\ConsultModel;
use App\Models\ConsultAnaModel;
use App\Models\ConsultExamModel;

class Medicalletter extends BaseController
{
	public function index($idpatient, $idconsult)
	{
		$db = db_connect();
		$model = new LetterModel();
		$modelcab = new CabinetModel();
		$modeluser = new UserModel();
		$modelpatient = new PatientModel();
		$modelconsult = new ConsultModel();
		$modelConsultAnal = new ConsultAnaModel($db);
		$modeConsultExam = new ConsultExamModel($db);

		$data = [
			'cabinet' => $modelcab->getCabinet('Gine3'),
			'user' => $modeluser->getUser(session()->get('id')),
			'patient' => $modelpatient->getPatient($idpatient),
			'consult' => $modelconsult->where('id_consult', $idconsult)->first(),
			'consult_analysis' => $modelConsultAnal->getAnalyzes($idconsult),
			'today' => new Time('now', 'Europe/Bucharest'),
			'examinations' => $modeConsultExam->getConsultExam($idconsult),
		];
		//$data['logo'] = \Config\Services::image()
		//	->withFile($data['cabinet']['image_path']);
		$time = Time::parse($data['patient']['date_of_birth']);
		$data['age'] = $time->getAge();

		$model->save([
			'id_patient' => $idpatient,
			'id_consult' => $idconsult,
			'id_user' => session()->get('id'),
			'id_cabinet' => $data['cabinet']['id_cabinet']
		]);


		echo view('templates/header');
		echo view('medicalletter', $data);
		echo view('templates/footer');
	}
}
