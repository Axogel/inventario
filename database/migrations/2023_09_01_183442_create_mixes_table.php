<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mixes', function (Blueprint $table) {
            $table->id('sid');
            $table->string('dob');            
            $table->string('store_code');
            $table->string('store_name');
            $table->string('item_id');
            $table->string('name');
            $table->string('qty_sold');
            $table->string('item_price');
            $table->string('total_price');
            $table->string('tax');
            $table->string('cost_price');
            $table->string('profit');
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
        Schema::dropIfExists('mixes');
    }
}
