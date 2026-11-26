<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FasilitasArea extends Model
{
    protected $table = 'fasilitas_area';

    protected $fillable = [
        'kode_area', 
        'nama_area', 
        'nomor_lantai',
        'tipe', 
        'stopkontak', 
        'wifi', 
        'status'
    ];
}
