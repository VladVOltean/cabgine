<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultExamModel extends Model
{

    protected $table = 'consult_examinations';
    protected $primaryKey = 'id_exam';
    protected $allowedFields = [
        'id_examination',
        'id_consult',
        'price',
    ];
    function getConsultExam($id_consult)
    {
        $builder = $this->db->table('consult_examinations');
        $builder->join('examinations', 'consult_examinations.id_examination = examinations.id_examination')
            ->where(['id_consult' => $id_consult]);
        $examinations = $builder->get()->getResult('array');
        return $examinations;
    }
}
