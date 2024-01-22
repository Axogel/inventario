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
        Schema::create('libro_diarios', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('concepto');
            $table->string('debe');
            $table->string('haber');
            //Relaciones
            $table->foreignId('debeIdMayor')->references('id')->on('libro_mayors')->onDelete('cascade');
            $table->foreignId('haberIdMayor')->references('id')->on('libro_mayors')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libro_diarios');
    }
};
