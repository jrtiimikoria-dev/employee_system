<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;

class DivisionSeeder extends Seeder
{
    public function run(): void
    {
        $divisions = [

            'Admin Division',
            'Clinical Division',
            'Youth Division',
            'Account Division',
            'ICT Division',

        ];

        foreach ($divisions as $division) {

            Division::create([
                'name' => $division
            ]);
        }
    }
}