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
        Schema::create('birth_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_name');
            $table->string('applicant_cnic');
            $table->string('father_name');
            $table->string('father_cnic');
            $table->string('mother_name');
            $table->string('mother_cnic');
            $table->string('grand_father_name');
            $table->string('grand_father_cnic');
            $table->string('religion');
            $table->string('gender');
            $table->string('district_of_birth');
            $table->string('home_or_hospital');
            $table->string('disability');
            $table->text('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('birth_certificates');
    }
};
