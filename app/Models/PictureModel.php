<?php

namespace App\Models;

use CodeIgniter\Model;

class PictureModel extends Model
{

    protected $table = 'consult_image';
    protected $primaryKey = 'id_picture';
    protected $allowedFields = [
                'id_consult',
                'pic_name',
                'id_patient'
    ];
    public function getPicture($id_consult)
    {
        return $this->asArray()
            ->where(['id_consult'=> $id_consult])
            ->get()->getResult('array');
    }
}

