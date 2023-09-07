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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('license_key');
            $table->string('store_name');
            $table->string('store_address');
            $table->string('region_id');
            $table->string('cfc_id')->nullable();
            $table->string('nbo_id')->nullable();
            $table->string('last_modified_by')->nullable();
            $table->timestamps();
 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
