<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoidxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voidxes', function (Blueprint $table) {
            $table->id('sid');
            $table->string('dob');
            $table->string('store_code');
            $table->string('store_name');
            $table->string('check_void');
            $table->string('item');
            $table->string('reason');
            $table->string('manager');
            $table->string('time');
            $table->string('server');
            $table->string('amount');
            $table->string('manager_id');
            $table->string('server_id');
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
        Schema::dropIfExists('voidxes');
    }
}
