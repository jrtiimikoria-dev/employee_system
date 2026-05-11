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
        Schema::create('board_directors', function (Blueprint $table) {

            $table->id();

            $table->string('full_name');

            // $table->enum('gender', [
            //     'Male',
            //     'Female',
            //     'Other'
            // ])->nullable();

            $table->date('date_of_birth')->nullable();

            $table->date('date_joined_kfha')->nullable();

            $table->date('term_finish_date')->nullable();

            $table->string('board_position')->nullable();

            $table->string('occupation')->nullable();

            $table->string('contact_number')->nullable();

            $table->string('email')->nullable();

            $table->text('home_address')->nullable();

            $table->string('bio_data')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_directors');
    }
};
