<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CityModel
{

    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
    }

    function countys()
    {

        $builder= $this->db->table('county');
        $countys=$builder->orderBy('county', 'asc')->get()->getResult('array');
        return $countys;
    }
    function city($id_county)
    {
        $builder = $this->db->table('city')->where('id_county', $id_county);
        $city=$builder->orderBy('city','asc')->get()->getResult('array');
        return $city;
    }
}