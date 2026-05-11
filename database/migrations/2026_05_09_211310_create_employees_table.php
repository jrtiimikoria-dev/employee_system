<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->id();

            $table->string('first_name');

            $table->string('last_name');

            $table->date('date_of_birth')
                ->nullable();

            $table->enum('gender', [
                'Male',
                'Female',
                'Other'
            ])->nullable();

            $table->string('position')
                ->nullable();

            $table->string('phone_number')
                ->nullable();

            $table->string('email')
                ->nullable();

            $table->string('official_email')
                ->nullable();

            $table->text('address')
                ->nullable();

            $table->string('bio_data')
                ->nullable();

            $table->timestamps();
        });
    }
};
