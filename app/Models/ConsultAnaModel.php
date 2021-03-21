<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultAnaModel extends Model
{

    protected $table = 'consult_analysis';
    protected $primaryKey = 'id_anal';
    protected $allowedFields = [
        'id_analyses',
        'id_consult'
    ];

    function getAnalyzes($id_consult)
    {
        $builder = $this->db->table('consult_analysis');
        $builder->join('analysis', 'consult_analysis.id_analyses = analysis.id_analysis')
            ->where(['id_consult' => $id_consult]);
        $analysis = $builder->get()->getResult('array');
        return $analysis;
    }
}
