<?php

use CodeIgniter\I18n\Time;
use App\Models\ConsultAnaModel;
use App\Models\ConsultExamModel;
use App\Models\LetterModel;


function letter_data($idpatient,$idconsult)
{
    	$db = db_connect();
		$modelConsultAnal = new ConsultAnaModel($db);
		$modeConsultExam = new ConsultExamModel($db);
		$modelLetter=new LetterModel($db);
		
		$letter_data = [
			'letter'=> $modelLetter->getLetter($idpatient,$idconsult),
			'consult_analysis' => $modelConsultAnal->getAnalyzes($idconsult),
			'examinations' => $modeConsultExam->getConsultExam($idconsult),
			 'today' => new Time('now', 'Europe/Bucharest'),
		];
		$birth_day=$letter_data['letter']->date_of_birth;
		$time = Time::parse($birth_day);
		$letter_data['age'] = $time->getAge();
        return $letter_data;

}