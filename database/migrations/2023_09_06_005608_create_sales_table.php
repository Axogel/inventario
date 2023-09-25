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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('dob');
            $table->integer('store_code');
            $table->string('store_name');
            $table->string('name');
            $table->string('id_sale');
            $table->string('net_sale');
            $table->integer('comp');
            $table->integer('promo');
            $table->integer('void');
            $table->integer('taxes');
            $table->integer('grs_sale');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
