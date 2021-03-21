<?php

namespace App\Models;

use CodeIgniter\Model;

class AnalysisModel extends Model
{
    protected $table = 'analysis';

    public function getAllAnalysis()
    {
        return $this->get()->getResult('array');
    }
}
