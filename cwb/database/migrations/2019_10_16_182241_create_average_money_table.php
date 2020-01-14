<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAverageMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('average_money', function (Blueprint $table) {
            $table->increments('id');
            $table->string('avg_mo_cash_dep')->nullable($value = true);
            $table->string('avg_mo_chq_dep')->nullable($value = true);
            $table->string('avg_mo_inc_wire')->nullable($value = true);
            $table->string('avg_mo_out_wire')->nullable($value = true);
            $table->string('aaa_def_comm')->nullable($value = true);
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
        Schema::dropIfExists('average_money');
    }
}
