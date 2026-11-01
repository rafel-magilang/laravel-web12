<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'pelanggan_id';
    protected $fillable = [
        'firstname',
        'lastname',
        'birthday',
        'gender',
        'email',
        'phone',
    ];
}
