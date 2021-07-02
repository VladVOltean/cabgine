<?php

namespace App\Models;

use CodeIgniter\Model;

class ExaminationModel extends Model
{
    protected $table = 'examinations';

    protected $primaryKey ='id_examination';

    protected $allowedFields = ['examination_name','price'];
}
