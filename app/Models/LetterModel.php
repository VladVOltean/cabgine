<?php

namespace App\Models;

use CodeIgniter\Model;

class LetterModel extends Model
{
    protected $table = 'medical_letter';
    protected $primaryKey = 'id_letter';
    protected $allowedFields = [
        'id_patient',
        'id_consult',
        'id_user',
        'id_cabinet'
    ];

    public function getLetter($id_patient)
    {
        return $this->asArray()
            ->where(['id_patient' => $id_patient])
            ->first();
    }
}
