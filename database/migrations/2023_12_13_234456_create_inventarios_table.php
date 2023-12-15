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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("marca");
            $table->bigInteger("precio");
            $table->string("talla");
            $table->string("tipo");
            $table->string("color");
            $table->boolean("disponibilidad")->default(1);
            $table->dateTime("alquiler")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
