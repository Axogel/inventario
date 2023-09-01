<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('sid');
            $table->string('dob');
            $table->string('store_code');
            $table->string('store_name');
            $table->string('tender');
            $table->string('check_payments');
            $table->string('card');
            $table->string('exp');
            $table->string('qty');
            $table->string('amount');
            $table->string('total');
            $table->string('empployee_name');
            $table->string('empployee_id');

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
        Schema::dropIfExists('payments');
    }
}
