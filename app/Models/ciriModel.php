<?php

namespace App\Models;

use CodeIgniter\Model;

class ciriModel extends Model
{
    protected $table = 'ciri';
    protected $primaryKey = 'ciri_id';
    protected $allowedFields =
    [
        'ciri_ciri',
        'ciri_bobot',
    ];
}