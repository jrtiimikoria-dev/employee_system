<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardDirector extends Model
{
    protected $fillable = [

        'full_name',

        'gender',

        'date_of_birth',

        'date_joined_kfha',

        'term_finish_date',

        'board_position',

        'occupation',

        'contact_number',

        'email',

        'home_address',

        'bio_data',

    ];
}