<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sid');
            $table->string('dob');
            $table->string('store_code');
            $table->string('store_name');
            $table->string('name');
            $table->string('id_sale');
            $table->string('net_sale');
            $table->string('comp');
            $table->string('promo');
            $table->string('void');
            $table->string('taxe');
            $table->string('grs_sale');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
