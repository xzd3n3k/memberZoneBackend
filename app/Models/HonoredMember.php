<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HonoredMember extends Model
{
    use HasFactory;
    public $table = 'honored_members';

    protected $fillable = [
        'registration_number',
        'title',
        'first_name',
        'last_name',
        'street',
        'post_code',
        'zip_code',
        'city',
        'country',
        'province',
        'email',
        'phone',
    ];
}
