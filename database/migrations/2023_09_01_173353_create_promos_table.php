<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->id('sid');
            $table->string('dob');
            $table->string('store_code');
            $table->string('store_name');
            $table->string('check_promo');
            $table->string('check_name');
            $table->string('employee');
            $table->string('manager');
            $table->string('promo_type');
            $table->string('qty');
            $table->string('amount');
            $table->string('emp_id');
            $table->string('man_id');
            $table->timestamps();
            $table->timestamp('last_modified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promos');
    }
}
