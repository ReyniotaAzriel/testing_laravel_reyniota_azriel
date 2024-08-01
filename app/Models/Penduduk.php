<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'place_of_birth',
        'date_of_birth',
        'address',
        'photo'
    ];
}
