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
        Schema::create('comps', function (Blueprint $table) {
            $table->id();
            $table->string('dob');
            $table->string('store_code');
            $table->string('store_name');
            $table->string('check_comps');
            $table->string('name');
            $table->string('employee');
            $table->string('manager');
            $table->string('comp_type');
            $table->string('qty');
            $table->integer('amount');
            $table->string('emp_id');
            $table->string('man_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comps');
    }
};
