<?php namespace App\Models;

use CodeIgniter\Model;

class CountyModel extends Model
{
    protected $table = 'county';

    public function getCounty($id_county)
    {
        return $this->asArray()
            ->where(['id_county'=> $id_county])
            ->first();
    }
}