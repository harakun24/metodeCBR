<?php

namespace App\Models;

use CodeIgniter\Model;

class hubModel extends Model
{
    protected $table = 'hub';
    protected $primaryKey = 'hub_id';
    protected $allowedFields =
    [
        'hub_kucing',
        'hub_ciri',
    ];
}