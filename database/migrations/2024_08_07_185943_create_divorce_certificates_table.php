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
        Schema::create('divorce_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('divorcer_name');
            $table->string('divorcer_cnic');
            $table->string('divorcer_father_name');
            $table->string('divorcer_father_cnic');
            $table->string('divorcer_address');
            $table->string('divorcee_name');
            $table->string('divorcee_cnic');
            $table->string('divorcee_father_name');
            $table->string('divorcee_father_cnic');
            $table->string('divorcee_address');
            $table->string('authority');
            $table->text('details'); 
            $table->string('place_of_marriage');
            $table->text('arbitration_details');
            $table->integer('children_count')->default(0);
            $table->integer('husband_previous_divorces')->default(0);
            $table->integer('wife_previous_divorces')->default(0);
            $table->date('reconciliation_failure_date');
            $table->date('notice_date');
            $table->date('registration_date');
            $table->date('marriage_date');
            $table->date('divorce_effective_date');
            $table->string('cell_no');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('divorce_certificates');
    }
};
