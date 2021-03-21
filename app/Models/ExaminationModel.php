<?php

namespace App\Models;

use CodeIgniter\Model;

class ExaminationModel extends Model
{
    protected $table = 'examinations';

    public function getAllExam()
    {
        return $this->get()->getResult('array');
    }

    public function getExam($id_exam)
    {
        return $this->asArray()
            ->where(['id_examination' => $id_exam])
            ->first();
    }
}
