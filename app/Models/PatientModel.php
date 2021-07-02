<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
	protected $table = 'patients';

	protected $primaryKey = 'id_patient';

	protected $allowedFields = [
						'first_name', 
						'last_name', 
						'identification_number',
						'date_of_birth',
						'id_county',
						'id_city', 
						'address',
						'ocuppation',
						'job',
						'telephone',
						'email',
						'civil_status'
							];

	public function getPatient($id_patient)
	{
		$builder = $this->db->table('patients');
		$builder->join('city', 'patients.id_city = city.id_city')
			->join('county', 'patients.id_county = county.id_county')
			->where(['id_patient' => $id_patient]);
		$patient = $builder->get()->getFirstRow('array');
		return $patient;
	}
	function getAllPatients()
    {
        $builder = $this->db->table('patients');
        $builder->join('city', 'patients.id_city = city.id_city')
		->join('county', 'patients.id_county = county.id_county');
        $patients = $builder->get()->getResult('array');
        return $patients;
    }
}

