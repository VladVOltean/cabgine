<?php

namespace App\Models;

use CodeIgniter\Model;

class CabinetModel extends Model
{
    protected $table = 'cabinet';

    protected $primaryKey ='id_cabinet';

    protected $allowedFields = ['name','logo','cab_address','telephone','cab_email', 'tax_identification_code', 'trade_register_number','IBAN'];

}
