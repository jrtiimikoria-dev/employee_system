<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Division;

class Employee extends Model
{
    protected $fillable = [

        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'position',
        'phone_number',
        'email',
        'official_email',
        'address',
        'bio_data',
        'division_id',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}