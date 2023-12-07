<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_car',
        'carName',
        'day',
        'price',
        'pickup_date',
        'return_date',
        'location'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function Car()
    {
        return $this->belongsTo(Car::class,'id_car');
    }
}
