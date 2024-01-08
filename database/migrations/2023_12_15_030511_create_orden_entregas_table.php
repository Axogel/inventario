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
        Schema::create('orden_entregas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellido');
            $table->string('direccion');
            $table->string('telefono');
            $table->integer('abonado');
            $table->integer('precio');
            $table->dateTime('fecha_de_prestamo');
            $table->dateTime('fecha_de_entrega');
            $table->unsignedBigInteger('product_id')->nullable(); // Puedes cambiar a nullable si es opcional
            $table->foreign('product_id')->references('codigo')->on('inventarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orden_entregas', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
        });
    }
};
