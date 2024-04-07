<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalPerson extends Model
{
    use HasFactory;
    public $table = 'physical_persons';

    protected $fillable = [
        'registration_number',
        'title',
        'first_name',
        'last_name',
        'ares',
        'subject_of_business',
        'street',
        'post_code',
        'zip_code',
        'city',
        'country',
        'province',
        'email',
        'phone',
        'active',
        'payed',
        'ico',
    ];
}
