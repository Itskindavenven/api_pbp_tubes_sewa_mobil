<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscriptions extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'tipe',
        'harga',
        'deskripsi',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
