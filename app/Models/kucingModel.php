<?php

namespace App\Models;

use CodeIgniter\Model;

class kucingModel extends Model
{
    protected $table = 'kucing';
    protected $primaryKey = 'kucing_id';
    protected $allowedFields =
    [
        'kucing_jenis',
        'kucing_foto',
        'kucing_deskripsi',
    ];
}