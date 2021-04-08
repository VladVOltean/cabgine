<?php

use CodeIgniter\I18n\Time;
use App\Models\CabinetModel;
use App\Models\UserModel;
use App\Models\PatientModel;
use App\Models\ConsultModel;
use App\Models\ConsultAnaModel;
use App\Models\ConsultExamModel;

function letter_data($idpatient,$idconsult)
{
    $db = db_connect();
		$modelcab = new CabinetModel();
		$modeluser = new UserModel();
		$modelpatient = new PatientModel();
		$modelconsult = new ConsultModel();
		$modelConsultAnal = new ConsultAnaModel($db);
		$modeConsultExam = new ConsultExamModel($db);

		$letter_data = [
			'cabinet' => $modelcab->getCabinet('Gine3'),
			'user' => $modeluser->getUser(session()->get('id')),
			'patient' => $modelpatient->getPatient($idpatient),
			'consult' => $modelconsult->where('id_consult', $idconsult)->first(),
			'consult_analysis' => $modelConsultAnal->getAnalyzes($idconsult),
			'today' => new Time('now', 'Europe/Bucharest'),
			'examinations' => $modeConsultExam->getConsultExam($idconsult),
		];
		$letter_data['consult']['date'] =date('d-m-Y', strtotime($letter_data['consult']['date']));
	
		$time = Time::parse($letter_data['patient']['date_of_birth']);
		$letter_data['age'] = $time->getAge();

        return $letter_data;
}