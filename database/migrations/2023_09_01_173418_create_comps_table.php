<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comps', function (Blueprint $table) {
            $table->id('sid');
            $table->string('dob');
            $table->string('store_code');
            $table->string('store_name');
            $table->string('check_comps');
            $table->string('name');
            $table->string('employee');
            $table->string('manager');
            $table->string('comp_type');
            $table->string('qty');
            $table->string('amount');
            $table->string('emp_id');
            $table->string('man_id');
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
        Schema::dropIfExists('comps');
    }
}
