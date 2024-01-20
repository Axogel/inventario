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
        Schema::create('libro_mayors', function (Blueprint $table) {
            $table->id();
            $table->date("ultimo_saldo");
            $table->decimal("saldo_inicial");
            $table->decimal('saldo');
            $table->string('cuenta');
            $table->string('icon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libro_mayors');
    }
};
