<?php

namespace App\Models;

use CodeIgniter\Model;

class CabinetModel extends Model
{
    protected $table = 'cabinet';

    public function getCabinet($name)
    {
        //return $this->where(['name' => $name])
        //    ->get()->getResult('array');
        return $this->asArray()
            ->where(['name' => $name])
            ->first();
    }
}
