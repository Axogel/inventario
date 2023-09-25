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
        Schema::create('mixes', function (Blueprint $table) {
            $table->id();
            $table->string('dob');            
            $table->string('store_code');
            $table->string('store_name');
            $table->string('item_id');
            $table->string('name');
            $table->integer('qty_sold');
            $table->string('item_price');
            $table->integer('total_price');
            $table->string('tax');
            $table->string('cost_price');
            $table->string('profit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mixes');
    }
};
