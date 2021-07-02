<?php

namespace App\Models;

use CodeIgniter\Model;

class LetterModel extends Model
{
    protected $table = 'medical_letter';
    protected $primaryKey = 'id_letter';
    protected $allowedFields = [
        'patients_id',
        'consults_id',
        'users_id',
        'cabinet_id'
    ];

    public function getLetter($id_patient,$id_consult)
    {
        $builder = $this->db->table('medical_letter');
        $builder->where(['patients_id' => $id_patient])
                ->where(['consults_id' => $id_consult])
                 ->join('patients', 'medical_letter.patients_id = patients.id_patient')
                 ->join('city', 'patients.id_city = city.id_city')
			     ->join('county', 'patients.id_county = county.id_county')
                 ->join('consult', 'medical_letter.consults_id = consult.id_consult')
                 ->join('cabinet', 'medical_letter.cabinet_id = cabinet.id_cabinet')
                 ->join('users', 'medical_letter.users_id = users.id');
        $letter = $builder->get()->getFirstRow();
        return $letter;
    }
}
