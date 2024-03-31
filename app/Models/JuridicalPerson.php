<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuridicalPerson extends Model
{
    use HasFactory;
    public $table = 'juridical_persons';

    protected $fillable = ['registration_number', 'company', 'street',
        'post_code', 'zip_code', 'city', 'country', 'province', 'email', 'contact_person', 'phone', 'active', 'payed'];
}
