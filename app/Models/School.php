<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_number',
        'name',
        'principal',
        'phone',
        'email',
        'active',
        'payed',
        'street',
        'post_code',
        'zip_code',
        'city',
        'country',
        'province',
        'ico',
    ];
}
