<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatSampah extends Model
{
    protected $table ='loctempatsampah';
    use HasFactory;

    protected $fillable = [
        'namalokasi',
        'alamatlokasi',
        'jenislokasi',
        'luaslokasi',
        'kapasitaslokasi',
        'radiuslokasi',
        'latitude',
        'longitude',
    ];
}
