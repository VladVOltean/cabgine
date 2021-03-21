<?php namespace App\Models;

use CodeIgniter\Model;

class CityModel extends Model
{
    protected $table = 'city';

    public function getCity($id_city)
    {
        return $this->asArray()
            ->where(['id_city'=> $id_city])
            ->first();
    }
}