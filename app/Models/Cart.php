<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'carName',
        'day',
        'price',
        'pickup_date',
        'return_date',
        'image_car'
    ];
}
