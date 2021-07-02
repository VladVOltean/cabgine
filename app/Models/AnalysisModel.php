<?php

namespace App\Models;

use CodeIgniter\Model;

class AnalysisModel extends Model
{
    protected $table = 'analysis';

    protected $primaryKey ='id_analysis';

    protected $allowedFields = ['analysis_name'];
}
