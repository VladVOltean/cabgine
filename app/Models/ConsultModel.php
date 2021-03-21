<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultModel extends Model
{
    protected $table = 'consult';
    protected $primaryKey = 'id_consult';
    protected $allowedFields = [
        'id_user',
        'id_patient',
        'last_period',
        'climax',
        'menstrual_cycle',
        'births',
        'abortions',
        'antecendets',
        'consult_reason',
        'observations',
        'id_exam',
        'diagnosis',
        'recommendations',
        'id_anal',
        'treatment'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'date';
    protected $updatedField  = 'udate';


    public function getConsult($id_patient)
    {

        return $this->asArray()
            ->where(['id_patient' => $id_patient])
            ->get()->getResult('array');
    }
}
