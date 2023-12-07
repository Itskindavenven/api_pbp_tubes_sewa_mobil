<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'cars';

    protected $primaryKey = 'id_car';

    protected $fillable = [
        'nama',
        'merk',
        'max_power',
        'fuel',
        'transmisi',
        'max_speed',
        'kursi',
        'gps',
        'bluetooth',
        'harga',
        'image_car'
    ];
}
