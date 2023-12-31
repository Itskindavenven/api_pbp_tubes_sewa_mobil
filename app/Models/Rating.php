<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_car',
        'deskripsi',
        'bintang'
    ];

    public function Car()
    {
        return $this->belongsTo(Car::class,'id_car');
    }
}
