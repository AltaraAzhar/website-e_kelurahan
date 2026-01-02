<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Penduduk extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'penduduk';

    protected $fillable = [
        'nama',
        'nik',
        'alamat'
    ];
}
